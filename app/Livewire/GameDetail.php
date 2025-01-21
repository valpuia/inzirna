<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Component;

class GameDetail extends Component
{
    public $game;

    public $seo;

    public function mount($slug): void
    {
        $this->game = Game::where('slug', $slug)->firstOrFail();

        $this->seo = [
            'title' => $this->game->seo_title,
            'description' => $this->game->seo_description,
            'keywords' => $this->game->seo_keywords,
            'author' => $this->game->seo_author,
            'image' => $this->game->seo_image,
        ];
    }

    public function render()
    {
        return view('livewire.game-detail');
    }
}
