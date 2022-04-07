<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function reviewIndex()
    {
        $review = Review::all();
        return view('review')->with('review', $review);
    }
}
