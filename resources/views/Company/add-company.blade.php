@extends('index')
@section('content')
<div id="page-wrapper">
    <div class="main-page">

        <div class="forms">
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Add Company</h4>
                    </div>
                    <div class="form-body">
                    @if(Session::has('company_added'))
                        <p class="alert alert-success"> {{ Session::get('company_added') }}</p>
                     @endif
                     @if(Session::has('company_delete'))
                        <p class="alert alert-success"> {{ Session::get('company_delete') }}</p>
                     @endif
                        <form class="form-horizontal" action="{{ url('/Companystore')}}" method="POST">
                            @csrf
                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Company Name</label>
                                <div class="col-sm-9"> <input type="text" name="companyName" class="form-control" id="" placeholder="Enter Company Name"> </div>
                               @if ($errors->has('companyName'))
                                     <span class="text-danger">{{ $errors->first('companyName') }}</span>
                                @endif
                            </div>
                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-9"> <input type="text" name="address" class="form-control" id="" placeholder="Enter Address"> </div>
                                  @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                  @endif
                            </div>
                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Contact Number</label>
                                <div class="col-sm-9"> <input type="text" name="contactNumber" class="form-control" id="" placeholder="Enter Contact Number"> </div>
                                 @if ($errors->has('contactNumber'))
                                    <span class="text-danger">{{ $errors->first('contactNumber') }}</span>
                                 @endif
                            </div>
                            {{-- <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-9"> <input type="text" name="groupName" class="form-control" id="" placeholder="Enter Group Item"> </div>
                            </div> --}}
                           
                            <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Add</button> </div>
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
                <form class="form-inline" action="{{url('/searchcompany')}}" method="POST" >
                    <div class="form-group"> <input type="text" name="search" class="form-control"  placeholder="Search group"> </div>
                 
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
    </div>

    @if(isset($searches ))
    <div class="panel-body widget-shadow">
        <!-- <h4>Basic Table:</h4> -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Company  Name</th>
                    <th>Company  Address</th>
                    <th>Company  Contact Number</th>

                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($searches  as $company)
                <tr>
                    <th scope="row">{{ $company->id  }}</th>
                    <td>{{ $company->companyName }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->contactNumber}}</td>
                     <td>{{ $company->status }}</td> 
                    <td>
                        <a href="/edit-Company/{{$company->id}}" class="btn btn-info" > <i class="fas fa-edit">Edit </i></a>                        
                        <a href="/delete-Company/{{$company->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');" >  <i class="fa fa-refresh">Delete</i>  </a> </button>

                    </td>
                </tr>
            @endforeach    
              
            </tbody>
        </table>
  
    </div>
    @else

   

    <div class="panel-body widget-shadow">
        <!-- <h4>Basic Table:</h4> -->
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Company  Name</th>
                    <th>Company  Address</th>
                    <th>Company  Contact Number</th>

                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id  }}</th>
                    <td>{{ $company->companyName }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->contactNumber}}</td>
                     <td>{{ $company->status }}</td> 
                    <td>
                        <a href="/edit-Company/{{$company->id}}" class="btn btn-info" > <i class="fas fa-edit">Edit </i></a>                        
                        <a href="/delete-Company/{{$company->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');" >  <i class="fa fa-refresh">Delete</i>  </a> </button>

                    </td>
                </tr>
            @endforeach    
              
            </tbody>
        </table>
  
    </div>
    @endif
</div>
@endsection