<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function beranda()
    {

        $featuredProducts = Product::inRandomOrder()->limit(3)->get();

        return view('welcome', compact('featuredProducts'));
    }

     public function contact()
    {
        return view('contact.index');
    }
     public function category()
    {
        return view('category.index');
    }
     public function testemoni()
    {
        return view('testemoni.index');
    }
     public function about()
    {
        return view('about.index');
    }
}
