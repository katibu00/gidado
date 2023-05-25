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
        $customerEmail = $request->input('eventData.customer.email');

        $reservedAccount = ReservedAccount::where('customer_email', $customerEmail)->first();

        if ($reservedAccount) {
            // Retrieve the user's wallet
            $wallet = Wallet::where('user_id', $reservedAccount->user_id)->first();
            Log::info('Customer email received', ['email' => $customerEmail]);

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
