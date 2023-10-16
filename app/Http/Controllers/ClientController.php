<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function ShowClientDashboardOverview()
    {
        return view('client.client-dashboard');
    }
}
