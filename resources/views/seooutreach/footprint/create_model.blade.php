<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="make_ajax">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
        <div class="form-group">
          <label for="footprint_type">Type</label>
          <select type="text" name="footprint_type" id="footprint_type" class="form-control" >
            <?php
            foreach ($footprint_type as $key => $value) {
              echo '<option value="'.$key.'">'.$value.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="footprint">Footprint</label>
          <textarea type="text" id="footprint" name="footprint" class="form-control" rows="10"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">+Add</button>
    </div>
</form>