<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function cekWA(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'y59Vw77031Tpb0Cv8dbO5QyJVKVKi6EXoWqHCVZaVDntDUIViSMQuWvz2jkNwePM',
            'url' => 'https://pati.wablas.com',
        ])->get('https://phone.wablas.com/check-phone-number?', ['phones' => $request->phones]);
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        return response()->json($responseBody);
    }
}
