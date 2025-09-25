<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PuppeteerController extends Controller
{
    public function triggerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'consent' => 'accepted',
        ]);

        $response = Http::post('http://localhost:5000/run-puppeteer', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return back()->with('status', 'Login triggered. Check logs or cookie dashboard.');
    }
}
