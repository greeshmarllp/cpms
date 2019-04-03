@include('header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      About-Us Form Elements
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
  <form action="{{ url('/admin/gallery-save') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
              <li><a class="active" href="#tab_3" data-toggle="tab">Images</a></li>
            
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">

           
              <div class="tab-pane active" id="tab_3">
                <div class="form-group">
                <label for="exampleInputFile">File input</label>
              <input type="file" name="filename[]" class="form-control" multiple>
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

