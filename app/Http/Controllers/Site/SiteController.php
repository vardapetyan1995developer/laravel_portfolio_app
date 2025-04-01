<?php

namespace app\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
