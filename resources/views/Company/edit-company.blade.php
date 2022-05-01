@extends('index')
@section('content')
<div id="page-wrapper">
    <div class="main-page">

        <div class="forms">
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Edit Company</h4>
                    </div>
                    <div class="form-title">
                      <a href="{{ url('/Company')}}" style=""> <h4> Click To View Company list</h4> </a>
                    </div>

                    <div class="form-body">
                    @if(Session::has('company_updated'))
                        <p class="alert alert-success"> {{ Session::get('company_updated') }}</p>
                    @endif
                        <form class="form-horizontal" action="{{ route('company.update')}}" method="POST">
                            @csrf            
                          <input type="hidden" name="id" value="{{ $company->id }}" />
                          <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Company Name</label>
                            <div class="col-sm-9"> <input type="text" name="companyName" class="form-control" id=""  value="{{  $company->companyName }}"> </div>
                          
                        </div>
                        <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-9"> <input type="text" name="address" class="form-control" id="" value="{{  $company->address }}"> </div>
                         
                        </div>
                        <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label">Contact Number</label>
                            <div class="col-sm-9"> <input type="text" name="contactNumber" class="form-control" id="" value="{{ $company->contactNumber }}"> </div>

                        </div>           
                            <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Update</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endsection