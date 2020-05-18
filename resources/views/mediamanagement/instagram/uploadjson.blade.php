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
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category</label>
                          <select class="form-control"  name="c_id" required="required">
                            <option value="">Select One</option>
                            <?php 
                                $categories = config('constants.mediacategory');
                                if($categories)   {
                                    foreach($categories as $key=>$val)  {
                                        echo '<option  value="'.$key.'">'.$val.'</option>';
                                    }
                                }
                              ?>
                            
                            </select>
                        </div>
                        
                        <div class="form-group">
                          <input type="file" name="jsonfile"  >
                          <label >Select JSON file scrap by tool.</label>
                        </div>
                        
                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>