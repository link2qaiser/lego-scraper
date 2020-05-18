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
                    <form role="form" action="{!!url('/')!!}/{{$module}}/rss/update/{{$id}}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                        <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control"  name="c_id">
                              <?php 
                                if($categories)   {
                                foreach($categories as $key=>$val)  {
                                  $selected   = ($val->c_id == $row->c_id)?"selected":"";
                                  echo '<option  '.$selected.' value="'.$val->c_id.'">'.$val->name.'</option>';
                                }
                                }
                                ?>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                            <input type="text" name="link" class="form-control" placeholder="http://feeds.feedburner.com/TechCrunch/startups" value="<?php echo $row->link; ?>">
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
    @include('footer')
</div>