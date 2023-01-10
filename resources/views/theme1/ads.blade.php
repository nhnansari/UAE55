@extends('theme1.template')
@section('title','Distinctive Numbers')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Distinctive Numbers</h2>
                <p>Find a cool license number for you.</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-3 col-xl-3">
                    <h4>Filter</h4>
                    <form action="">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Price</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="price_min" class="form-control" id="formGroupExampleInput" placeholder="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="price_max" class="form-control" id="formGroupExampleInput" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Emirates</label>
                            <select type="text" class="form-control" name="emirates">
                                <option value="">- Any -</option>
                                <option value="Abu Dhabi">Abu Dhabi</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Sharjah">Sharjah</option>
                                <option value="Ajman">Ajman</option>
                                <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                <option value="Fujairah">Fujairah</option>
                                <option value="Umm Al Quawain">Umm Al Quawain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Sold</label>
                            <select type="text" class="form-control" name="sold">
                                <option value="unsold">Unsold</option>
                                <option value="sold">Sold</option>
                            </select>
                        </div>
                        <input type="submit" value="search" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-sm-12 col-lg-9 col-xl-9">
                    <div class="row">
                        @foreach ($ads as $ad)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="/rendered/{{$ad->picture}}" class="img-fluid" alt="">
                                        <div class="social">
                                            @auth
                                            @if(!$ad->isFavorite)
                                            <a href="#"  onclick="addFavorite({{$ad->id}})" class="prevent"><i class="bi bi-heart" title="Add to Favorite"></i></a>
                                            @endif
                                            <a href="#"  class="prevent"><i class="bi bi-hammer" title="Place a bid"></i></a>
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <a href="{{route('number',['ad'=>$ad->slug])}}">  <h4>{{ $ad->title }}</h4> </a>
                                        <span>{{ $ad->description }}</span>
                                    </div>
                                    <div class="row text-center">
                                        <h5>{{$ad->price}} AED</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 col-sm-12 col-lg-4 col-xl-4 p-2 text-center">
                                            <a href="{{route('number',['ad'=>$ad->slug])}}"><button class="btn btn-primary">Details</button></a>
                                        </div>
                                        <div class="col-8 col-sm-12 col-lg-8 col-xl-8 text-right p-2">
                                            @auth
                                                @if(!$ad->isFavorite)
                                                    <button class="btn btn-primary" onclick="addFavorite({{$ad->id}})">Make Favorite <i class="bi bi-heart" title="Add to Favorite"></i></button>
                                                @endif
                                             @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        {{ $ads->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>



        </div>
    </section><!-- End Team Section -->

@endsection

