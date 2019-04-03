@include('frontheader')

    <!--  Main Banner Start Here-->
    <div class="main-banner banner_up">
        <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper" data-alias="news-gallery34">
            <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
            <div id="rev_slider_34_1" class="rev_slider" data-version="5.0.7">
                <ul>
                    <!-- SLIDE  -->
                    {{$i=1}}
                    @foreach($banner_data as $datas)

                    <li data-index="rs-{{$i}}">
                        <!-- MAIN IMAGE -->
                        <img src="{{url('public/images/banner')}}/{{$datas->image}}" alt="" class="rev-slidebg">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption Newspaper-Title tp-resizeme " id="slide-{{$i}}-layer-1" data-x="['left','left','left','left']" data-hoffset="['100','50','50','30']"
                            data-y="['top','top','top','center']" data-voffset="['165','135','105','0']" data-fontsize="['50','50','50','30']"
                            data-lineheight="['55','55','55','35']" data-width="['600','600','600','420']" data-height="none" data-whitespace="normal"
                            data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                            data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on">

                            <div class="banner-text">
                                <h2>
                                    {{$datas->heading}}
                                </h2>
                                <p>
                                    {!!$datas->description!!}
                                </p>
                                <a class="btn-text" href="{{$datas->link}}"> read more</a>
                            </div>
                        </div>
                    </li>
                    {{$i++}}
                    @endforeach
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>
    <!--  Main Banner End Here-->

    <!-- About -->
    <section class="analyzed_wrap__block">
        <div class="container">
            <div class="row">

                 @foreach($section_data as $datas)
                <div class="col-lg-4 mt-sm-30 mb-sm-30 mb-xs-30 mt-xs-30">
                    <div class="styl_box" style="background:url('{{url('public/images/secondsection')}}/{{$datas->image}}');
    background-size: cover;
    margin: 0 auto;
    padding: 0;
    max-width: 400px;
    width: 100%;">
                        <div class="single_analize__block text-center">
                            <i class="fa fa-line-chart icon_big"></i>
                            <h3>{{$datas->heading}}</h3>
                            <div class="block_box">
                                <p style="font-size: 11px;">
                                    {!!$datas->description!!}
                                </p>
                            </div>
                            <a href="{{$datas->link}}" class="btn-text btn_new">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- About_End -->

    <!-- Service_Section -->
    <section class="padding ptb-xs-40">
        <div class="container">
            <div class="row text-center mb-30">
                <div class="col-md-12">
                    <div class="sec_hedding">
                        <h2>
                            <span>Our</span> Services</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                  @foreach($service_data as $datas)
                <div class="col-sm-12 col-lg-6 pr-0 plr-xs-15 mb-xs-30">

                    <div class="about-block black-bg light-color hover-bg d-flex  flex-column flex-md-row">
                        <div class="fl half-width" style="background: url('{{url('public/images/service')}}/{{$datas->image}}') 0 0 no-repeat;
    background-size: cover;
    min-height: 200px;">
                        
                        </div>
                        <div class="text-box padding-20 d-flex flex-column half-width text-center text-md-left">

                            <div class="service_items_box">
                                <h3 class="mt-0">
                                    <a href="#">{{$datas->heading}}</a>
                                </h3>
                                <h5>{{$datas->subheading}}</h5>
                            </div>

                            <div>
                                <p style="font-size: 13px;">
                                    {!!$datas->description!!}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              <!--   <div class="col-sm-12 col-lg-6 pl-0 plr-xs-15 mb-xs-30">
                    <div class="about-block black-bg light-color hover-bg d-flex  flex-column flex-md-row">
                        <div class="fl float-right-sm half-width flex-md-last flex-lg-first service_img2">
                            
                        </div>
                        <div class="text-box padding-20 d-flex flex-column half-width text-center text-md-right text-lg-left">

                            <div class="service_items_box">

                                <h3 class="mt-0">
                                    <a href="#">PIPE-COATERS</a>
                                </h3>
                                <h5>PIPE CLEANING & COATING</h5>
                            </div>

                            <div>
                                <p style="font-size: 13px;">
                                    Pipecoaters are designed to coat, at uniform thickness, the internals of pipes, tubes and vessels at a faster rate.
                                </p>

                            </div>
                        </div>
                    </div>
                </div> -->
               <!--  <div class="col-sm-12 col-lg-6 pr-0 plr-xs-15 mb-xs-30">
                    <div class="about-block black-bg light-color hover-bg d-flex  flex-column flex-md-row">
                        <div class="fr float-left-sm half-width flex-lg-last service_img3">
                        
                        </div>
                        <div class="text-box padding-20 d-flex flex-column half-width text-center text-md-left text-lg-right">

                            <div class="service_items_box">

                                <h3 class="mt-0">
                                    <a href="#">FILTERING</a>
                                </h3>
                                <h5>FILTER MEDIA & MINERALS</h5>
                            </div>

                            <div>
                                <p style="font-size: 13px;">
                                    Purification of potable water and industrial waste water, water sewage and water well drilling. Suitable for Aquarium applications.
                                </p>

                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-sm-12 col-lg-6 pl-0 plr-xs-15 mb-xs-30">
                    <div class="about-block black-bg light-color hover-bg d-flex flex-column flex-md-row">
                        <div class="fr half-width flex-md-last service_img4">
                            
                        </div>
                        <div class="text-box padding-20 d-flex flex-column half-width text-center text-md-right">

                            <div class="service_items_box">

                                <h3 class="mt-0">
                                    <a href="#">ABRASIVES</a>
                                </h3>
                                <h5>BLASTCLEANING GRIT</h5>
                            </div>

                            <div>
                                <p style="font-size: 13px;">
                                    A mineral, that is used to shape or finish a workpiece through rubbing which leads to part of the workpiece being worn away.
                                </p>

                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
    </section>
    <!-- Service_Section_End -->

    <!-- counter -->
    <section class="counter-section__block counter-section__img padding ptb-xs-40">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 counter-section__box mb-sm-30  mb-xs-30">
                    <span class="counter" data-count="80">0</span>
                    <p>
                        PROJECTS<br> FINISHED
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 counter-section__box mb-sm-30 mb-xs-30">
                    <span class="counter" data-count="75">0</span>
                    <p>
                        HAPPY
                        <br> CLIENTS
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 counter-section__box mb-xs-30">
                    <span class="counter" data-count="40">0</span>
                    <p>
                        OUR
                        <br> TEAM
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Conter End -->

    <!-- Work Section -->
    <section id="work" class="pt-90 ptb-xs-60">
        <div class="container-fluid">
            <div class="row text-center mb-30">
                <div class="col-md-12">
                    <div class="sec_hedding">
                        <h2>
                            <span>Our</span> Gallery</h2>
                    </div>
                </div>
            </div>
            
            <div class="row container-grids nf-col-4">

                 @foreach($gallery_data as $datas)
                <div class="nf-item branding coffee no-spacing">
                    <div class="item-box">
                        <a>
                            <img alt="1" src="{{url('public/images/gallery')}}/{{$datas->image}}" class="item-container"> </a>
                        <div class="link-zoom">
                            
                            <a href="{{url('public/images/gallery')}}/{{$datas->image}}" class="fancylight popup-btn" data-fancybox-group="light">
                                <i class="fa fa-search-plus"></i>
                            </a>
                        </div>
                        
                    </div>
                </div>
                 @endforeach
              

            </div>

        </div>
    </section>
    <!-- End Work Section -->

    

    <!-- Team_Section -->
    
    <!-- Team_Section_Emd -->
