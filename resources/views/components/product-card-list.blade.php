<div class="single-product">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="product-image">
                <img src="{{ $product->image_url }}" alt="#">
                @if ($product->sale_percent)
                    <span class="sale-tag">-{{ $product->sale_percent }}%</span>
                @endif
                @if ($product->new)
                    <span class="new-tag">New</span>
                @endif
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="button">
                        <button class="btn" type="submit"><i class="lni lni-cart"></i> Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-12">
            <div class="product-info">
                <span class="category">Camera</span>
                <h4 class="title">
                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                </h4>
                <ul class="review">
                    @for ($i = 1; $i <= 5; $i++)
                        <li><i class="lni lni-star{{ ($i <= $product->rating)? '-filled' : '' }}"></i></li>
                    @endfor
                    <li><span>{{ $product->rating }} Review(s)</span></li>
                </ul>
                <div class="price">
                    <span>{{ Currency::format($product->price) }}</span>
                    @if ($product->compare_price)
                        <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
