@include('frontheader2')

<!-- Page Banner Start-->
<section class="page-banner padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-uppercase">Rentals</h1>
        
        
      </div>
    </div>
  </div>
</section>
<!-- Page Banner End -->



<!-- Listing Start -->
<section id="listing1" class="listing1 padding_top">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-9">
            <h2 class="uppercase">PROPERTY LISTINGS</h2>
            <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
          </div>
          
        </div>
        <div class="row">

           @foreach($rentals_list as $datas)
          <div class="col-sm-6">
            <div class="property_item heading_space">
              <div class="image">
                <a href="properties.html"><img src="{{url('assets/themehtml/images/listing1.jpg')}}" alt="latest property" class="img-responsive"></a>
                <div class="price clearfix"> 
                  <span class="tag pull-right">{!!$datas->price!!}</span>
                </div>
                
              </div>
              <div class="proerty_content">
                <div class="proerty_text">
                  <h3 class="captlize"><a href="properties.html">{!!$datas->heading!!}</a></h3>
                  <p>{!!$datas->address!!}</p>
                </div>
                <div class="property_meta transparent"> 
                  <span><i class="icon-select-an-objecto-tool"></i>{!!$datas->property_size!!}</span> 
                  <span><i class="icon-bed"></i>{!!$datas->bedrooms!!} Bed Rooms</span> 
                  <span><i class="icon-garage"></i>{!!$datas->garages!!} Garage</span>     
                </div>
                
                
                <div class="toggle_share collapse" id="one">
                  <ul>
                    <li><a href="#." class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
                    <li><a href="#." class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
                    <li><a href="#." class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        
        <div class="padding_bottom text-center">
          <ul class="pager">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <div class="col-md-3" >
       <br>
       <br>
       <br>
       <a href="http://www.caboolturepropertymanagementandsales.com.au/resources/CPMS%20Application%20Form.pdf"><button type="submit" class="btn-blue border_radius" style="margin-top: 1%; width:100%"><strong>Rentals Aplications</strong></button></a>
       <a href="rental-apprasial.html"><button type="submit" class="btn-blue border_radius" style="margin-top: 1%; width:100%">Rentals Apprasial</button></a>
       <a href="landlord.html"><button type="submit" class="btn-blue border_radius"style="margin-top: 1%; width:100%">Landlord Information for Rentals</button></a>
       <a href="rentals-details.html"><button type="submit" class="btn-blue border_radius"style="margin-top: 1%; width:100%">Rentals Details</button></a>



     </div>
   </div>
 </div>
</section>
<!-- Listing end -->
@include('frontfooter')