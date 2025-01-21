<?php

use App\Filament\Resources\BlogResource;
use App\Models\Blog;
use Database\Factories\BlogFactory;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\FileUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(BlogResource::getUrl())
        ->assertSuccessful();
});

it('can list blogs', function () {
    $blogs = BlogFactory::new()->count(10)->create();

    Livewire(BlogResource\Pages\ListBlogs::class)
        ->assertCanSeeTableRecords($blogs);
});

it('can render table columns', function (string $column) {
    BlogFactory::new()->count(10)->create();

    livewire(BlogResource\Pages\ListBlogs::class)
        ->assertCanRenderTableColumn($column);
})->with(['image', 'title', 'excerpt', 'created_at']);

it('can search blogs by title', function () {
    $blogs = BlogFactory::new()->count(10)->create();

    $title = $blogs->first()->title;

    livewire(BlogResource\Pages\ListBlogs::class)
        ->searchTable($title)
        ->assertCanSeeTableRecords($blogs->where('title', $title))
        ->assertCanNotSeeTableRecords($blogs->where('title', '!=', $title));
});

it('can render create page', function () {
    $this->get(BlogResource::getUrl('create'))
        ->assertSuccessful();
});

it('has a form', function () {
    livewire(BlogResource\Pages\CreateBlog::class)
        ->assertFormExists();
});

it('has form fields', function (string $field) {
    livewire(BlogResource\Pages\CreateBlog::class)
        ->assertFormFieldExists($field);
})->with([
    'title',
    'slug',
    'content',
    'excerpt',
    'image',
    'alt',
    'seo_image',
    'seo_title',
    'seo_description',
    'seo_keywords',
    'seo_author',
]);

it('can validate input', function () {
    livewire(BlogResource\Pages\CreateBlog::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can automatically generate a slug from the title', function () {
    $title = fake()->sentence();

    livewire(BlogResource\Pages\CreateBlog::class)
        ->fillForm([
            'title' => $title,
        ])
        ->assertFormSet([
            'slug' => Str::slug($title),
        ]);
});

it('can create new data', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $newData = BlogFactory::new()->make();

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $seoFilename = Str::random().'.png';
    $seoImage = UploadedFile::fake()->image($seoFilename);

    livewire(BlogResource\Pages\CreateBlog::class)
        ->fillForm([
            'title' => $newData->title,
            'slug' => $newData->slug,
            'excerpt' => $newData->excerpt,
            'content' => $newData->content,
            'image.0' => $formImage,
            'alt' => $newData->alt,
            'seo_title' => $newData->seo_title,
            'seo_description' => $newData->seo_description,
            'seo_keywords' => [$newData->seo_keywords],
            'seo_author' => $newData->seo_author,
            'seo_image.0' => $seoImage,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect(BlogResource::getUrl());

    Storage::disk('public')->assertExists("blogs/{$formFilename}");
    Storage::disk('public')->assertExists("blog-seo/{$seoFilename}");

    $this->assertDatabaseHas(Blog::class, [
        'title' => $newData->title,
        'slug' => $newData->slug,
        'excerpt' => $newData->excerpt,
        'content' => $newData->content,
        'image' => "blogs/{$formFilename}",
        'alt' => $newData->alt,
        'seo_title' => $newData->seo_title,
        'seo_description' => $newData->seo_description,
        'seo_keywords' => $newData->seo_keywords,
        'seo_author' => $newData->seo_author,
        'seo_image' => "blog-seo/{$seoFilename}",
    ]);
});

it('can render edit page', function () {
    $this->get(BlogResource::getUrl('edit', [
        'record' => BlogFactory::new()->create(),
    ]))->assertSuccessful();
});

it('can retrieve data', function () {
    $blog = BlogFactory::new()->create();

    livewire(BlogResource\Pages\EditBlog::class, [
        'record' => $blog->getRouteKey(),
    ])
        ->assertFormSet([
            'title' => $blog->title,
            'slug' => $blog->slug,
            'excerpt' => $blog->excerpt,
            'content' => $blog->content,
            'image.0' => null,
            'alt' => $blog->alt,
            'seo_title' => $blog->seo_title,
            'seo_description' => $blog->seo_description,
            'seo_keywords' => [$blog->seo_keywords],
            'seo_author' => $blog->seo_author,
            'seo_image.0' => null,
        ]);
});

it('can validate input on edit', function () {
    $blog = BlogFactory::new()->create();

    livewire(BlogResource\Pages\EditBlog::class, [
        'record' => $blog->getRouteKey(),
    ])
        ->fillForm([
            'title' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can save', function () {
    FileUpload::configureUsing(function (FileUpload $component) {
        $component->preserveFilenames();
    });

    $formFilename = Str::random().'.jpg';
    $formImage = UploadedFile::fake()->image($formFilename);

    $seoFilename = Str::random().'.png';
    $seoImage = UploadedFile::fake()->image($seoFilename);

    $blog = BlogFactory::new()->create();
    $newData = BlogFactory::new()->make([
        'image' => $formImage,
        'seo_image' => $seoImage,
    ]);

    livewire(BlogResource\Pages\EditBlog::class, [
        'record' => $blog->getRouteKey(),
    ])
        ->fillForm([
            'title' => $newData->title,
            'slug' => $newData->slug,
            'excerpt' => $newData->excerpt,
            'content' => $newData->content,
            'image.0' => $formImage,
            'alt' => $newData->alt,
            'seo_title' => $newData->seo_title,
            'seo_description' => $newData->seo_description,
            'seo_keywords' => [$newData->seo_keywords],
            'seo_author' => $newData->seo_author,
            'seo_image.0' => $seoImage,
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertRedirect(BlogResource::getUrl());

    expect($blog->refresh())
        ->title->toBe($newData->title)
        ->slug->toBe($newData->slug)
        ->excerpt->toBe($newData->excerpt)
        ->content->toBe($newData->content)
        ->image->toBe("blogs/{$formFilename}")
        ->alt->toBe($newData->alt)
        ->seo_title->toBe($newData->seo_title)
        ->seo_description->toBe($newData->seo_description)
        ->seo_keywords->toBe($newData->seo_keywords)
        ->seo_author->toBe($newData->seo_author)
        ->seo_image->toBe("blog-seo/{$seoFilename}");
});

it('can delete', function () {
    $blog = BlogFactory::new()->create();

    livewire(BlogResource\Pages\EditBlog::class, [
        'record' => $blog->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($blog);
});
