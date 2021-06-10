<table cellspacing="0" cellpadding="1" border="1" width="300" >
    <thead>
    <tr>
        <th style="width:50%">کالا</th>
        <th style="width:10%">حذف</th>

    </tr>
    </thead>
</table>

<div style=" height:250px; overflow:auto;"><div> <table cellspacing="0" cellpadding="1" border="1" width="300" >
            <tbody>


            @foreach($products as $product)



                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset($product->photo)}}" style="height: 50px;width: 50px" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $product->name }}</h4>
                            </div>
                        </div>
                    </td>


                    <td class="actions" data-th="">

                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $product->id }}"><i class="fa fa-trash-o"></i></button>
                        <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                        <button class="update btn-dark" style="border-radius: 10%;font-size: small" data-id="{{ $product->id }}" >ویرایش </button>
                    </td>
                </tr>



                @endforeach

                </tbody>
        </table> </div>
</div>
<script>
    $(".update").click(function (e) {
        var ele = $(this);
        var data=ele.attr("data-id");

        $('#box').load('/update'+'/'+ data);


    })
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);



        var parent_row = ele.parents("tr");



        if(confirm("ایا مطمئن هستید؟")) {
            $.ajax({
                url: '{{ url('remove') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                dataType: "json",
                success: function (response) {

                    parent_row.remove();

                    toastr.success(response.msg);
                }
            });

        }
    });


</script>
