<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function terminal()
    {
        return view('terminal');
    }

    public function dashboard()
    {
        $isActive = Setting::findOrFail(1);
        $isActive = $isActive->value('is_active');

        // dd($isActive);
        return view('dashboard', compact('isActive'));
    }
}
