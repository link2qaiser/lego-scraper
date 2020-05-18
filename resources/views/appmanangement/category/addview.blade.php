@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/category/add/{{$parent_id}}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    <div class="col-md-4">
                       <label class="control-label">Name:</label>
                       <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">

                    </div>
             
                    <div class="col-md-12"><hr></div>
                   
                    <div class="col-md-2">
                       <label class="control-label">App Image:</label>
                       <input type="file" name="userfile" class="upload-image"  size="10" />
                    </div>
                    <div class="col-md-2">
                      <img id="blah" src="{{url('/')}}/assets/no-image.jpg" class="upload-image-preview" alt="Thumbnail" height="100"  /> 
                    </div>
                    <div class="col-md-12">
                       <label class="control-label">Description:</label>
                       <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                 </div>
                 <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create</button>
                 </div>
              </form>
            </div>
        </div>
    </div>
    @include('footer')
</div>