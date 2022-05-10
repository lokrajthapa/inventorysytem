<?php

namespace App\Http\Controllers;
use App\Models\dummy;
use Illuminate\Http\Request;
use App\Models\Inventorysetting;

class InventoryStockController extends Controller
{
    //

    public function dummydataStore(Request $request)
    {
        $dummydata = new dummy();
        $dummydata->item_id = $request->groupName;

    }
    public function searchforstockitem(Request $request)
    {     
        if ($request->ajax()) {
            // dd('request is submitted');
            $search = $request->get('query');
            if ($search != '') 
            {
                $items = Inventorysetting::where('itemName', 'LIKE', '' . $search . '%')->where('status', '0')->take(10)->get();
            }
        }

        return json_encode($items);
    }
}
