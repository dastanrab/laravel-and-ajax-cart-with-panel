<button class="btn-lg btn-success" id="back"> "بازگشت به لیست محصولات</button>
<br>
<br>
<form  method = "post" enctype="multipart/form-data" id="larav" action="" >
    <div class="row" id="validation-errors"></div>
    <div class="form-group">
        <input type="hidden" name="id" id="idx" value="{{$product->id}}">
        <label for="email">نام کالا:</label>
        <input type="text" class="form-control" id="name" placeholder="{{$product->name}}" name="name">
    </div>
    <div class="form-group">
        <label for="email">قیمت:</label>
        <input type="number" class="form-control" id="email" placeholder="{{$product->price}}" name="price">
    </div>
    <div class="form-group">
        <label for="email">عکس:</label>
        <input type="file" class="form-control" id="phone" placeholder="وارد کردن عکس" name="image">
        <img src="{{ asset($product->photo)}}" style="height: 50px;width: 50px" class="img-responsive"/>
    </div>

    <button type="submit" class="btn btn-primary" id="bsave">ثبت</button>
    </div>
</form>
<script>
    $("#back").click(function(e) {

        $('#box').load('/sss');
    });
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#larav').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ url('upd2')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(response) {

                    toastr.success(response.msg);
                    $('#box').load('/sss');
                },
                error: function(response){
                    $('#validation-errors').html('');
                    $.each(response.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                    });
                }
            });
        });
    });


</script>
