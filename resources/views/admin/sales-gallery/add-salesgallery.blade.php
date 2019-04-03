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
  <form action="{{ url('/admin/save-salesgallery') }}/@if(!empty($edit_item)){{$edit_item[0]->id}}@else{{'tocken'}} @endif" method="post" enctype="multipart/form-data" class="dropzone" id="dropzone"> 
  {{ csrf_field() }}
  <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Titles & Sub Titles</a></li>
              <!-- <li><a href="#tab_2" data-toggle="tab">Details</a></li> -->
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
                    <label for="inputPassword3" class="col-sm-3 control-label">Heading</label>
                    <select class="form-control" name="property_id">

                      @foreach($category as $categories)

                      <option value="{{$categories->id}}" @if(!empty($data[0]->property_id)) {{ $data[0]->property_id == $categories->id ? 'selected' : '' }} @endif> {{$categories->heading}} </option>

                      @endforeach
                    </select>
                  </div>                   

 

              </div>
              <input type="button" id='uploadfiles' value='Upload Files' >
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>       
  </div>

</form>
<form>
  
             {{ csrf_field() }}    
              <div class="tab-pane" id="tab_3">

                                 <div class="form-group">
                    @if(!empty($edit_item))

                      <div style='float: left; width: 100%;'>
                        <ul id="sortable" >
                          
                            @foreach($edit_item as $datas)

                              @php ($id=$datas->id)
                              @php ($i=1)
                              @php ($name = $datas->image)

                              {!!'<li class="ui-state-default" id="image_'.$id.'">'!!}
                                <img src="{{url('public/images/salesgallery')}}/{{$datas->image}}" title="'.$name.'"><span style="cursor:pointer;" class="btn btn-small btn-danger" onclick="javascript:deleteimage(<?php echo $datas->id; ?>)" id="delete_image">X</span>

                                <!-- <span>  <input type="checkbox" id="home_portfolio<?php echo $datas->id;?>" name="home_portfolio" value="1" <?php if (!empty($datas->home_portfolio) && $datas->home_portfolio == '1')  echo 'checked = "checked"'; ?>  onclick="javascript:updatestatus(<?php echo $datas->id;?>,<?php echo $i; ?>)" >Enable<br></span> -->
                            </li>
                              <?php $i++; ?>
                            @endforeach

                        </ul>
                      </div>
                      <div style="clear: both; margin-top: 20px;">
                        <input type='button' value='Change order' id='submit'>
                      </div>
                    @endif
                </div>

               

              </div>

</form>
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('footer')

<!-- dropzone image delete -->
<script type="text/javascript">
  function deleteimage(image_id)
  {
    var answer = confirm ("Are you sure you want to delete it ?");
    if (answer){
     $.ajax({
        type: "POST",
        url : '../deleteimage',
        dataType: 'json',
        data: {"_token": "{{ csrf_token() }}",imageids: image_id},
        success: function (response) {

          alert('Images deleted');
          location.reload(); 
        }
      });
    }
  }
</script>