<!-- Section -->
    <section class="available_wrap__block">
        <div class="available_content__block text-center">
            <div class="container">
                <div class="row">
                    @foreach($content_data as $datas)
                    <div class="col-md-10 offset-md-1">
                        <h2>{{$datas->heading}}</h2>
                        <p>
                            {!!$datas->description!!}
                        </p>
                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Section_End -->
    <!--Testimonial-->
    <section class="testimonial-block__section padding ptb-xs-40 gray-bg">
        <div class="container">
            <div class="row text-center mb-30">
                <div class="col-md-12">
                    <div class="sec_hedding">
                        <h2>
                            <span>Client</span> Testimonial</h2>
                    </div>
                </div>
            </div>

            <div id="testimonial" class="nf-carousel-theme nf-carousel-arrow">
                 @foreach($testimonial_data as $datas)
                <div class="testimonial-box row d-flex align-items-center">
                    
                    <div class="col-md-5">
                        <img src="{{url('public/images/testimonial')}}/{{$datas->image}}" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="quote-box">
                            <div class="quote-icon quote-left">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="quote-text">
                                <p>
                                    {!!$datas->description!!}</p>
                            </div>
                            <div class="quote-icon quote-right">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                <strong class="quote-author">John Smith, Eng.</strong>
                            </div>
                        </div>
                    </div>
                     
                </div>
                @endforeach
                
            </div>

        </div>
    </section>
@include('frontfooter')