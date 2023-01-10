@extends('en.layout.layout')
@section('title',"Dashboard |".env('APP_NAME'))
@section('content')
    <div id="wrapper">
        <section id="main_container">
            <!-- bread crumbs block -->
            <div id="bread_crumbs">
                <ul class="point1">
                    <li accesskey="/"><a href="/" title="RakMoon.Com">Home</a></li>
                    <li accesskey="/"><a href="/dashboard" title="VIP Numbers">Dashboard</a></li>
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

                                        <form method="post" action="/vip-numbers/distinctive-uae-car-numbers/search-results.html">
                                            <input type="hidden" name="action" value="search" />
                                            <input type="hidden" name="post_form_key" value="vip_numbers_quick" />

                                            <div class="scroller">
                                                <!-- fields block ( for search ) -->
                                                <div class="search-item	single-field hide">
                                                    <div class="field">Category</div>
                                                    <input type="hidden" id="vip_numbers_quick_Category_ID_vip_numbers_value" name="f[Category_ID]" value="2070" /><select id="vip_numbers_quick_Category_ID_vip_numbers_level0" class="multicat"><option value="0">- Any -</option><option  value="2070">Distinctive Car Numbers</option></select></div>
                                                <div
                                                    class="search-item single-field">
                                                    <div class="field">Subcategory</div>
                                                    <select id="vip_numbers_quick_Category_ID_vip_numbers_level1" disabled="disabled" class="multicat ">
                                                        <option value="0">- Any -</option>
                                                    </select>
                                                </div>
                                                <div class="search-item single-field">
                                                    <div class="field">Subcategory</div>
                                                    <select id="vip_numbers_quick_Category_ID_vip_numbers_level2" disabled="disabled" class="multicat ">
                                                        <option value="0">- Any -</option>
                                                    </select>
                                                </div>
                                                <div class="search-item single-field">
                                                    <div class="field">Subcategory</div>
                                                    <select id="vip_numbers_quick_Category_ID_vip_numbers_level3" disabled="disabled" class="multicat  last">
                                                        <option value="0">- Any -</option>
                                                    </select>
                                                </div>
                                                <!-- fields block ( for search ) end -->
                                                <!-- fields block ( for search ) -->
                                                <div class="search-item	three-field">
                                                    <div class="field">Price</div>
                                                    <input placeholder="from" class="numeric" type="text" name="f[price][from]" maxlength="15" />
                                                    <input placeholder="to" class="numeric" type="text" name="f[price][to]" maxlength="15" />
                                                    <span>AED</span>
                                                </div>
                                                <!-- fields block ( for search ) end -->

                                                <div class="search-item">
                                                    <label>
                                                        <input name="f[with_photo]" type="checkbox" value="true" />
                                                        With pictures only
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="search-button"><input type="submit" name="search" value="Search" /></div>

                                        </form>

                                    </div>
                                </section>


                                <!-- side bar search form end -->


                            </div>
                        </section>


                        <section class="side_block no-style no-header">
                            <div class="clearfix">
                                <iframe width="300" height="250" marginheight="0" marginwidth="0" frameborder="0" scrolling="no" src="https://affiliates.souq.com/api/widget?phgid=1101l43f3&pubref=||||&country=ae&lang=ar&category=377&utm_source=affiliate_hub&utm_medium=cpt&utm_content=affiliate&utm_campaign=100l2&u_type=carousel&u_c=300x250&u_fmt=carousel&u_a=1101l32218&u_as="></iframe>
                            </div>
                        </section>

                    </aside>
                    <!-- left blocks area end -->
                    <section id="content" class="col-md-9 content-r">

                        <h1>Dashboard</h1>


                        <div id="system_message">

                            <!-- no javascript mode -->
                            <noscript>
                                <div class="warning">
                                    <div class="inner">
                                        <div class="icon"></div>
                                        <div class="message">This website makes heavy use of <b>JavaScript</b>, please enable JavaScript in your browser to continue comfort use of the website.</div>
                                    </div>
                                </div>
                            </noscript>
                            <!-- no javascript mode end -->
                        </div>

                        <!-- top blocks area -->
                        <aside class="top">
                            <section class="content_block no-style no-header categories-box stick">

                            </section>
                        </aside>
                        <section id="controller_area">


                            <!-- grid navigation bar end -->
                            <!-- listing grid -->

                            <section id="listings" class="list  row">
                                 <h2>What to show here</h2>
                            </section>


                        </section>
                        <!-- bottom blocks area -->
                        <aside class="bottom">
                            <section class="content_block">
                                <h3>Google Ads</h3>
                                <div>
                                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- downthelisting -->
                                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5532555731846570" data-ad-slot="7384756456" data-ad-format="auto" data-full-width-responsive="true"></ins>
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
