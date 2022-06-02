<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemGroup;
use App\Models\itemSubGroup;
use App\Models\CompanyInfo;
use App\Models\FacialYear;



class reportsController extends Controller
{
  //
  public function index()
  {
    $reports = \DB::select("SELECT  itemName,   sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID GROUP by inventories.inventoryID");

    return view('reports.viewreports', compact('reports'));
  }

  public function reportsearch(Request $request)
  {

    $request->validate([
      'search' => 'required',
    ]);
    $search = $request->search;
    $reports =  \DB::select(" SELECT inventories.id,itemName, sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID WHERE  inventorysettings.itemName like '" . $search . "%'");
    return view('reports.viewreports', compact('reports'));
  }

  public function SearchItemReportBetweenDateoutstock(Request $request)
  {
    $request->validate([
      'search1' => 'required',
      'search2' => 'required',


    ]);
    $date1 = $request->search1;
    $date2 = $request->search2;


    $reports = \DB::select("SELECT  itemName,   sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID WHERE  DATE BETWEEN '" . $date1 . "' and '" . $date2 . "'");

    return view('reports.viewreports', compact('reports'));
  }
  public function instock()
  {

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where instock>0;");

    return view('reports.onlyinstock', compact('reports'));
    //SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where instock>0;



  }

  public function outstock()
  {

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where outstock>0;");

    return view('reports.onlyoutstock', compact('reports'));
  }
  public function searchinstock(Request $request)
  {
    $request->validate([
      'search' => 'required',
    ]);
    $search = $request->search;

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id WHERE  inventorysettings.itemName like '" . $search . "%' AND  instock>0;");

    return view('reports.onlyinstock', compact('reports'));
  }



  public function searchinstockdate(Request $request)
  {
    $request->validate([
      'search' => 'required',
    ]);
    $date = $request->search;

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where instock>0 and date='" . $date . "';");
    return view('reports.onlyinstock', compact('reports'));
  }
  public function SearchItemBetweenDateinstock(Request $request)
  {
    $request->validate([
      'search1' => 'required',
      'search2' => 'required',


    ]);
    $date1 = $request->search1;
    $date2 = $request->search2;
    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where instock>0 and date BETWEEN '" . $date1 . "' and '" . $date2 . "';");
    return view('reports.onlyinstock', compact('reports'));
  }
  //outstock only

  public function searchoutstock(Request $request)
  {
    $request->validate([
      'search' => 'required',
    ]);
    $search = $request->search;

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id WHERE  inventorysettings.itemName like '" . $search . "%' AND  outstock>0;");

    return view('reports.onlyoutstock', compact('reports'));
  }

  public function searchoutstockdate(Request $request)
  {
    $request->validate([
      'search' => 'required',
    ]);
    $date = $request->search;

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where outstock>0 and date='" . $date . "';");
    return view('reports.onlyoutstock', compact('reports'));
  }
  public function SearchItemBetweenDateoutstock(Request $request)
  {
    $request->validate([
      'search1' => 'required',
      'search2' => 'required',


    ]);
    $date1 = $request->search1;
    $date2 = $request->search2;
    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where outstock>0 and date BETWEEN '" . $date1 . "' and '" . $date2 . "';");
    return view('reports.onlyoutstock', compact('reports'));
  }
  //itemwisestock

  public function itemwisestock(Request $request)
  {
    return view('reports.itemwisestock');
  }

  public function SearchItemBetweenDateitemwisestok(Request $request)
  {

    $request->validate([
      'search1' => 'required',
      'search2' => 'required',
      'search' => 'required',
    ]);

    $date1 = $request->search1;
    $date2 = $request->search2;
    $search = $request->search;
    $reports = \DB::select("SELECT  itemName,   sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID WHERE  DATE BETWEEN '" . $date1 . "' and '" . $date2 . "' AND inventorysettings.itemName like '" . $search . "%' ;");
    return view('reports.itemwisestock', compact('reports'));
  }
  public function Groupwisestock()
  {


    $reports = ItemGroup::all();
    return view('reports.itemgroupwisestock', compact('reports'));





    //$reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id where outstock>0;");


  }
  public function singleitemgroupwisestock($id)
  {

    //$reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventorysettings on inventories.inventoryID=inventorysettings.id ");
    $reports = \DB::select("SELECT  itemName,   sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID inner join item_groups  on inventorysettings.itemgroup_id=item_groups.id   WHERE inventorysettings.itemgroup_id = '" . $id . "' ;");
    //dd($reports);

    return view('reports.singleitemgroupwisestock', compact('reports'));
  }
  public function SubGroupwisestock()
  {
    $reports = itemSubGroup::all();
    return view('reports.SubGroupwisestock', compact('reports'));
  }
  public function singleSubGroupwisestock($id)
  {


    $reports = \DB::select("SELECT  itemName,   sum(instock) as inqty, sum(outstock) as ouqty, sum(instock)-sum(outstock) as totalQty FROM `inventories` INNER JOIN inventorysettings on inventorysettings.id=inventories.inventoryID inner join item_sub_groups  on inventorysettings.sub_groups_id=item_sub_groups.id   WHERE inventorysettings.sub_groups_id = '" . $id . "' ;");

    return view('reports.singleSubGroupwisestock', compact('reports'));
  }
  public function companyInfo()
  { 
 
    $companyinfo = CompanyInfo::find(1);
    if($companyinfo) {
      return view('reports.companyInfo',compact('companyinfo'));

       }
     else{
    return view('reports.companyInfo');
  }

   

  }

  public function storecompanyinfo(Request $request)
  {
    if($request->id) {
      $request->validate([
        'companyName' => 'required',
        'address' => 'required',
        'contactNumber' => 'required',
        'VatNo' => 'required',
      ]);
    $company=CompanyInfo::find($request->id);                
    $company->companyName = $request->companyName;
    $company->address = $request->address;
    $company->contactNumber = $request->contactNumber;
    $company->VatNo = $request->VatNo; 
    $company->update();
    
    //return view('Company.add-company',compact('companies'))->with('company_updated','Company updated is successfully updated');
    return redirect()->back()->with('companyinfo_added','Companyinfo updated is successfully updated'); 

    } 
    
    else {



      $request->validate([
        'companyName' => 'required',
        'address' => 'required',
        'contactNumber' => 'required',
        'VatNo' => 'required',

      ]);
      //$companies = CompanyInfo ::orderBy("id","desc")->where('status','0')->take(10)->get();
      $company = new CompanyInfo();
      $company->companyName = $request->companyName;
      $company->address = $request->address;
      $company->contactNumber = $request->contactNumber;
      $company->VatNo = $request->VatNo;

      $company->save();

      $companyinfo = CompanyInfo::FindorFail(1);

      return redirect()->back()->with('companyinfo_added', 'CompanyInfo  added successfully', compact('companyinfo'));
    }
  }

  public function facialyear(Request $request)
  {
    return view('reports.facialyear'); 
  }

  public function addfacialyear(Request $request)
  {
      
    
    $request->validate([
      'companyName' => 'facialyeardate',
     

    ]);
    
    $facialyear = new FacialYear();
    $facialyear->facialyearstart = $request->facialyeardate;
    $facialyear->save();
    return redirect()->back()->with('addfacialyear', 'addfacialyear  added successfully');
    //return redirect()->back()->with('companyinfo_added', 'CompanyInfo  added successfully', compact('companyinfo'));

  
  }
}
