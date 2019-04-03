@include('header')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       About Banner Tables
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
             <!-- <a href="{{url('/admin/add-aboutbanner')}}/tocken" class="btn btn-success pull-right">Add New</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl/No</th>
                  
                  <th>Content</th>
                  <th>Action</th>
                  
                </tr> 
                </thead>
                <tbody>
                   <?php $i=1; ?>
                   @foreach($data as $datas)
                  
                <tr>
                  <td>{{$i}}</td>
                  <td>
                      @if(!empty($datas->image))
                    <img src="{{url('public/images/aboutbanner')}}/{{$datas->image}}">
                    @endif
                </td>
                
                    <td>
                    <a  href="{{url('/admin/add-aboutbanner')}}/{{$datas->id}}" class="btn btn-sm btn-info"  data-id="{{ $datas->id }}" href="javascript:void(0)"><i class="glyphicon glyphicon-edit"></i></a>
                    
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