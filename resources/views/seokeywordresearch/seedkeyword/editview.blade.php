@include('header')
@include($module.'/submenu')
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <form role="form" action="{!!url('/')!!}/twitterassistant/category/update/<?php echo $row->c_id; ?>" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" name="name" value="<?php echo $row->name; ?>" class="form-control" placeholder="Electronics etc.">
                          
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Slug</label>
                          <input type="text" name="slug" class="form-control" placeholder="electronics-something-with-dashes" value="<?php echo $row->slug; ?>">
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>