@extends('index')


@section('content')
    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Stock Out</h4>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="" method="POST">
                                <input type="hidden" name="_token" value="">
                                <div class="form-group">
                                    <div class="col-sm-1">
                                        <label for="for ItemName" class="col-sm-2 control-label">
                                            Date
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" placeholder="Item Name"
                                            value="">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="vatable" class="col-sm-1 control-label">
                                            SN
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" readonly="" class="form-control" name="vatable"
                                            placeholder="Vatable" value="Auto" readonly>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

            @if (Session::has('itemdetails'))
                <p class="alert alert-success"> {{ Session::get('itemdetails') }}</p>
            @endif
            {{-- {{$dummydata[0]->id}} --}}
            <div class="forms">
                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Items</h4>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ url('/stockitemstoredummysecond') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ @$dummydata[0]->id }}">

                                <div class="form-group">

                                    <div class="col-sm-3">

                                        <input type="hidden" class="form-control" name="itemId" id="itemId"
                                            value="{{ @$dummydata[0]->item_id }} ">

                                        <input type="text" class="form-control" onkeyup="selectProductsFromTable()"
                                            id="itemName" data-toggle="modal" data-target="#myModal" placeholder="Product"
                                            value="{{ @$dummydata[0]->itemName }}">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="hidden" class="form-control" name="unitEqualsTo" id="unitEqualsTo"
                                            value="{{ @$dummydata[0]->unitEqualsTo }}">
                                        <input type="text" class="form-control" placeholder="Unit" id="itemUnits"
                                            name="Unit" value="{{ @$dummydata[0]->units }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="quantity" placeholder="quantity"
                                            value="{{ @$dummydata[0]->quantity }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="bonus" placeholder="Bonus"
                                            value="{{ @$dummydata[0]->bonus }}">
                                    </div>

                                </div>
                                <div class="form-group">


                                    <div class="col-sm-3">



                                        <input type="text" class="form-control" name="Rate" placeholder="Rate"
                                            value={{ @$dummydata[0]->rate }}>

                                    </div>


                                </div>


                                <div class="col">
                                    <button type="submit" class="btn btn-default">
                                        @if (@$dummydata[0]->id)
                                            Update
                                        @else
                                            Add
                                        @endif
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="panel-body widget-shadow">

                <table class="table" id="displaySearchItems">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Unit</th>
                            <th>Stock In</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($itemsdummy as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->units }}</td>

                            <td>{{ $item->instock }}</td>
                            <td>{{ $item->rate }}</td>


                            <td>
                                <a href="/stockOut/{{ $item->id }}" class="btn btn-info">Edit </a>
                                <a href="/stockoutdelete/{{ $item->id }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item ?');"> Delete
                                </a>

                            </td>
                        </tr>
                    @endforeach
                   

                    </tbody>
                </table>
            </div>



        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="form-body">

                        <div style="">


                            <div data-example-id="simple-form-inline ">
                                <div class="form-group">
                                    <label for="Group Item" class="col-sm-2 control-label">Product</label>

                                    <div class="col-sm-9">
                                        <input type="text" onkeyup="selectProductsFromTable()" name="search"
                                            id="searchProducts" value="" class="form-control" id=""
                                            placeholder="Search  products ">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-body">

                        <div>
                            <div data-example-id="simple-form-inline">
                                <table style="width: 100%" id="DataTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Unit</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end model -->
    </div>


    <script>
        function putItemIntoTextField(itemId, itemName, units, itemUnitsEqual) {

            //alert(itemUnitsEqual);
            $("#itemName").val(itemName);
            $("#unitEqualsTo").val(itemUnitsEqual);

            $("#itemId").val(itemId);
            $("#itemUnits").val(units);
            $("#myModal").modal('hide');
        }

        function selectProductsFromTable() {

            var searchKey = $("#searchProducts").val();
            // alert(searchKey);
            $.ajax({
                url: "{{ url('searchforstockitem') }}",
                method: 'GET',
                data: {
                    query: searchKey,
                },
                dataType: 'json',
                success: function(data) {
                    $("#DataTable tbody").empty();
                    response = data;
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td><a onclick="putItemIntoTextField(' +
                            response[i].id + ',\'' + response[i].itemName + '\',\'' + response[i].altUnits +
                            '\',\'' + response[i].equals + '\')" href="#">' +
                            response[i].itemName + '</a></td> <td>' + response[i].altUnits + '</td></tr>';

                        $("#DataTable tbody").append(str);
                    }
                }

            })
        }
    </script>
@endsection
