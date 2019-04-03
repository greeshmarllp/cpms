@include('frontheader2')
<!-- Page Banner Start-->
<section class="page-banner padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-uppercase">FAQ's</h1>
        
        
    </div>
</div>
</div>
</section>
<!-- Page Banner End --> 


<!--FAQ-->
<section id="faqs" class="padding_half bottom40">
	<div class="container">
     <div class="row">
         <div class="col-sm-6">
             <div class="faq-text margin40">
                <h2> SALES FAQ</h2>
                <br>
                <h3><strong>Property Management FAQ's</strong></h3>
                <br><br>
                <h4>  Beginning of a Tenancy</h4>
                <br>
              <!--   <strong>  How long does it take for my application to be processed?</strong>

                <p class="top15">At Caboolture Property Management and Sales, we are dedicated to customer satisfaction, therefore we do our best to have your application processed as soon as possible. The maximum time an application will be processing for is 48 hours, unless there is a problem with rental references, or it is a weekend.</p> -->
            </div>
            <div class="faq-text margin40">
                @foreach($property_faq_list as $datas)
                <h5><strong>Q: {!!$datas->question!!}
                </strong></h5>
                <p class="top15">{!!$datas->answer!!}
                </p>
                @endforeach

            </div>
            <div class="faq-text margin40">
                <h3>  During the tenancy</h3>

            </div>
            @foreach($tenancy_faq_list as $datas)
            <div class="faq-text margin40">
                <h5><strong>{!!$datas->question!!}</strong></h5>
                <p class="top15">{!!$datas->answer!!}</p>

            </div>
            @endforeach


            <h3>
              Ending a Tenancy Agreement  
          </h3>
          @foreach($agreement_faq_list as $datas)
          <div class="faq-text margin40">
            <h5><strong>{!!$datas->question!!}</strong></h5>
            <p class="top15">{!!$datas->answer!!}</p>

        </div>

        @endforeach
    </div>
    <br>
    <br>
    <h2>RENTALS FAQ</h2>

    <div class="col-sm-6">

     @foreach($rentals_faq_list as $datas)
     <div class="faq-text margin40">
        <h5><strong>Q:{!!$datas->question!!}</strong></h5>
        <p class="top15">{!!$datas->answer!!}</p>
    </div>
    @endforeach
    
    
    
    
    
    
    
    

</div>
</div>
</div>
</section>
<!--FAQ Ends-->
@include('frontfooter')

