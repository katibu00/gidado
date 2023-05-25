<?php

namespace App\Http\Controllers;

use App\Models\MonnifyTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MonnifyController extends Controller
{
    // public function getTransfers(Request $request)
    // {
    //     $payload = $request->all();
    //     $paymentSourceInformation = $payload['eventData']['paymentSourceInformation'][0];
    //     $amountPaid = $paymentSourceInformation['amountPaid'];
    //     $accountNumber = $paymentSourceInformation['accountNumber'];

    //     // Find the ReservedAccount for the specific user
    //     $reservedAccount = ReservedAccount::where('customer_email', $paymentSourceInformation['customer']['email'])->first();

    //     if ($reservedAccount) {
    //         // Retrieve the user's wallet
    //         $wallet = Wallet::where('user_id', $reservedAccount->user_id)->first();

    //         if ($wallet) {
    //             $wallet->balance += $amountPaid;
    //             $wallet->save();
    //             MonnifyTransfer::create([
    //                 'bankCode' => $paymentSourceInformation['bankCode'],
    //                 'amountPaid' => $amountPaid,
    //                 'accountName' => $paymentSourceInformation['accountName'],
    //                 'sessionId' => $paymentSourceInformation['sessionId'],
    //                 'accountNumber' => $accountNumber,
    //             ]);

    //             return response('Webhook received', 200);
    //         }
    //     }

    //     return response('Reserved account or wallet not found', 404);
    // }

    public function handleWebhook(Request $request)
    {
        $payload = $request->all();

        // Store the payload in the database
        $paymentSourceInformation = $payload['eventData']['paymentSourceInformation'][0];

        // MonnifyTransfer::create([
        //     'bankCode' => $paymentSourceInformation['bankCode'],
        //     'amountPaid' => $paymentSourceInformation['amountPaid'],
        //     'accountName' => $paymentSourceInformation['accountName'],
        //     'sessionId' => $paymentSourceInformation['sessionId'],
        //     'accountNumber' => $paymentSourceInformation['accountNumber'],
        // ]);

        // You can also log the payload if desired
        Log::info('Webhook payload:', $payload);

        // Return a response to Monnify to acknowledge the webhook
        return response('Webhook received', 200);
    }

}
