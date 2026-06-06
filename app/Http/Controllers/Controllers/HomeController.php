<?php

namespace App\Http\Controllers;

use App\Models\Hero_section;
use App\Models\Aboutus;
use App\Models\Service;
use App\Models\Work_philosophies;
use App\Models\Clients;
use App\Models\Company_directions;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero_section::latest()->get();
        $about = Aboutus::latest()->first();
        $services = Service::latest()->get();
        $philosophies = Work_philosophies::latest()->get();
        $clients = Clients::latest()->get();
        $direction = Company_directions::first();

        return view('home', compact(
            'heroes',
            'about',
            'services',
            'philosophies',
            'clients',
            'direction'
        ));
    }
}