<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class HomeController extends Controller
{
   public function index(): View
   {
    $posts = DB::table('posts')->paginate(5);
    $postDestacado = DB::table('posts')->inRandomOrder()->first();

    return view('home.index', compact('posts', 'postDestacado'));
   }
}
