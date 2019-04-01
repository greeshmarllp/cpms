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
  <form action="{{ url('/admin/save_contact') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

    @if($errors->any())
      <h4>{{$errors->first()}}</h4>
    @endif

  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Titles & Sub Titles</a></li>
              <li><a href="#tab_2" data-toggle="tab">Social Links</a></li>
              <!-- <li><a href="#tab_3" data-toggle="tab">Images</a></li> -->
            
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
               @foreach($data as $datas)
              <div class="tab-pane active" id="tab_1">
               
               <!-- text editor starts -->

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <div class="box-body pad">

                      <textarea id="editor1" name="editor1" rows="10" cols="80">
                                         
                  {{$datas->address}}
                  
                      </textarea>

                    </div>
                  </div>

               <!-- text editor ends -->

                
               <div class="form-group">
                <label for="exampleInputEmail1">Fax</label>
                <input type="text" class="form-control" name="landline" id="exampleInputEmail1" placeholder="Enter.." value="{{$datas->landline}}">
                
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="exampleInputEmail1" placeholder="Enter.." value="{{$datas->mobile}}">
                 
              </div>

              
               <div class="form-group">
                <label for="exampleInputEmail1">Email Id</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{$datas->email}}">
                 
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Reception Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="reception_email" placeholder="Enter email" value="{{$datas->reception_email}}">
                 
              </div>
 <div class="form-group">
                <label for="exampleInputEmail1">Property Manager Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="manager_email" placeholder="Enter email" value="{{$datas->manager_email}}">
                 
              </div>
              

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="tab_2">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Facebook</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="facebook" placeholder="Enter facebook id" value="{{$datas->facebook}}">
                   
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Twitter</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="twitter" placeholder="Enter twitter id" value="{{$datas->twitter}}">
                   
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Pinterest</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="pinterest" placeholder="Enter pinterest id" value=" {{$datas->pinterest}}">
                  
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Google</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="google" placeholder="Enter google id" value="{{$datas->google}}">
                   
                </div>

              </div>

              <!-- /.tab-pane -->
             <!--  <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <img src="{{url('public/images/contact')}}/{{$datas->image}}">
                <label for="exampleInputFile">File input</label>
              <input type="file" name="filename[]" class="form-control" value=" {{$datas->image}}">
              
              </div>
              </div> -->
              <!-- /.tab-pane -->
              @endforeach
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

