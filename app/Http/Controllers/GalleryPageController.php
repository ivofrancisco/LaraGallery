<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;

class GalleryPageController extends Controller
{
    /**
     * Display site's Gallery page
     *
     * @return View
     */
    public function index(): view 
    {
        $gallery = Gallery::where(['title' => 'Cars'])->firstOrFail();
        return view('site.gallery')->with([
            'title' => 'Gallery',
            'gallery' => $gallery,
        ]);
    }
}
