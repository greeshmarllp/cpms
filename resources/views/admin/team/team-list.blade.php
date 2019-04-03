@include('header')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Teams Tables
        <!-- <small>advanced tables</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table</h3> -->
              <a href="{{url('/admin/add-team')}}/tocken" class="btn btn-success pull-right">Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl/No</th>
                  <th>Heading</th>
                  <!-- <th>Content</th> -->
                  <th>Image</th>
                  <th>Action</th>
                  
                </tr> 
                </thead>
                <tbody>
                   <?php $i=1; ?>
                   @foreach($data as $datas)
                  
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$datas->heading}}</td>
                  <td>
                      @if(!empty($datas->image))
                    <img src="{{url('public/images/team')}}/{{$datas->image}}">
                    @endif
                </td>
                  <td>
                    <a  href="{{url('/admin/add-team')}}/{{$datas->id}}" class="btn btn-sm btn-info"  data-id="{{ $datas->id }}" href="javascript:void(0)"><i class="glyphicon glyphicon-edit"></i></a>
                    &nbsp;&nbsp;
                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" id="delete_product" data-id="{{ $datas->id }}" class="btn"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('footer')

<script>
  $(document).ready(function(){

    readProducts(); / it will load products when document loads /
    $(document).on('click', '#delete_product', function(e){

      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });

  });

  function SwalDelete(productId){
    // alert(productId);
    swal({
      title: 'Are you sure?',
      text: "It will be deleted permanently!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      showLoaderOnConfirm: true,

      preConfirm: function() {

        return new Promise(function(resolve) {
          var baseurl=$("#baseurl").val();
           $.ajax({
            type: 'POST',
            url: 'Delete',
            
            dataType: 'json',
              data: {"_token": "{{ csrf_token() }}",'id':+productId}
              
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
          readProducts();
          $('#example1').load(document.URL + ' #example1');
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false
    });

  }

  function readProducts(){
    $('#load-products').load('read.php');
  }

</script>