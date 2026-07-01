<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index(): void
    {
        $pages = Page::all();

        $this->json($pages);
    }
}
