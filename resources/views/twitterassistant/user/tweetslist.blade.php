@include('header');
@include($module.'/submenu')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Add Category</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section>
  
  
  <!-- Main content -->
  <section class="content">
   @if (session('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('message') }} 
        </div>
        @endif
        
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-12"> 
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add Category Form</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th class="sorting_asc" >SN</th>
                <th class="sorting_asc" >Twitter Username</th>
                <th class="sorting_asc" >Tweet</th>
                <th class="sorting_asc" >Actions</th>
                
               
              </tr>
            </thead>
            <tbody>
              <?php 
				$i 	=	1;
				if(count($tweets) > 0){
				foreach($tweets as $key=>$row)	{ 
				?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row->screen_name; ?></td>
                <td><?php echo $row->contant; ?></td>
             
                <td><a target="_blank" href="https://twitter.com/<?php echo $row->screen_name; ?>/status/<?php echo $row->tw_id; ?>">Visit Tweet</a></td>
                
                 
              </tr>
   
              <?php } } else echo '<tr><td colspan="6" align="center"><h3>No result found</h3></td><tr>';  ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--/.col (left) --> 
      <!-- right column --> 
      
      <!--/.col (right) --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@include('footer');
> 