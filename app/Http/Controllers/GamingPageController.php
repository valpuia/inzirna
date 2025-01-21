<?php

namespace App\Http\Controllers;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use App\Models\Page;
use Illuminate\View\View;

class GamingPageController extends Controller
{
    public function gaming21(): View
    {
        $seo = MetaData::where('path', MetaUrl::gaming21)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();

        $page = Page::where('path', MetaUrl::gaming21)
            ->select('title', 'content')
            ->first();

        return view('21gaming', compact('seo', 'page'));
    }

    public function responsibleGaming(): View
    {
        $seo = MetaData::where('path', MetaUrl::responsibleGaming)
            ->select(['title', 'image', 'author', 'description', 'keywords'])
            ->first();

        $page = Page::where('path', MetaUrl::responsibleGaming)
            ->select('title', 'content')
            ->first();

        return view('responsible-gaming', compact('seo', 'page'));
    }
}
