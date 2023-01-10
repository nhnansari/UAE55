@extends('theme1.template')
@section('title','Distinctive Numbers')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Your Favorites</h2>
                <p>Here is the stuff you loved at UAE55</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="row">
                        @foreach ($favorites as $favorite)

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="/rendered/{{$favorite->picture}}" class="img-fluid" alt="">

                                    </div>


                                    <div class="member-info">
                                        <a href="{{route('number',['ad'=>$favorite->slug])}}">  <h4>{{ $favorite->title }}</h4> </a>
                                        <span>{{ $favorite->description }}</span>
                                    </div>
                                    <div class="member-info">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4>{{ $favorite->price }} AED</h4>
                                            </div>
                                            <div class="col-6">
                                                <h4>{{ $favorite->ad_date }}</h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-sm-12 col-lg-6 col-xl-6 p-2 text-center">
                                            <a href="{{route('number',['ad'=>$favorite->slug])}}"><button class="btn btn-primary">Details</button></a>
                                        </div>
                                        <div class="col-6 col-sm-12 col-lg-6 col-xl-6 text-right p-2">
                                            <button class="btn btn-danger" onclick="removeFavorite({{$favorite->id}})">Remove <i class="bi bi-trash" title="Remove from Favorites"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="row">
                        {{ $favorites->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>



        </div>
    </section><!-- End Team Section -->

@endsection
