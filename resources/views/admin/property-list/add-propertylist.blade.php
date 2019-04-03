@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Property Form Elements
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
  <form action="{{ url('/admin/save-propertylist') }}/@if(!empty($data)){{$data[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data"> 
  {{ csrf_field() }}
  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Titles & Sub Titles</a></li>
              <li><a href="#tab_2" data-toggle="tab">Details</a></li>
              <li><a href="#tab_3" data-toggle="tab">Images</a></li>
            
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="tab_1">
               
                 <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Property Type</label>
                    <select class="form-control" name="property_type">

                      @foreach($property_type as $type)

                      <option value="{{$type->id}}" @if(!empty($data[0]->property_type)) {{ $data[0]->property_type == $type->id ? 'selected' : '' }} @endif> {{$type->heading}} </option>

                      @endforeach
                    </select>
                  </div>  

               <div class="form-group">
                <label for="exampleInputEmail1">Heading</label>
                <input type="text" class="form-control" id="pate_title" name="heading" placeholder="Enter.." value="@if(!empty($data[0]->heading)){{$data[0]->heading}}@endif">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <div class="box-body pad">

                  <textarea id="editor1" name="editor1" rows="10" cols="80">
                  @if(!empty($data[0]->description)){{$data[0]->description}}@endif
                  </textarea>

                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <div class="box-body pad">

                  <textarea id="editor2" name="editor2" rows="10" cols="80">
                  @if(!empty($data[0]->description)){{$data[0]->description}}@endif
                  </textarea>

                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Page Link</label>
                <input type="text" class="form-control" id="pate_title" name="link" placeholder="Enter.." value="@if(!empty($data[0]->link)){{$data[0]->link}}@endif">
              </div>

               
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Property Size</label>
                  <input type="text" class="form-control" id="pate_title" name="property_size" placeholder="Enter.." value="@if(!empty($data[0]->property_size)){{$data[0]->property_size}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Property Id</label>
                  <input type="number" class="form-control" id="pate_title" name="property_id" placeholder="Enter.." value="@if(!empty($data[0]->property_id)){{$data[0]->property_id}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="text" class="form-control" id="pate_title" name="price" placeholder="Enter.." value="@if(!empty($data[0]->price)){{$data[0]->price}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Available Bedrooms</label>
                  <input type="number" class="form-control" id="pate_title" name="bedroom" placeholder="Enter.." value="@if(!empty($data[0]->bedroom)){{$data[0]->bedroom}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Available Bathrooms</label>
                  <input type="number" class="form-control" id="pate_title" name="bathroom" placeholder="Enter.." value="@if(!empty($data[0]->bathroom)){{$data[0]->bathroom}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Available From</label>
                  <input type="date" class="form-control" id="pate_title" name="available_from" placeholder="Enter.." value="@if(!empty($data[0]->available_from)){{$data[0]->available_from}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <input type="text" class="form-control" id="pate_title" name="status" placeholder="Enter.." value="@if(!empty($data[0]->status)){{$data[0]->status}}@endif">
                </div>


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">

                <div class="form-group">
                  @if(!empty($data[0]->image))
                    <img src="{{url('public/images/propertylist')}}/{{$data[0]->image}}">
                  @endif
                  <!-- <label for="exampleInputFile">File input</label> -->
                  <input type="file" name="filename[]" class="form-control">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Year Of Bulid</label>
                  <input type="text" class="form-control" id="pate_title" name="year_built" placeholder="Enter.." value="@if(!empty($data[0]->year_built)){{$data[0]->year_built}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Garage</label>
                  <input type="text" class="form-control" id="pate_title" name="garage" placeholder="Enter.." value="@if(!empty($data[0]->garage)){{$data[0]->garage}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Cross Street</label>
                  <input type="text" class="form-control" id="pate_title" name="cross_street" placeholder="Enter.." value="@if(!empty($data[0]->cross_street)){{$data[0]->cross_street}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Floor</label>
                  <input type="text" class="form-control" id="pate_title" name="floors" placeholder="Enter.." value="@if(!empty($data[0]->floors)){{$data[0]->floors}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Plumbing</label>
                  <input type="text" class="form-control" id="pate_title" name="plumbing" placeholder="Enter.." value="@if(!empty($data[0]->plumbing)){{$data[0]->plumbing}}@endif">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Featured Property</label>
                  <input type="radio" name="feature" value="true" @if(!empty($data[0]->feature)) {{ $data[0]->feature == 'true' ? 'checked' : '' }} @endif> Enable
                  <input type="radio" name="feature" value="false" @if(!empty($data[0]->feature)) {{ $data[0]->feature == 'false' ? 'checked' : '' }} @endif> Disable<br>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail">Showing as Banner</label>
                  <input type="radio" name="banner" value="true" @if(!empty($data[0]->banner)) {{ $data[0]->banner == 'true' ? 'checked' : ' '}} @endif> Enable
                  <input type="radio" name="banner" value="false" @if(!empty($data[0]->banner)) {{ $data[0]->banner == 'false' ? 'checked' : '' }} @endif> Disable<br>
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

 
 