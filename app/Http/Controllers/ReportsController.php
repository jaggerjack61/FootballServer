<?php

namespace App\Http\Controllers;

use App\Models\PlayerDislike;
use App\Models\PlayerLike;
use App\Models\PlayerProfile;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function showReports(){

        return view('reports.reports');

    }
}
