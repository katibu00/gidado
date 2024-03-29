<?php

namespace App\Http\Controllers;

use App\Models\Charges;
use App\Models\MonnifyTransfer;
use App\Models\PopUp;
use Illuminate\Http\Request;
use App\Models\ReservedAccount;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function regular()
    {


    $query = ReservedAccount::where('customer_email', auth()->user()->email)->first();

    if ($query) {
        $accounts = json_decode($query->accounts, true);
    } else {
        $accounts = [];
    }


      $popUp = PopUp::where('switch', 'on')->first();

      $charges = Charges::select('funding_charges_description')->first();

    return view('home.regular', compact('accounts', 'popUp','charges'));

    }

    public function admin()
    {
        // Get the required statistics
        $totalUsers = User::count();
        $totalWalletBalance = Wallet::sum('balance');
        $totalFundings = MonnifyTransfer::sum('amount_paid');
    
    
        // Calculate the number of new users (registered within the last 30 days)
        $newUsers = User::where('created_at', '>=', Carbon::now()->subDays(3))->count();
    
        // Pass the statistics to the view
        return view('admin.home', compact('totalUsers', 'totalWalletBalance', 'totalFundings', 'newUsers'));

    }
}
