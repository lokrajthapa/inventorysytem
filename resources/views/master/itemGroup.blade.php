@extends('index')
@section('content')
<div id="page-wrapper">
    <div class="main-page">

        <div class="forms">
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Add Group</h4>
                    </div>
                    <div class="form-body">
                     @if(Session::has('searches'))
                        <p class="alert alert-danger"> {{ Session::get('searches') }}</p>
                     @endif    
                    @if(Session::has('group_updated'))
                        <p class="alert alert-success"> {{ Session::get('group_updated') }}</p>
                     @endif
                     @if(Session::has('group_added'))
                     <p class="alert alert-success"> {{ Session::get('group_added') }}</p>
                     @endif
                     @if(Session::has('Group_delete'))
                        <p class="alert alert-success"> {{ Session::get('Group_delete') }}</p>
                     @endif
                        <form class="form-horizontal" action="{{ url('/Gitemstore')}}" method="POST">
                            @csrf
                            <input type="hidden" name="group_idEdit" id="group_idEdit" value="{{ $group->id }}"> 
                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Enter Group </label>
                                <div class="col-sm-9"> <input type="text"   value="{{$group->groupName }}" name="groupName" class="form-control" id="" placeholder="Enter Group Item"> </div>
                            </div>
                           
                            <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inline-form widget-shadow">
        <!-- <div class="form-title">
            <h4>Inline form Example 1 :</h4>
        </div> -->
        <div class="form-body">
            <div data-example-id="simple-form-inline">
                <form class="form-inline" action="{{url('/searchgroup')}}" method="POST">
                    @csrf 
                    <div class="form-group"> <input type="text" name="search" class="form-control" id="exampleInputEmail3" placeholder="Search group"> </div>
                 
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="panel-body widget-shadow">
        <!-- search items -->
     
    @if(isset($searches ))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>status</th>
                    <th>Action</th>                  
                </tr>
            </thead>
            <tbody>
         @foreach($searches as $item )
                <tr>
                    <th scope="row">{{ $item->id  }}</th>
                    <td>{{ $item->groupName }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/edit-groupitem/{{$item->id}}" class="btn btn-info" > <i class="fas fa-edit">Edit </i></a>                        
                        <a href="/delete-groupitem/{{$item->id}}" class="btn btn-danger" onlick="ConfirmDelete()" >  <i class="fa fa-refresh">Delete</i>  </a> </button>

                    </td>             
                </tr>
        @endforeach
            </tbody>
          </table>
  @else

     
          
    
          
   
        <!-- end search items -->


        <!-- <h4>Basic Table:</h4> -->
       
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($groupitems as $item)
                <tr>
                    <th scope="row">{{ $item->id  }}</th>
                    <td>{{ $item->groupName }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="/edit-groupitem/{{$item->id}}" class="btn btn-info" > <i class="fas fa-edit">Edit </i></a>                        
                        <a href="/delete-groupitem/{{$item->id}}" class="btn btn-danger" onlick=" return confirm('Are you sure you want to delete ?') "  >  <i class="fa fa-refresh">Delete</i>  </a> </button>

                    </td>
                </tr>
            @endforeach    
              
            </tbody>
        </table>
        
     </div>
    
   </div>
@endif
@endsection