
<main id="main" class="main-site left-sidebar">

    <div class="container">

        	<!--Latest Products<-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($latestProduct as $lProduct)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" title="{{ $lProduct->name }}">
                                <figure><img src="{{ asset('storage') }}/{{ $lProduct->image }}" alt="{{ $lProduct->name }}"></figure>
                            </a>
						</div>
						<div class="product-info">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" class="product-name"><span>{{ $lProduct->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">${{ $lProduct->regular_price }}</span></div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>

            <!--Popular Products-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">Popular Products</h3>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($latestProduct->sortBy('quantity') as $lProduct)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" title="{{ $lProduct->name }}">
                                <figure><img src="{{ asset('storage') }}/{{ $lProduct->image }}" alt="{{ $lProduct->name }}"></figure>
                            </a>
						</div>
						<div class="product-info">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" class="product-name"><span>{{ $lProduct->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">${{ $lProduct->regular_price }}</span></div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>

             <!--Lowest Price Products-->
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">Lowest Price Products</h3>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($latestProduct->sortBy('regular_price') as $lProduct)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" title="{{ $lProduct->name }}">
                                <figure><img src="{{ asset('storage') }}/{{ $lProduct->image }}" alt="{{ $lProduct->name }}"></figure>
                            </a>
						</div>
						<div class="product-info">
							<a href="{{ route('product.details',['slug'=>$lProduct->slug]) }}" class="product-name"><span>{{ $lProduct->name }}</span></a>
                            <div class="wrap-price"><span class="product-price">${{ $lProduct->regular_price }}</span></div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>

    </div><!--end container-->

</main>
