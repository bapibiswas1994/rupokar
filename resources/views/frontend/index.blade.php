@extends('layouts.frontend.layout')
@section('style')
    {{--  --}}
@endsection
@section('content')
    <div class="main">
        <!-- slider -->        
        <div class="slider_hero">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ asset('frontend-assets/images/slide1.jpg')}}" class="" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('frontend-assets/images/slide2.jpg')}}" class="" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="{{ asset('frontend-assets/images/slide3.jpg')}}" class="" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        {{-- <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> --}}
                      </div>
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
        <!-- /slider -->
        <!-- famous artist -->
        <section id="artist" class="mt-5">
            <div class="container">
                <div class="title">
                    <h5>Artists</h5>
                    <h2>World famous artists</h2>
                </div><br>
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="javascript:void(0);"><img class="owl-img" src="{{ asset('frontend-assets/images/artist1.png')}}"></a>
                            <p class="mt-2">Leonardo da Vinci</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="javascript:void(0);"><img class="owl-img" src="{{ asset('frontend-assets/images/artist2.png')}}"></a>
                            <p class="mt-2">Pablo Picasso</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="javascript:void(0);"><img class="owl-img" src="{{ asset('frontend-assets/images/artist3.png')}}"></a>
                            <p class="mt-2">Vincent van Gogh</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="javascript:void(0);"><img class="owl-img" src="{{ asset('frontend-assets/images/artist4.png')}}"></a>
                            <p class="mt-2">MF Hussain</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /famous artist -->
        <!-- famous painting -->
        <section id="painting" class="mt-5">
            <img class="owl-img" src="{{ asset('frontend-assets/images/rainbowbg.png')}}">
            <div class="container" style="margin-top: -225px;">
                <div class="title">
                    <h5>Paintings</h5>
                    <h2>World famous paintings</h2>
                </div><br>
                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.blade.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting1.png')}}"></a>
                            <p class="mt-2">The Raft of the Medusa</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting2.png')}}"></a>
                            <p class="mt-2">The Harvesters</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting3.png')}}"></a>
                            <p class="mt-2"> A Sunday Afternoon on the...</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting4.png')}}"></a>
                            <p class="mt-2">The Girl With A Pearl Earring</p>
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting1.png')}}"></a>
                            <p class="mt-2">The Raft of the Medusa</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting2.png')}}"></a>
                            <p class="mt-2">The Harvesters</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting3.png')}}"></a>
                            <p class="mt-2"> A Sunday Afternoon on the...</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="artist-box">
                            <a href="product.php"><img class="owl-img" src="{{ asset('frontend-assets/images/painting4.png')}}"></a>
                            <p class="mt-2">The Girl With A Pearl Earring</p>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="product.php">
                            <div class="red-btn">
                                <p>View More <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </section>
        <!-- /famous painting -->
        <!-- testimonial -->
        <div class="testim">
            <div class="container">

                <section class="testimonials">
                    <div class="container">
                        <div class="title">
                            <h5>Testimonials</h5>
                            <h2>What our clients say</h2>
                        </div><br>
                        <div class="owl-carousel owl-theme testi">
                            <!-- Single Starts -->
                            <div class="item">
                                <div class="profile">
                                    <img src="https://images.unsplash.com/photo-1521225099409-8e1efc95321d?ixlib=rb-1.2.1&auto=format&fit=crop&h=153&q=80"
                                        alt="">
                                    <div class="information">
                                        <div class="stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>Furkan Giray</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita velit labore
                                    suscipit
                                    distinctio, officiis deserunt rem blanditiis ducimus. Voluptate quaerat assumenda
                                    qui
                                    veniam facilis doloribus maiores impedit ducimus cum accusamus.</p>
                                <div class="icon">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <!-- Single Ends -->
                            <div class="item">
                                <div class="profile">
                                    <img src="https://images.unsplash.com/photo-1521225099409-8e1efc95321d?ixlib=rb-1.2.1&auto=format&fit=crop&h=153&q=80"
                                        alt="">
                                    <div class="information">
                                        <div class="stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>Furkan Giray</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita velit labore
                                    suscipit
                                    distinctio, officiis deserunt rem blanditiis ducimus. Voluptate quaerat assumenda
                                    qui
                                    veniam facilis doloribus maiores impedit ducimus cum accusamus.</p>
                                <div class="icon">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="item">
                                <div class="profile">
                                    <img src="https://images.unsplash.com/photo-1521225099409-8e1efc95321d?ixlib=rb-1.2.1&auto=format&fit=crop&h=153&q=80"
                                        alt="">
                                    <div class="information">
                                        <div class="stars">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>Furkan Giray</p>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita velit labore
                                    suscipit
                                    distinctio, officiis deserunt rem blanditiis ducimus. Voluptate quaerat assumenda
                                    qui
                                    veniam facilis doloribus maiores impedit ducimus cum accusamus.</p>
                                <div class="icon">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /testimonial -->        
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection