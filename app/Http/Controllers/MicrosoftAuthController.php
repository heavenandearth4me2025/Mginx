<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 

class MicrosoftAuthController extends Controller
{
    public function redirect()
    {
        $clientId = env('MICROSOFT_CLIENT_ID');
        $redirectUri = urlencode(env('MICROSOFT_REDIRECT_URI'));
        $scope = urlencode('openid profile email User.Read');
        $state = Str::random(40); // Optional: store in session

        $url = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?" .
            "client_id={$clientId}&response_type=code&redirect_uri={$redirectUri}" .
            "&response_mode=query&scope={$scope}&state={$state}";

        return redirect()->away($url);
    }

    public function callback(Request $request)
    {
        $code = $request->get('code');
        
        $response = Http::asForm()->post('https://login.microsoftonline.com/common/oauth2/v2.0/token', [
            'client_id' => env('MICROSOFT_CLIENT_ID'),
            'client_secret' => env('MICROSOFT_CLIENT_SECRET'),
            'code' => $code,
            'redirect_uri' => env('MICROSOFT_REDIRECT_URI'),
            'grant_type' => 'authorization_code',
        ]);
        // Extract access token from response
        $accessToken = $response->json()['access_token'] ?? null;

        if (!$accessToken) {
            abort(401, 'Access token not found.');
        }
    
        // Get user info
        $userResponse = Http::withToken($accessToken)->get('https://graph.microsoft.com/v1.0/me');
        $user = $userResponse->json();
        
        dd($user);
        return redirect('https://google.com');
    }

    // public function store(Request $request)
    // {
    //     $cookies = $request->all(); // All cookies sent from JS

    //     // Example: log them
    //     \Log::info('User cookies:', $cookies);
    //     return redirect('https://hostinger.com');
    //     // You can store them in DB or session
    //     return response()->json(['status' => 'Cookies received']);
    // }

}


