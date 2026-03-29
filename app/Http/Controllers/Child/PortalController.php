<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    public function index()
    {
        return view('child.dashboard', [
            'child' => Auth::user(),
        ]);
    }

    public function schedule()
    {
        return view('child.schedule', [
            'child' => Auth::user(),
        ]);
    }

    public function gallery()
    {
        return view('child.gallery', [
            'child' => Auth::user(),
        ]);
    }

    public function updates()
    {
        return view('child.updates', [
            'child' => Auth::user(),
        ]);
    }
}
