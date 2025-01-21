#!/bin/bash

# Ensure script is run from the project root
if [ ! -f "composer.json" ]; then
    echo "Please run this script from the project root directory."
    exit 1
fi

echo "Starting application setup..."

if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env file created from .env.example."
else
    echo ".env file already exists. Skipping creation."
fi

uncomment_env_vars() {
    sed -i "s/^#\s*\($1=.*\)/\1/" .env
}

comment_env_vars() {
    sed -i "s/^\($1=.*\)/# \1/" .env
}

echo "Select the database type:"
echo "1. SQLite"
echo "2. MySQL"
read -p "Enter your choice (1 or 2): " dbChoice

if [[ $dbChoice -eq 1 ]]; then
    echo "Configuring for SQLite..."
    touch database/database.sqlite
    sed -i "s/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/" .env

    comment_env_vars "DB_HOST"
    comment_env_vars "DB_PORT"
    comment_env_vars "DB_DATABASE"
    comment_env_vars "DB_USERNAME"
    comment_env_vars "DB_PASSWORD"
    echo "SQLite configuration completed."
elif [[ $dbChoice -eq 2 ]]; then
    echo "Configuring for MySQL..."
    read -p "Enter MySQL database name: " db_name
    read -p "Enter MySQL username: " db_user
    read -sp "Enter MySQL password: " db_password
    echo
    read -p "Enter MySQL host (default: 127.0.0.1): " db_host
    db_host=${db_host:-127.0.0.1}
    read -p "Enter MySQL port (default: 3306): " db_port
    db_port=${db_port:-3306}

    uncomment_env_vars "DB_HOST"
    uncomment_env_vars "DB_PORT"
    uncomment_env_vars "DB_DATABASE"
    uncomment_env_vars "DB_USERNAME"
    uncomment_env_vars "DB_PASSWORD"

    sed -i "s/^DB_CONNECTION=.*/DB_CONNECTION=mysql/" .env
    sed -i "s/^DB_DATABASE=.*/DB_DATABASE=$db_name/" .env
    sed -i "s/^DB_USERNAME=.*/DB_USERNAME=$db_user/" .env
    sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=$db_password/" .env
    sed -i "s/^DB_HOST=.*/DB_HOST=$db_host/" .env
    sed -i "s/^DB_PORT=.*/DB_PORT=$db_port/" .env

    echo "MySQL configuration completed."
else
    echo "Invalid choice. Exiting setup."
    exit 1
fi

echo "Installing composer dependencies..."
composer install --optimize-autoloader --no-dev

echo "Generating application key..."
php artisan key:generate

echo "Running database migrations with seeds..."
php artisan migrate --seed

echo "Linking storage..."
php artisan storage:link

echo "Creating new admin..."
php artisan make:admin

echo "Optimization..."
php artisan optimize
php artisan filament:optimize

echo "The application setup completed successfully!"
