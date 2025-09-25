<?php

namespace App\Livewire\Rough;

use Livewire\Component;
use Illuminate\Support\Str;

class MicrosoftRedirect extends Component
{
    public string $redirectUrl = '';

    // public function fetchUrl()
    // {
    //     $clientId = env('MICROSOFT_CLIENT_ID');
    //     $redirectUri = urlencode(env('MICROSOFT_REDIRECT_URI'));
    //     $scope = urlencode('openid profile email User.Read');
    //     $state = Str::random(40); // Optional: store in session

    //     $this->redirectUrl = "http://localhost:8000/common/oauth2/v2.0/authorize?" .
    //         "client_id={$clientId}&response_type=code&redirect_uri={$redirectUri}" .
    //         "&response_mode=query&scope={$scope}&state={$state}";
    // }

    public function fetchUrl()
    {
        $clientId = env('MICROSOFT_CLIENT_ID');
        $redirectUri = urlencode(env('MICROSOFT_REDIRECT_URI'));
        $responseType = urlencode('code id_token');
        $scope = urlencode('openid profile https://www.office.com/v2/OfficeHome.All');
        $responseMode = 'form_post';
        $nonce = Str::uuid(); // or Str::random(32)
        $uiLocales = 'en-US';
        $mkt = 'en-US';
        $clientRequestId = Str::uuid();
        $state = urlencode(Str::random(40));
        $xClientSKU = 'ID_NET8_0';
        $xClientVer = '8.5.0.0';

        $this->redirectUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?" .
            "client_id={$clientId}" .
            "&redirect_uri={$redirectUri}" .
            "&response_type={$responseType}" .
            "&scope={$scope}" .
            "&response_mode={$responseMode}" .
            "&nonce={$nonce}" .
            "&ui_locales={$uiLocales}" .
            "&mkt={$mkt}" .
            "&client-request-id={$clientRequestId}" .
            "&state={$state}" .
            "&x-client-SKU={$xClientSKU}" .
            "&x-client-ver={$xClientVer}";
    }

    
    public function render()
    {
        return view('livewire.rough.microsoft-redirect');
    }
}