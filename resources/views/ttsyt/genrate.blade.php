@include('header')
@include($module.'/submenu')
<div class="row genrator">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                <div class="tools"></div>
                <div class="actions">
                    <a  class="btn green-jungle btn-sm" href="javacript:void(0)" id="add_paragraph" ><i class="fa fa-plus"></i> Add Paragraph</a>
                </div>
            </div>
            <div class="portlet-body" style="    padding: 0px;">
                <div class="table-responsive">
                    <form role="form" action="{!!url('/')!!}/{{$module}}" method="post" enctype="multipart/form-data">
                      <div class="box-body"  >
                       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer" >
                        
                        <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                        <br/>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span id="paragraph_html" style="display: none;">
      <div class="paragraph_html" >
            <div class="form-group">
              <label for="exampleInputEmail1"><strong>Title {=count=}</strong></label>
              <input type="text" name="title[]" value="" class="form-control" placeholder="Franklyn Ajaye Net Worth">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"><strong>Paragraph{=count=}</strong></label>
              <textarea type="text" name="paragraph[]" rows="7" class="form-control"></textarea>
            </div>
        </div>
    </span>
    @include('footer')
    @include($module.'/script')
    @include($module.'/style')
</div>
