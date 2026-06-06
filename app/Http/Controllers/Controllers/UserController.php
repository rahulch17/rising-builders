<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Service;
use App\Models\Clients;
use App\Models\Company_directions;
use App\Models\Work_philosophies;
use App\Models\Aboutus;
use App\Models\Hero_section;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.pages.index', [
            'heroCount' => Hero_section::count(),
            'serviceCount' => Service::count(),
            'clientCount' => Clients::count(),
            'directionCount' => Company_directions::count(),
            'philosophyCount' => Work_philosophies::count(),
            'aboutCount' => Aboutus::count(),
        ]);
    }
}