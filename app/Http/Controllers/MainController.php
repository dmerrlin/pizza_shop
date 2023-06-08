<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $menu = new menu();
        return view('home', ['menu' => $menu->all()]);
    }

    public function basket(){
        return view('basket');
    }

    public function order(){
        return view('order');
    }
}
