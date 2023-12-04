<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menu_category;
use App\Models\users;

class MainController extends Controller
{
    public function home()
    {
        if (auth()->user()) {
            return view('home', [
                'title' => 'Home',
                'menu' => Menu::all(),
                'menu_category' => Menu_category::all()
            ]);
        } else {
            return redirect('login');
        }
    }
    public function cari()
    {
    }
}
