@extends('en.layout.layout')
@section('title',"New Ad | ".env('APP_NAME'))
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
                    <section id="content" class="col-md-12 content-r">

                        <h1>Post new Ad</h1>


                        <!-- top blocks area -->
                        <aside class="top">

                            <section class="content_block">
                                 @include('common.new_ad')

                            </section>


                            <!-- top blocks area end -->
                        </aside>


                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
