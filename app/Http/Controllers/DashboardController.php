<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Asegurarse de que esta vista existe en resources/views/dashboard.blade.php
    }
}
