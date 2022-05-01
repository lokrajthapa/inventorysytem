<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function addcompany()
    {
         
       $companies = Company::all();
       return view('Company.add-company',compact('companies'));
    }

    public function  companystore(Request $request)
    {   
        $request->validate([
            'companyName' => 'required',
            'address' => 'required',
            'contactNumber' => 'required',
          ]);
        $company = new Company();
        $company->companyName =$request->companyName; 
        $company->address =$request->address;      
        $company->contactNumber =$request->contactNumber;      
        $company->save();
        return redirect()->back()->with('company_added','Company  added successfully');      
    }

    public function companyedit($id)
    {
        $company=Company::FindorFail($id);       
        return view('Company.edit-company',compact('company'));
    }

    public function UpdateCompany(Request $request)
    {
        $company=Company::find($request->id);      
        $company->companyName =$request->companyName; 
        $company->address =$request->address;      
        $company->contactNumber =$request->contactNumber;  
        $company->update();
        return back()->with('company_updated','Company updated is successfully updated');
    }
    public function DeleteCompany($id)
    {
        $company=Company::find($id);       
        $company->delete();
        return back()->with('company_delete','Company  is deleted successfully'); 

    }
    public function Searchcompany(Request $request)
    {
        $search=$request->search;
        $searches =Company::where ( 'companyName', 'LIKE', '%' . $search . '%' )->get();   
        if(count ($searches ) > 0)
           return view('Company.add-company',compact('searches',));
          else 
       return view('Company.add-company')->with('searches','data not found please try again');
    }
}
