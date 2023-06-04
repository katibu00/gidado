<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyDataController extends Controller
{
    public function buyData(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 400,
                'message' => 'You are not Logged in.',
            ]);
        }
        
        $user = auth()->user();

        $walletBalance = $user->wallet->balance;

        if ($walletBalance < $request->selectedPlanPrice) {
            return response()->json([
                'status' => 400,
                'message' => 'Insufficient funds. Please add funds to your wallet.',
            ]);
        }

       


        $networkName = $request->network;
        $networkId = '';
        $number = '';

        if ($networkName === 'MTN') {
            $networkId = 1;
        } else if ($networkName === 'GLO') {
            $networkId = 2;
        } else if ($networkName === 'AIRTEL') {
            $networkId = 3;
        } else if ($networkName === '9MOBILE') {
            $networkId = 6;
        } else {
            $networkId = null;
        }
        if($request->contact == 'new')
        {
            $number = $request->input('contact');
        }else
        {
            $number = $request->input('selectedContactNumber');
 
        }
       

        $curl = curl_init();

        $jsonData = json_encode([
            "network" => $networkId,
            "mobile_number" => $number,
            "plan" => $request->amount,
            "Ported_number" => true,
            "payment_medium" => "MAIN WALLET",
        ]);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.gladtidingsdata.com/api/data/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Token b549be14f63f4087e6a5a85dfb03942ec658f27b',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

         $responseData = json_decode($response); // Decode the JSON response

         if (isset($responseData->error)) {
            $errorMessage = $responseData->error[0];
            return response()->json([
                'status' => 400,
                'message' => 'Unknown error occured. Pls contact admin on WhatsApp.',
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => $responseData->api_response,
            ]);
        }
    }

}
