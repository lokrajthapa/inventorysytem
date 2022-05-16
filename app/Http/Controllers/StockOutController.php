<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\dummysecond;

class StockOutController extends Controller
{
    //
    public function index()
    {
        $itemsdummy = dummysecond::orderBy("id", "desc")->take(10)->get();

        return view('outStock.outstock', compact('itemsdummy'));
    }


    public function stockitemstore(Request $request)
    {
        if ($request->id) {

            $unitEqualsTo = $request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus = $request->bonus;
            $totalinstock = $unitEqualsTo * ($quantity + $bonus);
            $dummydata = dummysecond::find($request->id);
            $dummydata->item_id = $request->itemId;
            $dummydata->instock =  $totalinstock;
            $dummydata->outstock = 0;
            $dummydata->units = $request->Unit;
            $dummydata->rate = $request->Rate;
            $dummydata->unitEqualsTo = $unitEqualsTo;
            $dummydata->bonus = $bonus;
            $dummydata->quantity = $quantity;
            $dummydata->date = "1900-01-01";
            $dummydata->update();
            return redirect()->back()->with('itemdetails', 'Item details  updated successfully');
        } else {



            $unitEqualsTo = $request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus = $request->bonus;
            $totalinstock = $unitEqualsTo * ($quantity + $bonus);
            $dummydata = new dummysecond();
            $dummydata->item_id = $request->itemId;
            $dummydata->instock =  $totalinstock;
            $dummydata->outstock = 0;
            $dummydata->units = $request->Unit;
            $dummydata->rate = $request->Rate;
            $dummydata->unitEqualsTo = $unitEqualsTo;
            $dummydata->bonus = $bonus;
            $dummydata->quantity = $quantity;
            $dummydata->date = "1900-01-01";
            $dummydata->save();
            return redirect()->back()->with('itemdetails', 'Item details  added successfully');
        }
    }

    public function itemsedit($id)
    {

        $itemsdummy = dummysecond::orderBy("id", "desc")->take(10)->get();
        $dummydata = \DB::select("select dummyseconds.id, item_id,itemName,dummyseconds.units,rate,unitEqualsTo,bonus,quantity from dummyseconds inner join inventorysettings on inventorysettings.id=dummyseconds.item_id where dummyseconds.id='" . $id . "' and inventorysettings.status=0 ");

        // dd($dummydata);
        // $dummydata=dummy::FindorFail($id);     
        return view('outStock.outstock', compact('dummydata', 'itemsdummy'));
    }


    public function stockoutdelete($id)
    {
        $itemsdummy = dummysecond::findorfail($id);
        $itemsdummy->delete();
        return redirect()->back()->with('itemdetails', 'Item details  Deleted  successfully');

 
    }
}
