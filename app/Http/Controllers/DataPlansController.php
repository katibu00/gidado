<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\DataPlan;
use Illuminate\Http\Request;

class DataPlansController extends Controller
{
    function index(){
        $data['allData'] = DataPlan::paginate(9); 
        return view('data_plans.index',$data);
    }

    function store(Request $request){


        $productCount = count($request->amount);
        if($productCount != NULL){
            for ($i=0; $i < $productCount; $i++){
                $data = new DataPlan();
                $data->network_name = $request->network_name;
                $data->plan_id = $request->plan_id[$i];
                $data->amount = $request->amount[$i];
                $data->buying_price = $request->buying_price[$i];
                $data->selling_price = $request->selling_price[$i];
                $data->plan_type = $request->plan_type[$i];
                $data->validity = $request->validity[$i];
                $data->save();
            }
        }
        Toastr::success('Inventories has been added sucessfully', 'Done');
        return redirect()->route('stock.index');

    }

    public function fetchPlans(Request $request)
    {
        $networkId = $request->input('networkId');
        $dataPlans = DataPlan::where('network_name', $networkId)->get();
        $contacts = Contact::where('network', $networkId)->where('user_id', auth()->user()->id)->get();
        return response()->json(['dataPlans' => $dataPlans, 'contacts' => $contacts]);
    }
 
   

    function update(Request $request, $id){
       
        $data = Stock::find($id);
        $data->name = $request->name;
        $data->buying_price = $request->buying_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->critical_level = $request->critical_level;

        $data->update();
        Toastr::success('Inventory has been updated sucessfully', 'Done');
        return redirect()->route('stock.index');
    }

    function copyStore(Request $request){
       
        $data = new Stock();
        $data->branch_id = $request->branch_id;
        $data->name = $request->name;
        $data->buying_price = $request->buying_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->critical_level = $request->critical_level;

        $data->save();
        Toastr::success('Inventory has been Copied sucessfully', 'Done');
        return redirect()->route('stock.index');
    }

    function delete(Request $request){
       
        $data = Stock::find($request->id);
        
        $data->delete();
       
        return response()->json([
            'status' => 200,
            'message' => 'Product Deleted Succesffully',
        ]);
    }

    public function fetchStocks(Request $request)
    {
        $data['stocks'] = Stock::where('branch_id', $request->branch_id)->paginate(25);
        return view('stock.table', $data)->render();
      
    }


    public function paginate(Request $request)
    {
        $data['stocks'] = Stock::where('branch_id', $request->branch_id)->paginate(25);
        return view('stock.table', $data)->render();
    }


    public function Search(Request $request)
    {

        
        $data['stocks'] = Stock::where('branch_id', $request->branch_id)->where('name', 'like','%'.$request['query'].'%')->paginate(25);

        if( $data['stocks']->count() > 0 )
        {
            return view('stock.table', $data)->render();
        }else
        {
            return response()->json([
                'status' => 404,
            ]);
        }
    }
}
