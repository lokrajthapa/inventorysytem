<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemGroup;

class ItemGroupController extends Controller
{
    //

    public function  addGroupIteam()
    {  
       $groupitems=ItemGroup::all();
       return view('master.itemGroup',compact('groupitems'));
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
        $request->validate(['groupName' => 'required']);
        $group = new ItemGroup();
        $group->groupName =$request->groupName;      
        $group->save();
        return redirect()->back()->with('group_added','Group Item   added successfully');      
    }
 
    public function groupitemedit($id)
    { 
        $groupitems = ItemGroup::all();
        $group=ItemGroup::FindorFail($id);       
        return view('master.itemGroup', compact('group','groupitems'));
    }
    public function UpdateGroup(Request $request)
    {      
        $group=ItemGroup::find($request->id);      
        $group->groupName=$request->groupName;    
        $group->update();
        return back()->with('group_updated','Group Item  is successfully updated');
    }
    public function DeleteGroup($id)
    {
        $group =ItemGroup::find($id);       
        $group->delete();
         return back()->with('Group_delete','Group Item delete is delete successfully');

    }
    public function SearchGroup(Request $request)
    {

      $groupitems = ItemGroup::all();
       $search=$request->search;
       $searches =ItemGroup::where ( 'groupName', 'LIKE', '%' . $search . '%' )->get();   
       if(count ($searches ) > 0)
          return view('master.itemGroup',compact('searches',));
         else 
      return view('master.itemGroup')->with('searches','data not found please try again');
    	
         
    
     
    }
}
