@extends('theme1.template')
@section('title','Distinctive Numbers')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Dashboard</h2>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12 card p-3">
                     <div class="row mb-4">
                        <div class="col-sm-6 col-lg-3 col-xl-3  text-center ">
                            <a class="btn btn-primary" href="{{route('paint')}}">Paint License Plate</a>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xl-3  text-center ">
                            <a class="btn btn-primary" href="{{route('new_ad')}}">Post New Ad</a>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">

                        <div class="col-sm-12 col-lg-4 col-xl-4 card text-center p-2">
                            <h3>Plate Number Ads</h3>
                            <table class="table">
                                <tr>
                                    <td>Total</td><td>{{$counts["license_plate_total"]}}</td>
                                </tr>
                                <tr>
                                    <td>Pending</td><td>{{$counts["license_plate_pending"]}}</td>
                                </tr>
                                <tr>
                                    <td>Approved</td><td>{{$counts["license_plate_approved"]}}</td>
                                </tr>
                                <tr>
                                    <td>Sold</td><td>{{$counts["license_plate_sold"]}}</td>
                                </tr>
                            </table>

                            <a class="" href="{{route('my_ads')}}">View All</a>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </section><!-- End Team Section -->

@endsection
