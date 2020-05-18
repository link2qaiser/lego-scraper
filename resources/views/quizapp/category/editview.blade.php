@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/category/update/<?php echo @$data_row['cat_id'] ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    <div class="col-md-4">
                       <label class="control-label">App Name:</label>
                       <input value="<?php echo @$data_row['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="App Name">
                    </div>
                    <div class="col-md-4">
                       <label class="control-label">Slug:</label>
                       <input type="text" value="<?php echo @$data_row['slug'] ?>" class="form-control" id="slug" name="slug" placeholder="slug">
                    </div>
                 </div>
                 <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                 </div>
              </form>
            </div>
        </div>
    </div>
    @include('footer')
</div>