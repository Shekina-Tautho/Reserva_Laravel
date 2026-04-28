@extends('layouts.user.content')

@section('title', 'Homepage')

@section('content')

<!--Include Homepage CSS File-->
<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-12 mid-div d-flex flex-column align-items-center">
            <div class="col-10 mt-5 position-relative">
                <div class="img-cont d-flex justify-content-center">
                    <img src="{{ asset('/images/homepage-banner.png') }}" alt="outdoor hotel" class="img-fluid rounded">

                    <form action="{{ route('UserHotelSearchRoute') }}" method="GET" class="search-box container shadow-lg rounded-4 bg-white p-4 position-absolute top-100 start-50 translate-middle">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request()->get('search') }}">
                            <button type="submit" class="btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <!--
                    <form id="searchForm" action="hotels.php" method="GET" class="search-box container shadow-lg rounded-4 bg-white p-4 position-absolute top-100 start-50 translate-middle">
                        <div class="row text-center">
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Location</h6>
                                <input type="text" name="location" class="form-control-plaintext search-input" placeholder="Where are you going?" required>
                            </div>
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Check In</h6>
                                <input type="date" name="checkin" class="form-control-plaintext search-input" required>
                            </div>
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Check Out</h6>
                                <input type="date" name="checkout" class="form-control-plaintext search-input" required>
                            </div>
                            <div class="col-md-3 col-6">
                                <h6 class="fw-semibold mb-1">Guests</h6>
                                <input type="number" name="guests" class="form-control-plaintext search-input" placeholder="Add guests" min="1" required>
                            </div>
                        </div>
                    </form>
                    -->
                </div>

                <div class="d-flex align-items-center justify-content-center flex-column py-5 mt-5">
                    <p class="xl blue bold mt-5">CC's Picks</p>
                    <span class="d-flex flex-column align-items-center mt-0">
                        Carefully selected stays with exclusive perks,
                        chosen just for you by CC Vacations.
                    </span>

                    <div class="col-12 cards-container d-flex flex-column align-items-center py-5">
                        @if (DB::table('hotel')->where('is_recommended', 1)->exists())
                            @foreach ($hotels as $hotel)
                                @if($hotel->is_recommended)
                                    <div class="card col-12 mb-3">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-4">
                                                    <img src="{{ asset('/images/' . $hotel->image_path . '.png') }}" alt="{{ $hotel->name }}" class="img-fluid rounded">
                                                </div>
                                                <div class="col-8">
                                                    <h2 class="card-title">{{ $hotel->name }}</h2>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                                            </svg>
                                                            <text class="card-text">{{ $hotel->address->locality }}, {{ $hotel->address->country }}</text>
                                                        </div>
                                                        <div class="col-6">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                            </svg>
                                                            <text class="card-text">{{ $hotel->min_capacity }}</text>
                                                            @if($hotel->max_capacity != null)
                                                                <text> - {{ $hotel->max_capacity }}</text>
                                                            @endif
                                                            <text>Guests</text>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            @for($i = 0; $i < $hotel->rating; $i++)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                </svg>
                                                            @endfor
                                                            @for($i = 0; $i < (5 - $hotel->rating); $i++)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                                                </svg>
                                                            @endfor
                                                            <text class="card-text">{{ $hotel->rating }}/5</text>
                                                        </div>
                                                        <div class="col-6">
                                                            <text class="card-text">${{ number_format($hotel->min_rate, 2) }}</text>
                                                            @if($hotel->max_rate != null)
                                                                <text> - ${{ number_format($hotel->max_rate, 2) }}</text>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <p class="card-text">Features</p>
                                                    <!--BUTTON TAG CLOUDS-->
                                                    @if(str_contains($hotel->features, 'Free Breakfast'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fork-knife" viewBox="0 0 16 16">
                                                                <path d="M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z"/>
                                                            </svg>
                                                            Free Breakfast
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Free WiFi'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wifi-2" viewBox="0 0 16 16">
                                                            <path d="M13.229 8.271c.216-.216.194-.578-.063-.745A9.46 9.46 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.577 1.336c.205.132.48.108.652-.065m-2.183 2.183c.226-.226.185-.605-.1-.75A6.5 6.5 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.408.19.611.09A5.5 5.5 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.611-.091zM9.06 12.44c.196-.196.198-.52-.04-.66A2 2 0 0 0 8 11.5a2 2 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z"/>
                                                            </svg>
                                                            Free WiFi
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Parking Space'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                                                            </svg>
                                                            Parking Space
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Private Balcony'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-alt-high-fill" viewBox="0 0 16 16">
                                                                <path d="M8 3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 3m8 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5m-13.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1zm11.157-6.157a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m-9.9 2.121a.5.5 0 0 0 .707-.707L3.05 5.343a.5.5 0 1 0-.707.707zM8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4"/>
                                                            </svg>
                                                            Private Balcony
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Restaurant'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                                                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
                                                            </svg>
                                                            Restaurant
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Swimming Pool'))
                                                        <button type="button" class="btn btn-outline-secondary mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-water" viewBox="0 0 16 16">
                                                                <path d="M.036 3.314a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 3.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 6.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0L.314 9.964a.5.5 0 0 1-.278-.65m0 3a.5.5 0 0 1 .65-.278l1.757.703a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.014-.406a2.5 2.5 0 0 1 1.857 0l1.015.406a1.5 1.5 0 0 0 1.114 0l1.757-.703a.5.5 0 1 1 .372.928l-1.758.703a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.014-.406a1.5 1.5 0 0 0-1.114 0l-1.015.406a2.5 2.5 0 0 1-1.857 0l-1.757-.703a.5.5 0 0 1-.278-.65"/>
                                                            </svg>
                                                            Swimming Pool
                                                        </button>
                                                    @endif
                                                    <a href="{{ url('hoteldetails', $hotel->hotel_id) }}" class="viewBtn py-2 px-4 text-decoration-none mt-3 float-end">View</a>
                                                </div>
                                                
                                            </div>

                                            
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No CC's Picks available at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection