@extends('theme1.template')
@section('title','Paint License Plate')
@section('content')
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Paint a License Plate</h2>
                <p> </p>
            </div>

            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                     @include('common.plate_generator')
                </div>
            </div>



        </div>
    </section><!-- End Team Section -->

@endsection

