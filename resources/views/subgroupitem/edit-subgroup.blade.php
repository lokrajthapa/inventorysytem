@extends('index')
@section('content')
<div id="page-wrapper">
    <div class="main-page">

        <div class="forms">
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Edit Sub Group</h4>
                    </div>
                    <div class="form-title">
                      <a href="{{ url('/subgroup')}}" style=""> <h4> Click To View Sub-Group list</h4> </a>
                    </div>

                    <div class="form-body">
                    @if(Session::has('subgroup_updated'))
                        <p class="alert alert-success"> {{ Session::get('subgroup_updated') }}</p>
                    @endif
                        <form class="form-horizontal" action="{{ route('subgroupitem.update')}}" method="POST">
                            @csrf            
                          <input type="hidden" name="id" value="{{ $subgroup->id }}" />
                          <input type="hidden" name="itemgroup_id" value="{{ $subgroup->id }}" />

                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label"> Group Item</label>
                                <div class="col-sm-9"> <input type="text" name="" class="form-control" id="" placeholder="Enter Group Item" value="{{$group->groupName}}" readonly> </div>
                            </div>
                            <div class="form-group"> <label for="Group Item" class="col-sm-2 control-label"> Sub-Group Item</label>
                                <div class="col-sm-9"> <input type="text" name="subGroupName" class="form-control" id="" placeholder="Enter Group Item" value="{{ $subgroup->subGroupName}}"> </div>
                            </div>            
                            <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Update</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @endsection