<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="make_ajax">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
        
        <div>
          <label for="name">Full Name</label>
          <input type="text" name="name" value="{{$row['name']}}" id="name" class="form-control" placeholder="Full Name" required="">
        </div>
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" value="{{$row['email']}}" id="email" class="form-control" placeholder="Email" required="">
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" id="Password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="tools">Tools</label>
          <select name="tools[]" id="tools" class="form-control select2" required="" multiple="">
            @if(!empty($tools) && sizeof($tools)>0)
              @foreach($tools as $key => $val)
                <option value="{{$key}}" @if(in_array($key, $row['tools'])) selected="" @endif>{{$val}}</option>
              @endforeach
            @endif
          </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">Update</button>
    </div>
</form>