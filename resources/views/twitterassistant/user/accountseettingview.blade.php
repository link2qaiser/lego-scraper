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
                    <form role="form" action="{!!url('/')!!}/{{ $module }}/accounts/update/{{ $id }}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Active</label>
                          <select class="form-control" name="active">
                            <option value="1">Yes</option>
                            <option value="0" <?php if($setting->active == 0) echo 'selected'; ?>>No</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Categories</label>
                          <select multiple="" class="form-control" name="categories[]">
                          <?php 
                            if($cat_list){
                              $cat  = explode(",",$setting->categories);
                              foreach($cat_list as $val){
                                $selected = (in_array($val->c_id,$cat))?"selected":"";
                                echo '<option '.$selected.' value="'.$val->c_id.'">'.$val->name.'</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mentions</label>
                          <textarea class="form-control" name="mentions" rows="3" placeholder="apple,nestle"><?php echo $setting->mentions; ?></textarea>
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