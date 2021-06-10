@extends('welcome')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row" style="direction: rtl">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3" style="direction: rtl">
                    <div class="thumbnail"  >
                        <img src="{{ asset($product->photo) }}" class="img-thumbnail" style="width: 450px;height: 200px">
                        <div class="caption" style="text-align: center">
                            <h4 >{{ $product->name }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit(strtolower($product->description), 50) }}</p>
                            <p><strong>قیمت: </strong> {{ $product->price }}ریال</p>
                            <p id="{{$product->id}}" class="btn-holder"><a  class="add-to-cart btn btn-warning btn-block text-center" data-id="{{$product->id}}">اضافه کردن کالا</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>
    <div><div class="d-flex justify-content-center" >
            {!! $products->links() !!}
        </div></div>

@endsection
@section('scripts')

    <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {

                    toastr.success('کالا اضافه شد');
                    $("#header-bar").html(response.data);


                }

            });
        });
    </script>

@endsection


