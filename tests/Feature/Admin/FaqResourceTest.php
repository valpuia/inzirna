<?php

use App\Filament\Resources\FaqResource;
use App\Models\Faq;
use Database\Factories\FaqFactory;

use function Pest\Livewire\livewire;

it('can render page', function () {
    $this->get(FaqResource::getUrl())
        ->assertSuccessful();
});

it('can list faqs', function () {
    $faqs = FaqFactory::new()->count(10)->create();

    Livewire(FaqResource\Pages\ManageFaqs::class)
        ->assertCanSeeTableRecords($faqs);
});

it('can render table columns', function (string $column) {
    FaqFactory::new()->count(10)->create();

    livewire(FaqResource\Pages\ManageFaqs::class)
        ->assertCanRenderTableColumn($column);
})->with(['question', 'answer', 'created_at']);

it('can search faqs by question', function () {
    $faqs = FaqFactory::new()->count(10)->create();

    $question = $faqs->first()->question;

    livewire(FaqResource\Pages\ManageFaqs::class)
        ->searchTable($question)
        ->assertCanSeeTableRecords($faqs->where('question', $question))
        ->assertCanNotSeeTableRecords($faqs->where('question', '!=', $question));
});

it('can search faqs by answer', function () {
    $faqs = FaqFactory::new()->count(10)->create();

    $answer = $faqs->first()->answer;

    livewire(FaqResource\Pages\ManageFaqs::class)
        ->searchTable($answer)
        ->assertCanSeeTableRecords($faqs->where('answer', $answer))
        ->assertCanNotSeeTableRecords($faqs->where('answer', '!=', $answer));
});

it('can render create modal', function () {
    livewire(FaqResource\Pages\ManageFaqs::class)
        ->callAction('create')
        ->assertSuccessful();
});

it('has form fields', function (string $field) {
    livewire(FaqResource\Pages\ManageFaqs::class)
        ->mountAction('create')
        ->assertSee($field);
})->with(['question', 'answer']);

it('can validate input', function () {
    livewire(FaqResource\Pages\ManageFaqs::class)
        ->mountAction('create')
        ->setActionData([
            'question' => null,
        ])
        ->callMountedAction()
        ->assertHasActionErrors(['question' => 'required']);
});

it('can create new data', function () {
    $newData = FaqFactory::new()->create();

    livewire(FaqResource\Pages\ManageFaqs::class)
        ->mountAction('create')
        ->setActionData([
            'question' => $newData->question,
            'answer' => $newData->answer,
        ])
        ->callMountedAction();

    $this->assertDatabaseHas(Faq::class, [
        'question' => $newData->question,
        'answer' => $newData->answer,
    ]);
});

it('can render edit modal', function () {
    $faq = FaqFactory::new()->create();

    livewire(FaqResource\Pages\ManageFaqs::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});

it('can retrieve data', function () {
    $faq = FaqFactory::new()->create();

    livewire(FaqResource\Pages\ManageFaqs::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->assertSee('question', $faq->question)
        ->assertSee('answer', $faq->answer);
});

it('can validate input on edit', function () {
    $faq = FaqFactory::new()->create();

    livewire(FaqResource\Pages\ManageFaqs::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $faq->getRouteKey(), [
            'question' => null,
        ])
        ->assertHasErrors();
});

it('can save', function () {
    $faq = FaqFactory::new()->create();
    $newData = FaqFactory::new()->make();

    livewire(FaqResource\Pages\ManageFaqs::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('edit')
        ->callTableAction('edit', $faq->getRouteKey(), [
            'question' => $newData->question,
            'answer' => $newData->answer,
        ])
        ->assertHasNoActionErrors();

    expect($faq->refresh())
        ->question->toBe($newData->question)
        ->answer->toBe($newData->answer);
});

it('can delete', function () {
    $faq = FaqFactory::new()->create();

    livewire(FaqResource\Pages\ManageFaqs::class, [
        'record' => $faq->getRouteKey(),
    ])
        ->mountAction('delete')
        ->callTableAction('delete', $faq->getRouteKey());

    $this->assertModelMissing($faq);
});
