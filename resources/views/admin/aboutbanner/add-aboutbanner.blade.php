@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      About Banner Elements
      <small>Preview</small>
    </h1> 
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">About-Us Elements</li>
    </ol> -->
  </section>
   
  <!-- Main content -->
  <section class="content">
  <form action="{{ url('/admin/save-aboutbanner')}}/@if(!empty($data)){{$data[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data"> 
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
                <label for="exampleInputEmail1">Heading</label>
                <input type="text" class="form-control" id="pate_title" name="heading" placeholder="Enter.." value="@if(!empty($data[0]->heading)){{$data[0]->heading}}@endif">
              </div>

           
              
               
              </div>
              <!-- /.tab-pane -->
              <!-- <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div> -->
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  @if(!empty($data[0]->image))
                  <img src="{{url('public/images/aboutbanner')}}/{{$data[0]->image}}">
                  @endif
              
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