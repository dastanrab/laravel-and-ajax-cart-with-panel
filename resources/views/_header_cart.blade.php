<div class="col-lg-12 col-sm-12 col-12 main-section">
    <div class="dropdown">
        <button type="button" class="btn btn-info" data-toggle="dropdown">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> سبد <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
        </button>
        <div class="dropdown-menu">
            <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </div>
                <div style="visibility: hidden">

                {{$total = 0 }}
                @foreach((array) session('cart') as $id => $details)
                    {{ $total += $details['price'] * $details['quantity']}}
                @endforeach
            </div>
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                    <p>Total: <span class="text-info">ریال {{ $total }}</span></p>
                </div>
            </div>

            @if(session('cart'))
                @foreach((array) session('cart') as $id => $details)
                    <div class="row cart-detail">
                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                            <img src="{{ asset($details['photo']) }}" />
                        </div>
                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                            <p>{{ $details['name'] }}</p>
                            <span class="price text-info"> ریال{{ $details['price'] }}</span> <span class="count"> تعداد:{{ $details['quantity'] }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="{{ url('cart') }}" class="btn btn-primary btn-block">مشاهده همه</a>
                </div>
            </div>
        </div>
    </div>
</div>

