<section class="shop-home-list section">
    <div class="container">

        <div class="row">
            @foreach($products as $product)

            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>On sale</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="{{asset('uploads/image/'.$product->file_path)}}" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                                <p class="price with-discount">{{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                {{-- <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$44</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$89</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Single List  -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Best Seller</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="{{asset('uploads/image/'.$product->file_path)}}" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">{{$product->title}}</a></h5>
                                <p class="price with-discount">{{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                {{-- <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$33</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$77</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Single List  -->
            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Top viewed</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="{{asset('uploads/image/'.$product->file_path)}}" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">{{$product->title}}</a></h5>
                                <p class="price with-discount">{{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                {{-- <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$35</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single List  -->
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                <p class="price with-discount">$99</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Single List  -->
            </div>
            @endforeach
        </div>

    </div>
</section>
@yield('shoplist')
