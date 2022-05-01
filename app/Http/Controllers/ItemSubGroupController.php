<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemGroup;

use App\Models\itemSubGroup;


class ItemSubGroupController extends Controller
{
    //
    public function addsubgroup()
    {
        $subgroupitems=itemSubGroup::with('ItemGroup')->orderBy('id','DESC')->take(10)->get();
        return view('subgroupitem.add-subgroup',compact('subgroupitems'));
    }

    public function SearchGroup(Request $request)
    {  

        // $data = array(
        //     'table_data'=>'haha',
        //     'total_data'=>'lado'
        // );
        // echo json_encode($data);




        if($request->ajax())
        {  
           // dd('request is submitted');
            $query= $request->get('query');
            if($query !='')
            {
                $data =ItemGroup::where ( 'groupName', 'LIKE', '' . $query . '%' )->orderBy('groupName','desc')->get();    
            }
            
        }
        // //$total_row= $data->count();

        // if($total_row>0)
        // {
        //    foreach($data as $row )
        //    { 


        //        $output='<tr>
        //       <td>
        //          '.$row->CustomerName.'
        //        </td>
                  
            
        //        </tr>';
        //    }

        //    return 'you are right path';

        // }
        // else
        // {
        //     $output='<tr> 
        //     <td algin="center" colspan="5">No data found </td>
        //     </tr>';
        //     return 'you are not in wirrdfsdsadf';
        // }
        // $data = array(
        //     'table_data'=>$output,
        //     'total_data'=>$total_data
        // );
        return json_encode($data);

    //     $subgroupitems=itemSubGroup::with('ItemGroup')->get(); 
       

    //    $search=$request->search;
    //    $searches =ItemGroup::where ( 'groupName', 'LIKE', '%' . $search . '%' )->get();   
    //    if(count ($searches ) > 0)
    //       return view('subgroupitem.add-subgroup',compact('searches','subgroupitems'));
    //      else 
    //   return view('subgroupitem.add-subgroup')->with('searches ','Group Item   added successfully');
    	
         
    
     
    }

    public function selectgroupitem($id)
    { 
        $subgroupitems=itemSubGroup::with('ItemGroup')->get();
        //$subgroupitems=itemSubGroup::all();
        $groupitems=ItemGroup::findorFail($id);
        return view('subgroupitem.add-subgroup',compact('groupitems','subgroupitems'));
    }

    public function subgroupstore(Request $request)
    {   
        if($request->itemgroup_id)
        {      
        $request->validate(['subGroupName' => 'required','itemgroup_id'=>'required']);
        $subgroup = new itemSubGroup();
        $subgroup->subGroupName =$request->subGroupName;      
        $subgroup->itemgroup_id =$request->itemgroup_id;      
        $subgroup->save();
        return redirect()->back()->with('group_added','Sub Group Item   added successfully');  
        
       }
       elseif( $request->itemgroup_id && $request->itemgroup_idEdit)
       {
            $subgroup=itemSubGroup::find($request->id);      
            $subgroup->subGroupName=$request->subGroupName;      
            $subgroup->itemgroup_id=$request->itemgroup_idEdit;    
            $subgroup->update();
            return redirect()->back()->with('subgroup_updated','Group Item  is successfully updated');
       }
       else{

       }
    
    }

    public function subgroupitemedit($id)
    {    
        $group=ItemGroup::FindorFail($id);       
        $subgroup=itemSubGroup::FindorFail($id);  
        $subgroupitems=itemSubGroup::with('ItemGroup')->orderBy('id','DESC')->take(10)->get();
        //dd($subgroup);
        return view('subgroupitem.add-subgroup', compact('group','subgroup','subgroupitems'));
    }

    // public function UpdateSubGroup(Request $request)
    // {     
      
    //     $subgroup=itemSubGroup::find($request->id);      
    //     $subgroup->subGroupName=$request->subGroupName;      
    //     $subgroup->itemgroup_id=$request->itemgroup_id;    
    //     $subgroup->update();
    //     return back()->with('subgroup_updated','Group Item  is successfully updated');
    // }

    public function DeleteSubGroup($id)
    {
        $subgroup =itemSubGroup::find($id);       
        $subgroup->delete();
        return back()->with('subGroup_delete','Group Item delete is delete successfully'); 
    }

    public function SearchsubGroupitem()
    {
        $search=$request->search;
        $searches =itemSubGroup::where ( 'subGroupName', 'LIKE', '%' . $search . '%' )->get();   
        if(count ($searches ) > 0)
           return view('subgroupitem.add-subgroup',compact('searches',));
          else 
       return view('subgroupitem.add-subgroup')->with('searches','data not found please try again');
         
          
     
      
     
    }



}
