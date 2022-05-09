<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
    public function addcompany()
    {
         
       $companies=Company::orderBy("id","desc")->where('status','0')->take(10)->get();

       return view('Company.add-company',compact('companies'));
    }

    public function  companystore(Request $request)
    {   
       
        if($request->id)
        { 
            $request->validate([
                'companyName' => 'required',
                'address' => 'required',
                'contactNumber' => 'required',
              ]);
            $company=Company::find($request->id);                
            $company->companyName=$request->companyName; 
            $company->address =$request->address;      
            $company->contactNumber =$request->contactNumber;  
            $company->update();
            $companies = Company::orderBy("id","desc")->take(10)->get();
            //return view('Company.add-company',compact('companies'))->with('company_updated','Company updated is successfully updated');
            return redirect()->back()->with('company_updated','Company updated is successfully updated'); 
        }
        else{
        $request->validate([
            'companyName' => 'required|unique:companies',
            'address' => 'required|',
            'contactNumber' => 'required|unique:companies',
          ]);
        $companies = Company::orderBy("id","desc")->where('status','0')->take(10)->get();
        $company = new Company();
        $company->companyName =$request->companyName; 
        $company->address =$request->address;      
        $company->contactNumber =$request->contactNumber;      
        $company->save();
        //return view('Company.add-company',compact('companies'))->with('company_added','Company  added successfully');   
      
        return redirect()->back()->with('company_added','Company  added successfully');     
      
      }   
    }

    public function companyedit($id)
    { 
        $companies = Company::orderBy("id","desc")->where('status','0')->take(10)->get();
        $company=Company::FindorFail($id);       
        return view('Company.add-company',compact('company','companies'));
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
        $company=Company::findorfail($id);  
        $company->status=1;    
        $company->update();
         return back()->with('subGroup_delete','Group Item delete is delete successfully');

    }
    public function Searchcompany(Request $request)
    { 
       
        $request->validate([
            'search' => 'required',        
          ]);
        $search=$request->search;      
        $companies=Company::where('companyName', 'LIKE', '' . $search . '%' )->where('status','0')->take(10)->get();          
        return view('Company.add-company',compact('companies'));



   
       
    }
}
