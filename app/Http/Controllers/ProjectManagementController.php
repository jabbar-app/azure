<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectManagementController extends Controller
{
    public function toggleStatus(Request $request)
    {
        // dd($request->is_active);
        $projectBUrl = 'https://akun.abuubaidah.com/api/toggle-status';
        $response = Http::post($projectBUrl, ['is_active' => $request->is_active]);

        if ($response->successful()) {
            Setting::where('id', 1)->update(['is_active' => $request->is_active]);
            return back()->with('success', 'Project has been updated successfully.');
        }

        return back()->with('error', 'Failed to toggle status.');
    }
}
