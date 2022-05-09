<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemGroup;

class ItemGroupController extends Controller
{
    //
    public function  addGroupIteam()
    {  
       $groupitems=ItemGroup::orderBy("id","desc")->where('status','0')->take(10)->get();
       return view('groupitem.itemGroup',compact('groupitems'));
    }
    public function  groupitemstore(Request $request)
    {   
        if($request->group_idEdit)
        {
            $group=ItemGroup::find($request->group_idEdit);      
            $group->groupName=$request->groupName;    
            $group->update();
            return back()->with('group_updated','Group Item  is successfully updated');

        }
        else
        {
            $request->validate(['groupName' => 'required|unique:item_groups']);
            $group = new ItemGroup();
            $group->groupName =$request->groupName;      
            $group->save();
            $groupitems=ItemGroup::orderBy("id","desc")->take(10)->where('status','0')->get();

            return redirect()->back()->with('group_added','Group Item added successfully');   
            //return redirect('/group',compact('groupitems'))->with('group_added','Group Item added successfully'); 
        }
            



    }
 
    public function groupitemedit($id)
    { 
        $groupitems=ItemGroup::orderBy("id","desc")->where('status','0')->take(10)->get();
        $group=ItemGroup::FindorFail($id);       
        return view('groupitem.itemGroup', compact('group','groupitems'));
    }
    public function UpdateGroup(Request $request)
    {      
        $groupitems=ItemGroup::orderBy("id","desc")->take(10)->get();
        $group=ItemGroup::find($request->id);      
        $group->groupName=$request->groupName;    
        $group->update();
        return view('groupitem.itemGroup',compact('groupitems'))->with('group_updated','Group Item  is successfully updated');
    }
    public function DeleteGroup($id)
    {   
          $group=ItemGroup::find($id);  
         $group ->status =1;    
          $group->update();
          return back()->with('Group_delete','Group Item delete is delete successfully');

    }
    public function SearchGroup(Request $request)
    {  
      
        $request->validate([
            'search' => 'required',        
          ]);
        $search=$request->search;      
        $groupitems=ItemGroup::where('groupName', 'LIKE', '' . $search . '%' )->where('status','0')->take(10)->get();          
        return view('groupitem.itemGroup',compact('groupitems'));

    
     
    }
}
