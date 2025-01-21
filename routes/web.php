<?php

use App\Enums\MetaUrl;
use App\Http\Controllers\GamingPageController;
use App\Livewire\Announcement;
use App\Livewire\Arcade;
use App\Livewire\Blog;
use App\Livewire\BlogDetail;
use App\Livewire\Esport;
use App\Livewire\Faq;
use App\Livewire\Fishing;
use App\Livewire\GameDetail;
use App\Livewire\Home;
use App\Livewire\Live;
use App\Livewire\Promotion;
use App\Livewire\Slot;
use App\Livewire\Sport;
use App\Livewire\Table;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get(MetaUrl::slots->value, Slot::class)->name('slot');
Route::get(MetaUrl::lives->value, Live::class)->name('live');
Route::get(MetaUrl::fishings->value, Fishing::class)->name('fishing');
Route::get(MetaUrl::sports->value, Sport::class)->name('sport');
Route::get(MetaUrl::tables->value, Table::class)->name('table');
Route::get(MetaUrl::arcades->value, Arcade::class)->name('arcade');
Route::get(MetaUrl::esport->value, Esport::class)->name('esport');
Route::get(MetaUrl::promotions->value, Promotion::class)->name('promotion');
Route::get(MetaUrl::blogs->value, Blog::class)->name('blog');
Route::get(MetaUrl::faqs->value, Faq::class)->name('faq');
Route::get(MetaUrl::announcements->value, Announcement::class)->name('announcement');

Route::get('/games/{slug}', GameDetail::class)->name('game-details');
Route::get('/blogs/{slug}', BlogDetail::class)->name('blog-details');

Route::get(MetaUrl::gaming21->value, [GamingPageController::class, 'gaming21'])->name('21-gaming');
Route::get(MetaUrl::responsibleGaming->value, [GamingPageController::class, 'responsibleGaming'])->name('responsible-gaming');
