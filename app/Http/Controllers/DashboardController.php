<?php

namespace App\Http\Controllers;

use App\Services\UrlService;

class DashboardController extends Controller
{
    public function index()
    {
        $service = new UrlService;
        $response = $service->list();
        return view('dashboard', ['urls' => $response['data']]);
    }
}
