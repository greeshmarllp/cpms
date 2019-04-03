@include('frontheader2')
<!-- Page Banner Start-->
<section class="page-banner padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-uppercase">About</h1>
        
        
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
                    <img src="{{url('public/images/about')}}/{{$about_list[0]->image}}">
                    
            	</div>
                
                
                
            </div>
            
            <div class="col-sm-6">
				<br>
				<br>
				<br>
            	<h3><strong>
</strong></h3>
                    <p>@if(!empty($about_list[0]->description))
                 {!!$about_list[0]->description!!}
                 @endif</p>
            </div>
        </div>
    </div>
</section>
@include('frontfooter')