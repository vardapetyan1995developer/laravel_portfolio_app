<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('dashboard.index');
    }
}
