<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectManagementController extends Controller
{
    public function toggleStatus(Request $request)
    {
        $projectBUrl = 'https://akun.abuubaidah.com/api/toggle-status';
        $response = Http::post($projectBUrl, ['is_active' => false]);

        if ($response->successful()) {
            return back()->with('success', 'Abu Ubaidah has been deactivated.');
        }

        return back()->with('error', 'Failed to toggle status.');
    }
}
