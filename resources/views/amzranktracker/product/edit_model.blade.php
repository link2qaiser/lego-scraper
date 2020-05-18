<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="make_ajax">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
        <div class="form-group">
          <label for="asin">ASIN</label>
          <input type="text" name="asin" value="{{$row['asin']}}" id="asin" class="form-control" placeholder="Tech etc." required="">
        </div>
        <div class="form-group">
          <label for="note">Note</label>
          <textarea type="text" id="note" name="note" class="form-control">{{$row['note']}}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">Update</button>
    </div>
</form>