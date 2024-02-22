<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiveIncomingCoilController extends Controller
{
    public function index()
    {
        return view('modules.receive-incoming-coil');
    }
}
