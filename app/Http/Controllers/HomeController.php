<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function promo(Promo $promo)
    {
        return view('promo', compact('promo'));
    }

    public function menu()
    {
        $type = request('type') ?? 'STARBUCKS BEVERAGES';
        $menu = Menu::latest()->where('type', $type)->get();
        return view('menu', compact('type', 'menu'));
    }
}
