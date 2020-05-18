@include('header')
@include($module.'/style')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body ">
                <form role="form" action="{!!url('/')!!}/{{$module}}/post/add/{{$parent_id}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-body row">
                      <div class="col-md-2">
                         <label class="control-label">Type:</label>
                         <select  name="type" class="form-control" id="type"  >
                           <option value="0">Text</option>
                           <option value="1">Image</option>
                           <option value="2">Images Multiple</option>
                           <option value="3">Video</option>
                         </select>
                      </div>
                      <div class="col-md-4">
                         <label class="control-label" for="title">Title:</label>
                         <input type="text" class="form-control" id="title" name="title" placeholder="Title">

                      </div>
                      <div class="col-md-12">
                         <label class="control-label" for="description">Description:</label>
                         <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                      <div class="col-md-12">
                         <label class="control-label" for="tags">Tags:</label>
                         <textarea class="form-control" id="tags" name="tags" placeholder="Sperated by comma like cat,food"></textarea>
                      </div>
                      
                       <div id="type_1"  style="display: none;" >
                        <div class="col-md-12"><hr></div>
                         <div class="col-md-2">
                           <label class="control-label">Image:</label>
                           <input type="file" name="single_image" class="image-preview" data-target="#single_image" size="10" />
                           
                         </div>
                         <div class="col-md-2">
                          <img id="single_image" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  /> 
                         </div>
                       </div>
                       
                       <div id="type_2" style="display: none;">
                        <div class="col-md-12"><hr></div>
                         <div class="col-md-2">
                           <label class="control-label">Images:</label>
                           <input type="file" name="multiple_image[]" class="image-preview-multiple"  size="10" multiple="" />
                           
                         </div>
                         <div class="col-md-12" id="m-image-preview">
                         
                         </div>
                       </div>
                       
                       <div id="type_3" style="display: none;">
                        <div class="col-md-12"><hr></div>
                         <div class="col-md-4">
                           <label class="control-label">Video Url:</label>
                           <input type="text" class="form-control" id="video_url" name="video_url" placeholder="www.youtube.com">
                         </div>
                         <div class="col-md-2">
                           <label class="control-label">Cover Image:</label>
                            <input type="file" name="image_preview" class="image-preview" data-target="#video_cover"  size="10" />
                         </div>
                         <div class="col-md-2">
                            <img id="video_cover" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  /> 
                         </div>
                         
                       </div>
                       <div class="col-md-12"><hr></div>
                   </div>
                   <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Create</button>
                   </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@include('footer')
@include($module.'/script')