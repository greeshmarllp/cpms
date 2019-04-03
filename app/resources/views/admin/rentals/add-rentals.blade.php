@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Associate Form Elements
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">About-Us Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="{{ url('/admin/save-rentals') }}/@if(!empty($data)){{$data[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Titles & Sub Titles</a></li>
              <!-- <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li> -->
              <li><a href="#tab_3" data-toggle="tab">Images</a></li>

              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

               <div class="form-group">
                <label for="inputPassword3">Choose Property Type</label>
                <div class="box-body pad">
                  <select class="form-control" name="property_type_id">



                   @foreach($property_type_list as $property_type_list)

                   <option value="{{$property_type_list->id}}" @if(!empty($data[0]->property_type_id)) {{ $data[0]->property_type_id == $property_type_list->id ? 'selected' : '' }}

                    @endif>
                    {{$property_type_list->heading}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Property ID</label>
              <input type="text" class="form-control" id="pate_title" name="property_id" placeholder="Enter.." value=" @if(!empty($data[0]->property_id))
              {{$data[0]->property_id}}
              @endif">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Heading</label>
              <input type="text" class="form-control" id="pate_title" name="heading" placeholder="Enter.." value=" @if(!empty($data[0]->heading))
              {{$data[0]->heading}}
              @endif">
            </div>

            <div class="form-group">

             <label for="exampleInputEmail1">Description</label>
             <div class="box-body pad">

              <textarea id="editor1" name="description" rows="10" cols="80">
               @if(!empty($data[0]->description))
               {{$data[0]->description}}
               @endif
             </textarea>

           </div>
         </div>

         <div class="form-group">

           <label for="exampleInputEmail1">Address</label>
           <div class="box-body pad">

            <textarea id="address" name="address">
             @if(!empty($data[0]->address))
             {{$data[0]->address}}
             @endif
           </textarea>

         </div>
       </div>

       <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" class="form-control" id="pate_title" name="price" placeholder="Enter.." value=" @if(!empty($data[0]->price))
        {{$data[0]->price}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Property Size</label>
        <input type="text" class="form-control" id="pate_title" name="property_size" placeholder="Enter.." value=" @if(!empty($data[0]->property_size))
        {{$data[0]->property_size}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Bedrooms</label>
        <input type="text" class="form-control" id="pate_title" name="bedrooms" placeholder="Enter.." value=" @if(!empty($data[0]->bedrooms))
        {{$data[0]->bedrooms}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Bathrooms</label>
        <input type="text" class="form-control" id="pate_title" name="bathrooms" placeholder="Enter.." value=" @if(!empty($data[0]->bathrooms))
        {{$data[0]->bathrooms}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Available From</label>
        <input type="date" class="form-control" id="pate_title" name="available_from" placeholder="Enter.." value="">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input type="text" class="form-control" id="pate_title" name="status" placeholder="Enter.." value=" @if(!empty($data[0]->status))
        {{$data[0]->status}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Year Built</label>
        <input type="text" class="form-control" id="pate_title" name="year_built" placeholder="Enter.." value=" @if(!empty($data[0]->year_built))
        {{$data[0]->year_built}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Garages</label>
        <input type="text" class="form-control" id="pate_title" name="garages" placeholder="Enter.." value=" @if(!empty($data[0]->garages))
        {{$data[0]->garages}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Cross Streets</label>
        <input type="text" class="form-control" id="pate_title" name="cross_streets" placeholder="Enter.." value=" @if(!empty($data[0]->cross_streets))
        {{$data[0]->cross_streets}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Floors</label>
        <input type="text" class="form-control" id="pate_title" name="floors" placeholder="Enter.." value=" @if(!empty($data[0]->floors))
        {{$data[0]->floors}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Plumping</label>
        <input type="text" class="form-control" id="pate_title" name="plumping" placeholder="Enter.." value=" @if(!empty($data[0]->plumping))
        {{$data[0]->plumping}}
        @endif">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Featured</label>
        <input type="radio" name="featured" value="true" @if(!empty($data[0]->featured)) {{ $data[0]->featured == 'true' ? 'checked' : '' }}

        @endif> Enable
        <input type="radio" name="featured" value="false" @if(!empty($data[0]->featured)) {{ $data[0]->featured == 'false' ? 'checked' : '' }}

        @endif> Disable<br>


      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Show In Banner</label>
        <input type="radio" name="banner" value="true" @if(!empty($data[0]->banner)) {{ $data[0]->banner == 'true' ? 'checked' : '' }}

        @endif> Enable
        <input type="radio" name="banner" value="false" @if(!empty($data[0]->banner)) {{ $data[0]->banner == 'false' ? 'checked' : '' }}

        @endif> Disable<br>


      </div>


    </div>

    <div class="tab-pane" id="tab_3">
      <div class="form-group">
       @if(!empty($data[0]->image))
       <img src="{{url('public/images/rentals')}}/{{$data[0]->image}}">
       @endif
       <label for="exampleInputFile">File input</label>
       <input type="file" name="filename[]" class="form-control">
     </div>
   </div>
   <!-- /.tab-pane -->
 </div>
 <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
</div>       
</div>

<input type="submit" class="btn btn-primary" value="Save" />

</form>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('footer')

