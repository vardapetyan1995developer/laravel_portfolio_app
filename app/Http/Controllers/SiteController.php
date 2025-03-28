<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class SiteController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('site.index');
    }
}
