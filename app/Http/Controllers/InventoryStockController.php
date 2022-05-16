<?php

namespace App\Http\Controllers;
use App\Models\dummy;
use Illuminate\Http\Request;
use App\Models\Inventorysetting;

class InventoryStockController extends Controller
{
    //
    public function index()
    {

        $itemsdummy=dummy::orderBy("id","desc")->take(10)->get();
       
        return view('instock.stockIn',compact('itemsdummy'));
    }

    public function stockitemstore(Request $request)
    {   
        if($request->id)
        {  
            
            $unitEqualsTo=$request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus =$request->bonus;
            $totalinstock =$unitEqualsTo * ($quantity+$bonus); 
            $dummydata=dummy::find($request->id);  
            $dummydata->item_id = $request->itemId;
            $dummydata->instock =  $totalinstock;
            $dummydata->outstock = 0;
            $dummydata->units = $request->Unit;
            $dummydata->rate = $request->Rate;
            $dummydata->unitEqualsTo =$unitEqualsTo;
            $dummydata->bonus =$bonus;
            $dummydata->quantity =$quantity;
            $dummydata->date = "1900-01-01";
            $dummydata->update();
            return redirect()->back()->with('itemdetails', 'Item details  updated successfully');
            
        }
        else
        {

      
      
        $unitEqualsTo=$request->unitEqualsTo;
        $quantity = $request->quantity;
        $bonus =$request->bonus;
        $totalinstock =$unitEqualsTo * ($quantity+$bonus);        
        $dummydata = new dummy();
        $dummydata->item_id = $request->itemId;
        $dummydata->instock =  $totalinstock;
        $dummydata->outstock = 0;
        $dummydata->units = $request->Unit;
        $dummydata->rate = $request->Rate;
        $dummydata->unitEqualsTo =$unitEqualsTo;
        $dummydata->bonus =$bonus;
        $dummydata->quantity =$quantity;
        $dummydata->date = "1900-01-01";
        $dummydata->save();
        return redirect()->back()->with('itemdetails', 'Item details  added successfully');
    }



    }
    public function itemsedit($id)
    {
        
        $itemsdummy = dummy::orderBy("id","desc")->take(10)->get();
        $dummydata=\DB::select("select dummies.id, item_id,itemName,dummies.units,rate,unitEqualsTo,bonus,quantity from dummies inner join inventorysettings on inventorysettings.id=dummies.item_id where dummies.id='".$id."' and inventorysettings.status=0 ");

       // dd($dummydata);
       // $dummydata=dummy::FindorFail($id);     
        return view('instock.stockIn',compact('dummydata','itemsdummy'));
       
    }
    public function searchforstockitem(Request $request)
    {     
        if ($request->ajax()) {
            // dd('request is submitted');
            $search = $request->get('query');
            if ($search != '') 
            {

                $items=\DB::select("select inventorysettings.id,itemName,altUnits,equals,buyRate,sellRate from inventorysettings inner join inventorysetting_details on inventorysettings.id=inventorysetting_details.commonCode_id where itemName like '".$search."%' and inventorysettings.status=0 and inventorysetting_details.status=0 limit 10");

               // $items = Inventorysetting::where('itemName', 'LIKE', '' . $search . '%')->where('status', '0')->take(10)->get();
            }
        }

        return json_encode($items);
    }

    public function stockindelete($id)
    {
        $itemsdummy = dummy::findorfail($id);
        $itemsdummy->delete();
        return redirect()->back()->with('itemdetails', 'Item details  Deleted  successfully');

 
    }
}
