@extends('index')
@section('content')
    <div id="page-wrapper">


        <div class="inline-form widget-shadow">
            <div class="form-title">
                <h4>Item Group Wise Stock</h4>
            </div>         
        </div>



        <div class="panel-body widget-shadow">
            <!-- <h4>Basic Table:</h4> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>In Stock</th>
                        <th>Out Stock</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
      
                 
            <?php $i = 0; ?>
            @foreach ($reports as $item)
                <?php $i++; ?>

                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>{{ $item->itemName }}</td>
                    <td>{{ $item->inqty }}</td>
                    <td>{{ $item->ouqty }}</td>
                    <td>{{ $item->totalQty }}</td>

                </tr>
            @endforeach
                </tbody>

                {{-- @endif   --}}
            </table>

        </div>

    </div>

    <style>
        .form2 {
            margin-top: 15px;
        }

    </style>
@endsection
