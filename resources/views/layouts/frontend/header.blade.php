<a id="top-button"></a>

<div class="topbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="tel:90032101220"><i class="mr-1 fa fa-phone" aria-hidden="true"></i>90032101220</a>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a class="mr-1" href="javascript:void(0);">Login</a> |
                <a class="ml-1" href="javascript:void(0);">Register</a>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 logo">
                <img class="img-fluid" src="{{ asset('frontend_assets/images/logo.png') }}">
            </div>
            <div class="col-md-5">
                <div class="searchBar">
                    <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value="" />
                    <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                            <path fill="#666666"
                                d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-end">
                <ul class="nav">
                    @php
                        $allcat = app('App\Helpers\CategoryHelper')->getCategories();
                        $top_cat_id = 0;
                        $sub_cat_id = 0;
                        if (isset($_GET['cats']) && count($_GET['cats']) > 0) {
                            $sub_cat_id = $_GET['cats'][0];
                            $top_cat_id = app('App\Helpers\CategoryHelper')->getParentCategory($sub_cat_id);
                        }
                    @endphp
                    @foreach ($allcat as $item)
                    <li class="nav-item dropdown @if($item->id == $top_cat_id) nav-active @endif">
                        {{-- <a class="nav-link dwn-icn" href="{{url('/category/'.$item->cat_slug)}}" data-toggle="dropdown"
                            data-hover="dropdown">
                            {{$item->cat_title}}
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a> --}}
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{url('/category/'.$item->cat_slug)}}" role="button"
                            aria-haspopup="true" aria-expanded="false">{{$item->title}}</a>

                        {{-- <a class="nav-linkdroparrow desk-none" href="javascript:void(0);" data-toggle="dropdown"
                            data-hover="dropdown">
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a> --}}
                        @if(count($item->chields) > 0)
                            <div class="dropdown-menu">
                                @foreach($item->chields as $subcat)
                                <a class="dropdown-item @if($sub_cat_id == $subcat->id) nav-active @endif"
                                    href="{{ url('category-list/'.$item->slug . '/' . $subcat->slug) }}">{{$subcat->title}}</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                    @endforeach
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Painting</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>