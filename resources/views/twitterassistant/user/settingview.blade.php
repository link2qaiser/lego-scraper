@include('header');
@include($module.'/submenu')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Account Setting </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Account List</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> @if (session('message'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      {{ session('message') }} </div>
    @endif
    
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Profile Setting</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Change Password</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <form role="form" action="{!!url('/')!!}/category/add" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Profile Picture</label>
                    <div class="box-body box-profile "> <img class="profile-user-img img-responsive img-circle pull-left" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Electronics etc.">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="slug" class="form-control" placeholder="electronics-something-with-dashes">
                  </div>
                </div>
                <!-- /.box-body -->
                
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <div class="tab-pane" id="tab_2">
              <form role="form" action="{!!url('/')!!}/category/add" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="text" name="name" class="form-control" placeholder="Electronics etc.">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="text" name="slug" class="form-control" placeholder="electronics-something-with-dashes">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Retype New Password</label>
                    <input type="text" name="slug" class="form-control" placeholder="electronics-something-with-dashes">
                  </div>
                </div>
                <!-- /.box-body -->
                
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('footer'); 