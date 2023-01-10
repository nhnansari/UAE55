@extends('admin.layout')
@section('title','Admin Dashboard')
@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Admin Dashboard
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-animation">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                         Ads
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="lnr-laptop-phone text-dark opacity-8"></i></div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Pending Ads</div>
                                <div class="widget-numbers">{{ $pending_ads }}</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="lnr-graduation-hat text-white"></i></div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Approved Ads</div>
                                <div class="widget-numbers"><span>{{$approved_ads}}</span></div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                <i class="lnr-apartment text-white"></i></div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Rejected Ads</div>
                                <div class="widget-numbers text-success"><span>{{$rejected_ads}}</span></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                        <span class="mr-1">
                            <a href="{{route('admin.ads')}}" style="color:white">View Details</a>
                        </span>
                    </button>
                </div>
            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                         Users
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="lnr-laptop-phone text-dark opacity-8"></i></div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Users</div>
                                <div class="widget-numbers">{{ $users }}</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="lnr-graduation-hat text-white"></i></div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Bids on Ads</div>
                                <div class="widget-numbers"><span>{{$bids}}</span></div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                        <span class="mr-1">
                            <a href="{{route('admin.ads')}}" style="color:white">View Details</a>
                        </span>
                    </button>
                </div>
            </div>


        </div>
    </div>

@endsection
