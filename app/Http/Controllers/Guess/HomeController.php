<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('guess.welcome');
    }
}
