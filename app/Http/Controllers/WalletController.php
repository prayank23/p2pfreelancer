<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function showWallet()
    {
        return view('front.my-wallet');
    }
}
