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
                    <form role="form" action="{!!url('/')!!}/twitterassistant/category/add" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="asin">ASIN</label>
                          <input type="text" name="asin" id="asin" class="form-control" placeholder="">
           
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                          <label for="note">Note</label>
                          <input type="text" name="note" id="note" class="form-control" placeholder="electronics-something-with-dashes">
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