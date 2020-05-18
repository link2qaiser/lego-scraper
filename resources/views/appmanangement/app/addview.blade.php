@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{!!url('/')!!}/{{$module}}/app/add" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-body row">
                    <div class="col-md-4">
                       <label class="control-label">App Name:</label>
                       <input type="text" class="form-control" id="name" name="name" placeholder="App Name">
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
         
                 
                 <div class="col-md-12"><hr> <h4>Other Parameters</h4></div>
                 <div class="col-md-3">
                    <label class="control-label">Store:</label>
                    <select size="1"  name="sto_id" class="form-control">
                       <option value="0">Select</option>
                       <?php
                          if($stores){
                              foreach($stores as $key=>$row) {
                                  echo '<option value="'.$row['sto_id'].'">'.$row['name'].'</option>';
                            }
                          }
                          ?>
                    </select>
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">URL:</label>
                    <input type="text" class="form-control" name="url">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">Package Name:</label>
                    <input type="text" class="form-control" name="package_name">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">API Url:</label>
                    <input type="text" class="form-control" name="api_url">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">Add Url:</label>
                    <input type="text" class="form-control" name="add_url">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">AddMob ID:</label>
                    <input type="text" class="form-control" name="addmob_id">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">Startapp Dev ID:</label>
                    <input type="text" class="form-control" name="startapp_dev_id">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">Startapp App ID:</label>
                    <input type="text" class="form-control" name="startapp_app_id">
                 </div>
                 <div class="col-md-3">
                    <label class="control-label">Google Analytic ID:</label>
                    <input type="text" class="form-control" name="goolg_analytic_id">
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