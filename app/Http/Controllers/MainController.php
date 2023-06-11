<?php

namespace App\Http\Controllers;

use App\menu;
use App\Order;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('home');
    }

    public function basket(){
        return view('basket');
    }

    public function order(){
        return view('order');
    }
}
