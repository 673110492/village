<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Culture;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = User::count();
        $about = AboutSection::count();
        $proje = Project::count();
        $team = Team::count();
        $partenaire = Partner::count();
        $cu = Culture::count();

        return view('admin.dashboard', compact(
            'user', 'about', 'proje', 'team', 'partenaire', 'cu'
        ));
    }
}