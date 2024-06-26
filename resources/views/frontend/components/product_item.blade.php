
@if (isset($product))
    <div class="product-item">
        <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title="" class="avatar image contain">
            <img alt="{{  $product->pro_name }}" data-src="{{ pare_url_file($product->pro_avatar) }}" src="{{  asset('images/preloader.gif') }}" class="lazyload lazy">
        </a>
        <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}"
         title="{{  $product->pro_name }}" class="title">
            <h3>{{  $product->pro_name }}</h3>
        </a>
        @if ($product->pro_number <= 0)
            <p style="position: absolute;right: 10px;color: #E91E63;font-weight: bold;">Tạm hết hàng</p>
        @endif

        <p class="rating" style="
    margin-left: 10px;
">
            <span>
                @php
                    $iactive = 0;
                    if ($product->pro_review_total){
                        $iactive = round($product->pro_review_star / $product->pro_review_total,2);
                    }

                @endphp
                @for($i = 1 ; $i <= 5 ; $i ++)
                    <i class="la la-star {{ $i <= $iactive ? 'active' : ''  }}"></i>
                @endfor
            </span>
{{--            <span class="text">{{ $product->pro_review_total }} đánh giá</span>--}}
        </p>
        @if ($product->pro_sale)
            <p style="
    margin-left: 10px;
">
                <span class="percent">-{{ $product->pro_sale }}%</span>
                @php
                    $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                @endphp
                <span class="price" style="padding-left:10px">{{  number_format($price,0,',','.') }} đ</span>
                <span class="price-sale" style="padding-left:10px">{{ number_format($product->pro_price,0,',','.') }} đ</span>
            </p>
        @else
            <p class="price" style="padding-left:10px">{{  number_format($product->pro_price,0,',','.') }} đ</p>
        @endif

    </div>
@endif
