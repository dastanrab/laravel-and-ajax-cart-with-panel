<form  method = "post" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="" >
    <div class="row" id="validation-errors"></div>
<div class="form-group">

    <label for="email">نام کالا:</label>
    <input type="text" class="form-control" id="name" placeholder="وارد کردن نام محصول" name="name">
</div>
<div class="form-group">
    <label for="email">قیمت:</label>
    <input type="number" class="form-control" id="email" placeholder="وارد کردن قیمت" name="price">
</div>
<div class="form-group">
    <label for="email">عکس:</label>
    <input type="file" class="form-control" id="phone" placeholder="وارد کردن عکس" name="image">
</div>

<button type="submit" class="btn btn-primary" id="butsave">ثبت</button>
</div>
</form>








<script type="text/javascript">


    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel-ajax-file-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ url('create')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(response) {

                    toastr.success(response.msg);
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

