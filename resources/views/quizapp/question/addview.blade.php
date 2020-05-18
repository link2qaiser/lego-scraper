@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/question/add" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    <div class="col-md-6">
                       <label class="control-label" for="cat_id">Category:</label>
                       <select class="form-control" id="cat_id" name="cat_id">
                        <?php 
                        foreach ($categories as $key=>$value) {
                            echo '<option value="'.$value['cat_id'].'">'.$value['name'].'</option>';
                        }
                        ?>
                       </select>
                    </div>
                    <div class="col-md-6">
                       <label class="control-label" for="title">Title:</label>
                       <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="col-md-6">
                       <label class="control-label" for="slug">Slug:</label>
                       <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                    </div>
                    <div class="col-md-6">
                       <label class="control-label" for="heading">Heading:</label>
                       <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading">
                    </div>
                    <div class="col-md-12">
                       <label class="control-label" for="meta">Meta:</label>
                       <textarea class="form-control" id="meta" name="meta"></textarea>
                    </div>
                    <br/>
                    <div class="col-md-2">
                        <br/>
                       <label class="control-label">App Image:</label>
                       <input type="file" name="userfile" class="upload-image"  size="10" />
                    </div>

                    <div class="col-md-2">
                        <br/>
                      <img id="blah" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  /> 
                    </div>
                 </div>
                 <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                 </div>
              </form>
            </div>
        </div>
    </div>
    @include('footer')
</div>
@include($module.'/script')