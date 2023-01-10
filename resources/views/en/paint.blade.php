@extends('en.layout.layout')
@section('title',env('APP_NAME'))
@section('content')
    <div id="wrapper">
        <section id="main_container">
            <!-- bread crumbs block -->
            <div id="bread_crumbs">
                <ul class="point1">
                    <li accesskey="/"><a href="/" title="RakMoon.Com">Home</a></li>
                    <li accesskey="/"><a href="/vip-numbers" title="VIP Numbers">VIP Numbers</a></li>
                </ul>
            </div>
            <!-- bread crumbs block end -->
            <div class="inside-container point1 clearfix">
                <div class="row">
                      <!-- left blocks area end -->
                    <section id="content" class="col-md-9 content-r">

                        <h1>Distinctive Car Numbers</h1>


                        <!-- top blocks area -->
                        <aside class="top">

                            <section class="content_block">
                                <h3>Draw your Number</h3>
                                @include('common.plate_generator')

                            </section>


                            <!-- top blocks area end -->
                        </aside>


                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
