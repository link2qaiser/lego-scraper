<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="make_ajax">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
       <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-code"></i>Shortcodes </div>
                <div class="tools">
                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body" style="display: none;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name</th>
                            <th> Code</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $html = '';
                      $i = 0;
                      foreach ($shortcodes as $key=>$value) {
                         $html .= '<tr>
                            <td> '.++$i.' </td>
                            <td> '.$key.' </td>
                            <td> '.$value.' </td>
                            </tr>';
                      }
                      echo $html;
                      ?>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Title" required="">
        </div>
        <div class="form-group">
          <label for="template">Template</label>
          <textarea type="text" id="template" rows="15" name="template" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="type">Type</label>
          <select type="text" id="type" name="type" class="form-control">
            <?php 
            
            foreach ($type as $key=>$value) {
              echo '<option value="'.$key.'">'.$value.'</option>';
            }
            ?>
          </select>
        </div>
     
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">Create</button>
    </div>
</form>