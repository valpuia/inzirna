<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

#[AsCommand('make:admin')]
class CreateAdminCommand extends Command
{
    protected $description = 'Create new admin.';

    protected function getUserData(): array
    {
        return [
            'name' => text(
                label: 'Name',
                required: true,
                default: 'Super Admin'
            ),

            'email' => text(
                label: 'Email address',
                validate: ['email' => 'required|email|unique:users,email']
            ),

            'password' => password(
                label: 'Password',
                required: true,
            ),
        ];
    }

    public function handle()
    {
        User::create($this->getUserData());

        $this->info('New admin created successfully!');

        return self::SUCCESS;
    }
}
