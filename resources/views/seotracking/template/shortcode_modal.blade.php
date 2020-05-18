<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">{{$model_title}}</h4>
</div>
<div class="modal-body"> 
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
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
</div>
