@extends('layouts.frontend.layout')
@section('content')
<!-- slider -->
<div class="slider">
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('frontend_assets/images/slide1.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend_assets/images/slide2.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend_assets/images/slide3.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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

<!-- trending -->

<div class="heading">
    <h6>Trending</h6>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <a href="javascript:void(0);">
                <div class="trendind-box">
                    Paintings
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <div class="trendind-box">
                Oil Paintings
            </div>
        </div>
        <div class="col-md-2">
            <div class="trendind-box">
                Landscapes
            </div>
        </div>
        <div class="col-md-2">
            <div class="trendind-box">
                New This Week
            </div>
        </div>
        <div class="col-md-2">
            <div class="trendind-box">
                Sculptures
            </div>
        </div>
        <div class="col-md-2">
            <div class="trendind-box">
                Feature
            </div>
        </div>
    </div>
</div>

<!-- discover -->

<div class="heading">
    <h6>Discover Art You Love From the World’s <br> Leading Online Gallery</h6>
</div>

<div class="discover-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="https://d3t95n9c6zzriw.cloudfront.net/homepage/hybrid-2021/hp-toptile1-hybrid-03022022-large.jpg"
                    class="d-block w-100" alt="...">
                <h3>Portraits of Her</h3>
                <p>Lorem Ipsum is simply dummy text</p>
                <a href="javascript:void(0);"><button class="mt-2">Explore</button></a>
            </div>
            <div class="col-md-4">
                <img src="https://d3t95n9c6zzriw.cloudfront.net/homepage/hybrid-2021/hp-toptile2-hybrid-03142022-large.jpg"
                    class="d-block w-100" alt="...">
                <h3>Portraits of Her</h3>
                <p>Lorem Ipsum is simply dummy text</p>
                <a href="javascript:void(0);"><button class="mt-2">Explore</button></a>
            </div>
            <div class="col-md-4">
                <img src="https://d3t95n9c6zzriw.cloudfront.net/homepage/hybrid-2021/hp-toptile3-hybrid-03032022-large.jpg"
                    class="d-block w-100" alt="...">
                <h3>Portraits of Her</h3>
                <p>Lorem Ipsum is simply dummy text</p>
                <a href="javascript:void(0);"><button class="mt-2">Explore</button></a>
            </div>
        </div>
    </div>
</div>

<!-- feature -->

<div class="heading">
    <h6>Featured Collections</h6>
</div>

<div class="discover-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="https://d3t95n9c6zzriw.cloudfront.net/homepage/2020/large-carousel/Hybrid-collections_bestsellers_room-large.jpg"
                    class="d-block w-100" alt="...">
                <h3>Powerful Portraits</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                <a href="javascript:void(0);"><button class="mt-2">Explore</button></a>
            </div>
            <div class="col-md-6">
                <img src="https://d3t95n9c6zzriw.cloudfront.net/homepage/2020/large-carousel/hybrid-collections_abstract_room-large.jpg"
                    class="d-block w-100" alt="...">
                <h3>Powerful Portraits</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                <a href="javascript:void(0);"><button class="mt-2">Explore</button></a>
            </div>
        </div>
    </div>
</div>

<!-- artist -->

<div class="container-fluid">
    <div class="heading2">
        <h6>Famous Artists</h6>
        <a href="javascript:void(0);">
            <p>View all <i class="fa fa-angle-right" aria-hidden="true"></i></p>
        </a>
    </div>
</div>

<div class="artist-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);">
                    <div class="artist-box">
                        <img src="https://images.saatchiart.com/saatchi/223486/art/3912891/2982770-HSC00001-23.jpg"
                            class="d-block w-100" alt="...">
                        <h6>Eternal Triangle</h6>
                        <p>Aaron Lee</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection