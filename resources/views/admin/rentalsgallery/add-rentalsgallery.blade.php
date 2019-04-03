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
      <li class="active">Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="{{ url('/admin/save-rentals-gallery') }}/@if(!empty($data)){{$data[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data" class="dropzone">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Titles & Sub Titles</a></li>
              <!-- <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li> -->
              <!-- <li><a href="#tab_3" data-toggle="tab">Images</a></li> -->

              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

            <div class="form-group">
                <label for="inputPassword3">Choose Property</label>
                <div class="box-body pad">
                  <select class="form-control" name="property_id">



                   @foreach($rentals_list as $rentals)

                   <option value="{{$rentals->id}}" @if(!empty($data[0]->property_id)) {{ $data[0]->property_id == $rentals->id ? 'selected' : '' }}

                    @endif>
                    {{$rentals->heading}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>


          </div>

      <!--     <div class="tab-pane" id="tab_3">
            <div class="form-group">
               @if(!empty($data[0]->image))
                  <img src="{{url('public/images/testimonial')}}/{{$data[0]->image}}">
                  @endif
              <label for="exampleInputFile">File input</label>
              <input type="file" name="filename[]" class="form-control">
            </div>
          </div> -->
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>       
  </div>

  

</form>

<input type="button"  id='uploadfiles' class="btn btn-primary" value="Save" />


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('footer')

   <script src="{{url('theme/bower_components/dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>
        <script type='text/javascript'>
      
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", { 
            autoProcessQueue: false,
            parallelUploads: 10, // Number of files process at a time (default 2)
            acceptedFiles: ".jpeg,.jpg,.png,.gif",

            init: function() {
      this.on("queuecomplete", function (file) {
            // if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    location.reload();
           // }
        });
    }



        });
       
        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
      
                           
                   
           // location.reload();
        });


        </script>