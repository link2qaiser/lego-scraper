<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
       
        <div class="form-group">
          <label for="filter">Where Filter</label>
          <input type="text" name="filter" id="filter" class="form-control" placeholder="'%top 10%'" >
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">Export</button>
    </div>
</form>