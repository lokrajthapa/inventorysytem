@extends('index')


@section('content')
    <div id="page-wrapper">
        <div class="main-page">

            <div class="forms">
                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Stock In</h4>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action="{{ url('dummydataStore') }}" method="POST">
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
            <div class="forms">
                <div class=" form-grids row form-grids-right">
                    <div class="widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Items</h4>
                        </div>
                        <div class="form-body">
                            <form class="form-horizontal" action=" " method="POST">
                                <input type="hidden" name="_token" value="">

                                <div class="form-group">

                                    <div class="col-sm-3">

                                        <input type="text" class="form-control" name="itemId" id="itemId" 
                                        value="">

                                        <input type="text" class="form-control" name="product"   onkeyup="selectProductsFromTable()" id="itemName"
                                            data-toggle="modal" data-target="#myModal" placeholder="Product" value="">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="itemUnits" 
                                        value="">
                                        <input type="text" class="form-control" placeholder="Unit" id="itemUnits">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="quantity" >
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Bonus" >
                                    </div>

                                </div>
                                <div class="form-group">


                                    <div class="col-sm-3">

                                        <input type="hidden" name="itemgroup_id" id="itemgroup_id" value="">

                                        <input type="text" class="form-control" placeholder="Rate" value="Rate">

                                    </div>


                                </div>


                                <div class="col">
                                    <button type="submit" class="btn btn-default">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="inline-form widget-shadow">

                <!-- searach start -->

                <div class="form-body">
                    <div data-example-id="simple-form-inline">
                        <form class="form-inline" action="http://127.0.0.1:8000/searchsubgroupitems" method="POST">
                            <input type="hidden" name="_token" value="">
                            <div class="form-group">
                                <input type="text" id="searchData" class="form-control" name="search"
                                    placeholder="Search group">
                            </div>

                            <button type="submit" class="btn btn-default">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body widget-shadow">

                <table class="table" id="displaySearchItems">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Group</th>
                            <th>Subgroup</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">6</th>
                            <td>Shoes</td>

                            <td>Nike Jordan S</td>
                            <td>0</td>
                            <td>
                                <a href="/subgroup/6-Shoes" class="btn btn-info">Edit </a>
                                <a href="/delete-subgroupitem/6" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Shoes</td>

                            <td>Nike</td>
                            <td>0</td>
                            <td>
                                <a href="/subgroup/5-Shoes" class="btn btn-info">Edit </a>
                                <a href="/delete-subgroupitem/5" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Shoes</td>

                            <td>Puma</td>
                            <td>0</td>
                            <td>
                                <a href="/subgroup/4-Shoes" class="btn btn-info">Edit </a>
                                <a href="/delete-subgroupitem/4" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Shoes</td>

                            <td>Adidas</td>
                            <td>0</td>
                            <td>
                                <a href="/subgroup/3-Shoes" class="btn btn-info">Edit </a>
                                <a href="/delete-subgroupitem/3" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>

                            </td>
                        </tr>

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
                                        <input type="text" onkeyup="selectProductsFromTable()" name="search" id="searchProducts" value="" class="form-control"
                                            id="" placeholder="Search  products ">
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
                                            <th>Product Name</th><th>Unit</th>

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
        function putItemIntoTextField(itemId, itemName,units) {
           // alert(itemName);
            $("#itemName").val(itemName);
           
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
                   query:searchKey,
                },
                dataType: 'json',
                success: function(data) {
                    $("#DataTable tbody").empty();
                    response = data;
                    for (var i = 0; i < response.length; i++) {
                        var str = '<tr><td><a onclick="putItemIntoTextField(' +
                            response[i].id + ',\'' + response[i].itemName + '\',\'' + response[i].units + '\')" href="#">' +
                            response[i].itemName + '</a></td> <td>'+response[i].units+'</td></tr>';

                        $("#DataTable tbody").append(str);
                    }
                }

            })
        }
    </script>
@endsection
