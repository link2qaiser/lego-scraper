@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/result/add/{{$que_id}}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    
                    <div class="col-md-6">
                       <label class="control-label" for="title">Title:</label>
                       <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    
                    <div class="col-md-12">
                       <label class="control-label" for="description">Description:</label>
                       <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <br/>
                    <div class="col-md-2">
                        <br/>
                       <label class="control-label">Result Image:</label>
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