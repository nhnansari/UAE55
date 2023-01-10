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
                    <!-- left blocks area on home page -->
                    <aside class="left col-md-3">
                        <section class="side_block">
                            <h3>VIP Numbers Search</h3>
                            <div class="clearfix">
                                <!-- side bar search form -->
                                <section class="side_block_search light-inputs">
                                    <div class="search-block-content no-tabs">

                                        <form method="post"
                                              action="/vip-numbers/distinctive-uae-car-numbers/search-results.html">
                                            <input type="hidden" name="action" value="search"/>
                                            <input type="hidden" name="post_form_key" value="vip_numbers_quick"/>

                                            <div class="scroller">
                                                <!-- fields block ( for search ) -->
                                                <div class="search-item	single-field">
                                                    <div class="field">Category</div>
                                                    <input type="hidden"
                                                           id="vip_numbers_quick_Category_ID_vip_numbers_value"
                                                           name="f[Category_ID]" value="2070"/>
                                                    <select id=""
                                                            class="multicat">
                                                        <option value="0">- Any -</option>
                                                        <option value="2070">Distinctive Car Numbers</option>
                                                    </select>
                                                </div>
                                                <div class="search-item	single-field">
                                                    <div class="field">Emirates</div>
                                                    <input type="hidden"
                                                           id="vip_numbers_quick_Category_ID_vip_numbers_value"
                                                           name="f[Category_ID]" value="2070"/>
                                                    <select id=""
                                                            class="multicat">
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

                                                <div class="search-item single-field">
                                                    <div class="field">Subcategory</div>
                                                    <select id="vip_numbers_quick_Category_ID_vip_numbers_level3"
                                                            disabled="disabled" class="multicat  last">
                                                        <option value="0">- Any -</option>
                                                    </select>
                                                </div>
                                                <!-- fields block ( for search ) end -->
                                                <!-- fields block ( for search ) -->
                                                <div class="search-item	three-field">
                                                    <div class="field">Price</div>
                                                    <input placeholder="from" class="numeric" type="text"
                                                           name="min_price" maxlength="15"/>
                                                    <input placeholder="to" class="numeric" type="text"
                                                           name="max_price" maxlength="15"/>
                                                    <span>AED</span>
                                                </div>
                                                <!-- fields block ( for search ) end -->

                                                <div class="search-item">
                                                    <label>
                                                        <input name="f[with_photo]" type="checkbox" value="true"/>
                                                        With pictures only
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="search-button"><input type="submit" name="search"
                                                                              value="Search"/></div>

                                        </form>

                                    </div>
                                </section>


                                <!-- side bar search form end -->


                            </div>
                        </section>


                        <section class="side_block no-style no-header">
                            <div class="clearfix">
                                <iframe width="300" height="250" marginheight="0" marginwidth="0" frameborder="0"
                                        scrolling="no"
                                        src="https://affiliates.souq.com/api/widget?phgid=1101l43f3&pubref=||||&country=ae&lang=ar&category=377&utm_source=affiliate_hub&utm_medium=cpt&utm_content=affiliate&utm_campaign=100l2&u_type=carousel&u_c=300x250&u_fmt=carousel&u_a=1101l32218&u_as="></iframe>
                            </div>
                        </section>

                    </aside>
                    <!-- left blocks area end -->
                    <section id="content" class="col-md-9 content-r">

                        <h1>Distinctive Car Numbers</h1>


                        <div id="system_message">

                            <!-- no javascript mode -->
                            <noscript>
                                <div class="warning">
                                    <div class="inner">
                                        <div class="icon"></div>
                                        <div class="message">This website makes heavy use of <b>JavaScript</b>, please
                                            enable JavaScript in your browser to continue comfort use of the website.
                                        </div>
                                    </div>
                                </div>
                            </noscript>
                            <!-- no javascript mode end -->
                        </div>

                        <!-- top blocks area -->
                        <aside class="top">

                            <section class="content_block no-style no-header categories-box stick">
                                <div>

                                    <!-- categories block tpl -->


                                    <span class="expander"></span>

                                    <div class="cat-tree-cont limit-height">
                                        <ul class="row cat-tree">
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a
                                                    title="Abu Dhabi"
                                                    href="/en/vip-numbers/distinctive-uae-car-numbers/abu-dhabi.html">Abu
                                                    Dhabi</a>&nbsp;<span class="counter">(3)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/abu-dhabi/private.html">Private</a>&nbsp;<span
                                                            class="counter">(3)</span></li>
                                                    <li><a title="Classic"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/abu-dhabi/classic.html">Classic</a>&nbsp;<span
                                                            class="counter">(0)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/abu-dhabi/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a title="Dubai"
                                                                                                          href="/en/vip-numbers/distinctive-uae-car-numbers/dubai.html">Dubai</a>&nbsp;<span
                                                    class="counter">(118)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/dubai/private.html">Private</a>&nbsp;<span
                                                            class="counter">(106)</span></li>
                                                    <li><a title="Classic"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/dubai/classic.html">Classic</a>&nbsp;<span
                                                            class="counter">(9)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/dubai/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(3)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a
                                                    title="Sharjah"
                                                    href="/en/vip-numbers/distinctive-uae-car-numbers/sharjah.html">Sharjah</a>&nbsp;<span
                                                    class="counter">(0)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/sharjah/private.html">Private</a>&nbsp;<span
                                                            class="counter">(0)</span></li>
                                                    <li><a title="Classic"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/sharjah/classic.html">Classic</a>&nbsp;<span
                                                            class="counter">(0)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/sharjah/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a title="Ajman"
                                                                                                          href="/en/vip-numbers/distinctive-uae-car-numbers/ajman.html">Ajman</a>&nbsp;<span
                                                    class="counter">(3)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/ajman/private.html">Private</a>&nbsp;<span
                                                            class="counter">(3)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/ajman/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a
                                                    title="Ras Al Khaimah"
                                                    href="/en/vip-numbers/distinctive-uae-car-numbers/ras-al-khaimah.html">Ras
                                                    Al Khaimah</a>&nbsp;<span class="counter">(18)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/ras-al-khaimah/private.html">Private</a>&nbsp;<span
                                                            class="counter">(18)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/ras-al-khaimah/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a
                                                    title="Fujairah"
                                                    href="/en/vip-numbers/distinctive-uae-car-numbers/fujairah.html">Fujairah</a>&nbsp;<span
                                                    class="counter">(14)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/fujairah/private.html">Private</a>&nbsp;<span
                                                            class="counter">(14)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/fujairah/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4 col-sm-4"><span class="toggle">+</span><a
                                                    title="Umm Al-Quwain"
                                                    href="/en/vip-numbers/distinctive-uae-car-numbers/umm-al-quwain.html">Umm
                                                    Al-Quwain</a>&nbsp;<span class="counter">(12)</span>
                                                <ul class="sub-cats">
                                                    <li><a title="Private"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/umm-al-quwain/private.html">Private</a>&nbsp;<span
                                                            class="counter">(12)</span></li>
                                                    <li><a title="Motor Cycle"
                                                           href="/en/vip-numbers/distinctive-uae-car-numbers/umm-al-quwain/motor-cycle.html">Motor
                                                            Cycle</a>&nbsp;<span class="counter">(0)</span></li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <div class="cat-toggle hide">...</div>
                                    </div>


                                    <!-- categories block tpl -->


                                </div>
                            </section>


                            <section class="content_block no-style no-header">
                                <div>

                                    <center>
                                        <a href="/nemro"><img alt="" src="/files/images/300.png"/> </a>
                                    </center>


                                </div>
                            </section>
                            <!-- top blocks area end -->
                        </aside>
                        <section id="controller_area">
                            <div class="grid_navbar listings-area">
                                <div class="switcher">
                                    <div class="hook"></div>
                                    <div class="buttons">
                                        <div class="list active" title="List View">
                                            <div>
                                                <span></span><span></span><span></span><span></span><span></span><span></span>
                                            </div>
                                        </div>
                                        <div class="grid" title="Gallery View">
                                            <div><span></span><span></span><span></span><span></span></div>
                                        </div>
                                        <div class="map" title="Map">
                                            <div><span></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sorting">
                                    <div class="current">
                                        Sort by:
                                        <span class="link">Date</span>
                                        <span class="arrow"></span>
                                    </div>
                                    <ul class="fields">

                                        <li><a rel="nofollow" title="Sort listings by Date (Ascending)"
                                               href="?sort_by=date&sort_type=asc">Date (Ascending)</a></li>
                                        <li><a rel="nofollow" class="active" title="Sort listings by Date (Descending)"
                                               href="?sort_by=date&sort_type=desc">Date (Descending)</a></li>

                                        <li><a rel="nofollow" title="Sort listings by Car Plate Number (Ascending)"
                                               href="?sort_by=car_number&sort_type=asc">Car Plate Number (Ascending)</a>
                                        </li>
                                        <li><a rel="nofollow" title="Sort listings by Car Plate Number (Descending)"
                                               href="?sort_by=car_number&sort_type=desc">Car Plate Number
                                                (Descending)</a></li>

                                        <li><a rel="nofollow" title="Sort listings by Phone (Ascending)"
                                               href="?sort_by=phone&sort_type=asc">Phone (Ascending)</a></li>
                                        <li><a rel="nofollow" title="Sort listings by Phone (Descending)"
                                               href="?sort_by=phone&sort_type=desc">Phone (Descending)</a></li>

                                        <li><a rel="nofollow" title="Sort listings by Price (Ascending)"
                                               href="?sort_by=price_not_required&sort_type=asc">Price (Ascending)</a>
                                        </li>
                                        <li><a rel="nofollow" title="Sort listings by Price (Descending)"
                                               href="?sort_by=price_not_required&sort_type=desc">Price (Descending)</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <!-- grid navigation bar end -->
                            <!-- listing grid -->

                            <section id="listings" class="list  row">
                                <!-- listing item -->
                                @foreach ($ads as $ad)
                                    {{ $ad->name }}

                                    <article class="item two-inline col-sm-4">
                                        <div class="navigation-column">
                                            <div class="before-nav"></div>

                                            <ul class="nav-column stick-top">
                                                <li id="fav_22557" class="favorite add" title="Add to Favorites">
                                                    <span class="icon"></span>
                                                    <span class="link">Add to Favorites</span>
                                                </li>
                                                <li id="fav_22557" class="favorite add"
                                                    title="Offer a price for this license plate">
                                                    <span class="icon"></span>
                                                    <span class="link">Place Bid</span>
                                                </li>
                                            </ul>
                                            <span class="category-info hide">
                                                <a href="{{route('ad',['ad'=>$ad->id])}}">Without Telling the Code</a>
                                            </span>
                                        </div>

                                        <div class="main-column clearfix">
                                            <a title="" href="{{route('ad',['ad'=>$ad->id])}}">
                                                <div class="picture">
                                                    <img alt="{{$ad->title}}" src="/rendered/{{$ad->picture}}"
                                                         data-1x="/rendered/{{$ad->picture}}"
                                                         data-2x="/rendered/{{$ad->picture}}"
                                                    />
                                                    <span accesskey="1"></span>
                                                </div>
                                            </a>
                                            <ul class="ad-info with-names">
                                                <li class="title">
                                                    <a class="link-large" title="{{ $ad->title }}"
                                                       href="{{route('ad',['ad'=>$ad->id])}}"> {{ $ad->title }} </a>
                                                </li>

                                                <li class="fields">{{ $ad->description }}</li>
                                            </ul>
                                        </div>
                                    </article>
                                @endforeach
                                {{ $ads->links('pagination::bootstrap-4') }}
                                <!-- listing item end -->
                            </section>

                            <section id="listings_map" class="hide" style="height: 300px;"></section>
                            <!-- listing grid end -->
                            <!-- paging block -->
                            <!-- pagination tpl -->

                            <!-- pagination tpl end -->
                            <!-- paging block end -->
                            <!-- browse mode -->
                            <!-- listing type end -->
                        </section>
                        <!-- bottom blocks area -->
                        <aside class="bottom">
                            <section class="content_block">
                                <h3>Google Ads</h3>
                                <div>

                                    <script async
                                            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- downthelisting -->
                                    <ins class="adsbygoogle" style="display:block"
                                         data-ad-client="ca-pub-5532555731846570" data-ad-slot="7384756456"
                                         data-ad-format="auto" data-full-width-responsive="true"></ins>
                                    <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>


                                </div>
                            </section>
                        </aside>
                        <!-- bottom blocks area end -->
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
