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
                            <form class="form-horizontal" action="http://127.0.0.1:8000/itemsDetailsStore" method="POST">
                                <input type="hidden" name="_token" value="h2eUosYtvVVnziYAzfKrZMIrnP4RD0sl921zAOm9">
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
                            <form class="form-horizontal" action="http://127.0.0.1:8000/itemsDetailsStore" method="POST">
                                <input type="hidden" name="_token" value="h2eUosYtvVVnziYAzfKrZMIrnP4RD0sl921zAOm9">

                                <div class="form-group">

                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Product" value="">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Unit" value="Unit">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="quantity" value="quantity">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" placeholder="Bonus" value="Bonus">
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
                            <input type="hidden" name="_token" value="h2eUosYtvVVnziYAzfKrZMIrnP4RD0sl921zAOm9">
                            <div class="form-group"> <input type="text" id="searchData" class="form-control"
                                    name="search" placeholder="Search group"> </div>

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
                                    <a href="/delete-subgroupitem/6" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>
    
                                </td>
                            </tr>
                                                <tr>
                                <th scope="row">5</th>
                                <td>Shoes</td>
    
                                <td>Nike</td>
                                <td>0</td>
                                <td>
                                    <a href="/subgroup/5-Shoes" class="btn btn-info">Edit </a>
                                    <a href="/delete-subgroupitem/5" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>
    
                                </td>
                            </tr>
                                                <tr>
                                <th scope="row">4</th>
                                <td>Shoes</td>
    
                                <td>Puma</td>
                                <td>0</td>
                                <td>
                                    <a href="/subgroup/4-Shoes" class="btn btn-info">Edit </a>
                                    <a href="/delete-subgroupitem/4" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>
    
                                </td>
                            </tr>
                                                <tr>
                                <th scope="row">3</th>
                                <td>Shoes</td>
    
                                <td>Adidas</td>
                                <td>0</td>
                                <td>
                                    <a href="/subgroup/3-Shoes" class="btn btn-info">Edit </a>
                                    <a href="/delete-subgroupitem/3" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item ?');"> Delete </a>
    
                                </td>
                            </tr>
                        
                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection
