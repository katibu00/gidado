<?php

namespace App\Http\Controllers;

use App\Models\MonnifyTransfer;
use App\Models\ReservedAccount;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MonnifyController extends Controller
{
    public function getTransfers(Request $request)
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
