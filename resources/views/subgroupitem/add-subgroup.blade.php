@extends('index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 </script> --}}
<div id="page-wrapper">
    <div class="main-page">

        <div class="forms">
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Add Subgroup Group</h4>
                    </div>
                  
                    <div class="form-body">

                        <div style=""> 

                            
                               <div data-example-id="simple-form-inline ">
                                            {{-- <form class="form-inline " action="{{url('/searchsubgroup')}}" method="" > --}}
                                                {{-- @csrf  --}}
                                                <div class="form-group"> 
                                                    <label for="Group Item" class="col-sm-2 control-label">Group</label>
                                                       
                                                    <div class="col-sm-9">    
                                                         <input type="text" name="search" id="search" value="{{ @$group->groupName}}" class="form-control" id="" placeholder="Search  Group "> 
                                                    </div>    
                                                </div>

                                </div>
                        </div>    
                    </div>

                    <div class="form-body">

                        <div style="margin-left: 17%"> 

                            
                            <div data-example-id="simple-form-inline" id="displaySearch">
                                <table style="width: 57%" id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Group Name</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody >
                               
                                       
                                    </tbody>
                                </table>
                            
                            </div></div></div>
                
                 <div class="form-body">
                    @if(Session::has('group_added'))
                        <p class="alert alert-success"> {{ Session::get('group_added') }}</p>
                     @endif
                     @if(Session::has('subGroup_delete'))
                        <p class="alert alert-success"> {{ Session::get('subGroup_delete') }}</p>
                     @endif
                     @if(Session::has('subgroup_updated'))
                        <p class="alert alert-success"> {{ Session::get('subgroup_updated') }}</p>
                     @endif
                      {{-- <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="POST"> --}}
                        <form class="form-horizontal" action="{{ url('/subgroupstore')}}" method="POST">
                            @csrf
                           
                            <input type="hidden" name="itemgroup_idEdit" id="itemgroup_idEdit" value="{{ @$subgroup->id}}"/>

                            <input type="hidden" name="itemgroup_id" id="itemgroup_id" value="{{ @$subgroup->id}}"/>
                            <div class="form-group">
                                 <label for="Group Item" class="col-sm-2 control-label"> Sub Group Item</label>
                                <div class="col-sm-9"> <input type="text" name="subGroupName" value="{{ @$subgroup->subGroupName}}" class="form-control" id="" placeholder="Enter Sub Group Item"> </div>
                            </div>
                           
                            <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inline-form widget-shadow">
        
    <!-- searach start -->

        <div class="form-body" action="{{url('/searchsubgroupitems')}}" method="POST">
            <div data-example-id="simple-form-inline">
                <form class="form-inline">
                    <div class="form-group"> <input type="text" class="form-control"  name="search" placeholder="Search group"> </div>
                 
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- searach end -->
    @if(isset($searches ))

    {{-- <div class="panel-body widget-shadow">
        <!-- <h4>Basic Table:</h4> -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Group name</th>

                    <th>Sub Item Name</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($searches as $item)
                <tr>
                    <th scope="row">{{ $item->id ?? ''  }}</th>
                    <td>{{ $item->itemgroup->groupName ?? '' }}</td>

                    <td>{{ $item->subGroupName ?? '' }}</td>
                    <td>{{ $item->status ?? ''}}</td>
                    <td>
                        <a href="/subgroup/{{$item->id}}" class="btn btn-info"> Edit </a> 
                        <a href="/delete-subgroupitem/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a> 

                    </td>
                </tr>
            @endforeach    
              
            </tbody>
        </table>
    </div> --}}

    @else


    <div class="panel-body widget-shadow">
        <!-- <h4>Basic Table:</h4> -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Group name</th>
                    <th>Sub Item Name</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($subgroupitems as $item)
                <tr>
                    <th scope="row">{{ $item->id ?? ''  }}</th>
                    <td>{{ $item->itemgroup->groupName ?? '' }}</td>

                    <td>{{ $item->subGroupName ?? '' }}</td>
                    <td>{{ $item->status ?? ''}}</td>
                    <td>
                        <a href="/subgroup/{{$item->id}}" class="btn btn-info"> <i class="fas fa-edit">Edit </i></a> 
                        <a href="/delete-subgroupitem/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');">  <i class="fa fa-refresh" >Delete</i> </a> 

                    </td>
                </tr>
            @endforeach    
              
            </tbody>
        </table>
    </div>
</div>


@endif
{{-- ajax  start--}}
{{-- <script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type :'post',
        url :'{{URL::to('searchsubgroup')}}',
        data:{'search':$value},
        success:function(data){
        $('#searchgroups').html(data);
    }
    });
    })
</script> --}}
<script type="text/javascript">
function putGroupNameAndGroupIdInTextField(groupId,groupName)
{
   // alert(groupId);
$("#itemgroup_id").val(groupId);
$("#search").val(groupName);
}

$(document).ready(function()
{     
   // groupname();





    function groupname(query ='')
    {
        
        $.ajax(
         {
                url :"{{ url('searchsubgroup') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {$("#DataTable tbody").empty();
                    response=data;
                   // alert(JSON.parse(JSON.stringify(response)));
                    //console.log(response.length);


                    for(var i=0; i<response.length; i++)
                    {
                     //   console.log(response[i].id);

                      var str='<tr><td><a onclick="putGroupNameAndGroupIdInTextField('+response[i].id+',\'' + response[i].groupName + '\')" href="#">'+response[i].groupName+'</a></td></tr>'; 

                      $("#DataTable tbody").append(str);
                    }


                  

                }

 

         }
        )
    }
    $(document).on('keyup','#search',function()
    {
      var query =$(this).val();
      groupname(query);

    });

    });
</script>
<script>
$.ajaxSetup({

    headers: {

    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });
</script>

{{-- ajax end start--}}   

{{-- <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 </script> --}}
@endsection