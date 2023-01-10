@extends('theme1.template')
@section('title','My Ads')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Your License Plate ads</h2>
                <p>All ads</p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-3 col-xl-3">
                    <h4>Filter</h4>
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Price</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="0">
                                </div>
                                <div class="col-6">
                                    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Emirates</label>
                            <select type="text" class="form-control">
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
                        <input type="submit" value="search" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-sm-12 col-lg-9 col-xl-9">
                    <div class="row">
                        @foreach ($ads as $ad)
                            <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="/rendered/{{$ad->picture}}" class="img-fluid"  alt="{{$ad->title}}" style="height:300px;">

                                    </div>
                                    <div class="member-info">
                                        <a href="{{route('number',['ad'=>$ad->slug])}}">  <h4>{{ $ad->title }}</h4> </a>
                                        <span>{{ $ad->description }}</span>
                                    </div>
                                    <div class="member-info">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-4 col-sm-4 col-xl-4"><h4>  {{ $ad->price }} AED</h4></div>
                                            <div class="col-sm-12 col-lg-4 col-sm-4 col-xl-4"><h4>  {{ $ad->timeAgo }} </h4></div>

                                            <div class="col-sm-12 col-lg-4 col-sm-4 col-xl-4"><h4 style="color:@if($ad->status=='pending') orange @elseif($ad->status=="approved") green @elseif($ad->status=="rejected") red @endif ">  {{ strtoupper($ad->status) }} </h4></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 col-sm-12 col-lg-8 col-xl-8 text-right p-2">
                                          @if($ad->status!=="sold")
                                            <button class="btn btn-primary" onclick="markSold({{$ad->id}})">Mark Sold <i class="bi bi-heart" title="mark as Sold"></i></button>
                                            @endif
                                            <button class="btn btn-danger"  onclick="deleteAd({{$ad->id}})">Delete <i class="bi bi-delete" title="Delete this ad"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



        </div>
    </section><!-- End Team Section -->

@endsection

