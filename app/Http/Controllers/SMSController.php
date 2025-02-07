<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SMSController extends Controller
{
    //
    public function sendSMS(Request $request)
    {
        $apiKey = env('TXTLOCAL_API_KEY'); // Store API key in .env
        $numbers = implode(',', $request->numbers);
        $message = $request->message;
        $sender = "ChurchCRM";

        $response = Http::post('https://api.txtlocal.com/send/', [
            'apikey' => $apiKey,
            'numbers' => $numbers,
            'message' => $message,
            'sender' => $sender,
        ]);

        return response()->json($response->json());
    }
}
