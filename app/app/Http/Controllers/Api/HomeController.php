<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\UserWeatherResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return new UserWeatherResource(auth()->user());
    }
}
