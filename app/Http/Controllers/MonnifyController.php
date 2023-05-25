<?php

namespace App\Http\Controllers;

use App\Models\MonnifyTransfer;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\ReservedAccount;

class MonnifyController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        $paymentSourceInformation = $payload['eventData']['paymentSourceInformation'][0];
        $amountPaid = $paymentSourceInformation['amountPaid'];
        $accountNumber = $paymentSourceInformation['accountNumber'];

        // Find the ReservedAccount for the specific user
        $reservedAccount = ReservedAccount::where('customer_email', $paymentSourceInformation['customer']['email'])->first();

        if ($reservedAccount) {
            // Retrieve the user's wallet
            $wallet = Wallet::where('user_id', $reservedAccount->user_id)->first();

            if ($wallet) {
                $wallet->balance += $amountPaid;
                $wallet->save();
                MonnifyTransfer::create([
                    'bankCode' => $paymentSourceInformation['bankCode'],
                    'amountPaid' => $amountPaid,
                    'accountName' => $paymentSourceInformation['accountName'],
                    'sessionId' => $paymentSourceInformation['sessionId'],
                    'accountNumber' => $accountNumber,
                ]);

                return response('Webhook received', 200);
            }
        }

        return response('Reserved account or wallet not found', 404);
    }

}
