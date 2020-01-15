<?php

namespace App\ViewComposers;

use App\Models\Page;
use Illuminate\View\View;

class PagesComposer
{
    public $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function compose(View $view)
    {
        $pages = $this->page->select('slug', 'title')->get();
        return $view->with(['pages' => $pages]);
    }
}
