@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/category/update/<?php echo @$data_row['app_id'] ?>" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    <div class="col-md-4">
                       <label class="control-label">App Name:</label>
                       <input value="<?php echo @$data_row['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="App Name">
                    </div>
             
                    <div class="col-md-12"><hr></div>
                   
                    <div class="col-md-2">
                       <label class="control-label">App Image:</label>
                       <input type="file" name="userfile" class="upload-image"  size="10" />
                    </div>
                    <div class="col-md-2">
                      <?php 
                      echo ($data_row['app_img'] != "")?'<img src="'.url('storage/'.$storege).'/'.$data_row['app_img'].'" width="100" class="upload-image-preview">':'<img src="'.url('assets/no-image.jpg').'" width="100" class="upload-image-preview">';
                      ?>
                       
                    </div>
                    <div class="col-md-12">
                       <label class="control-label">Description:</label>
                       <textarea class="form-control" id="description" name="description"><?php echo @$data_row['description'] ?></textarea>
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