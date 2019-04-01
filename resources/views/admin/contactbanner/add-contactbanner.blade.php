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
    <form action="{{ url('/admin/save-contactbanner') }}/@if(!empty($data)){{$data[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter.." value="@if(!empty($data[0]->heading))
                 {{$data[0]->heading}}
                 @endif">
              </div>

           <!--    <div class="form-group">
                
               <label for="exampleInputEmail1">Title</label>
               <div class="box-body pad">

                <textarea id="editor1" name="description" rows="10" cols="80">
                 @if(!empty($data[0]->description))
                 {{$data[0]->description}}
                 @endif
                </textarea>

              </div>
            </div> -->


          </div>

          <div class="tab-pane" id="tab_3">
            <div class="form-group">
               @if(!empty($data[0]->image))
                  <img src="{{url('public/images/contactbanner')}}/{{$data[0]->image}}" height="40px;">
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

