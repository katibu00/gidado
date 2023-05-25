<?php

namespace App\Http\Controllers;

use App\Models\MonnifyTransfer;
use Illuminate\Http\Request;

class MonnifyController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $paymentSourceInformation = $payload['eventData']['paymentSourceInformation'][0];
        
        MonnifyTransfer::create([
            'bankCode' => $paymentSourceInformation['bankCode'],
            'amountPaid' => $paymentSourceInformation['amountPaid'],
            'accountName' => $paymentSourceInformation['accountName'],
            'sessionId' => $paymentSourceInformation['sessionId'],
            'accountNumber' => $paymentSourceInformation['accountNumber'],
        ]);
    
            return response('Webhook received', 200);
        }
    
}
