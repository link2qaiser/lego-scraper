@include('header')
@include($module.'/submenu')
<form action="" method="get">
<div class="row">
  <div class="col-md-2">
    <div class="form-group">
      <select class="form-control" name="type" >
        <option value="">Select Type (All)</option>
        <?php 
          $types = array( "image","video");
          if($types)   {
              foreach($types as $key=>$val)  {
                $selected = (isset($type) && @$type == $val)?"selected":"";
                echo '<option '.$selected.'  value="'.$val.'">'.$val.'</option>';
              }
          }
        ?>
        </select>
    </div>   
    
  </div>
  <div class="col-md-2">
    <div class="form-group">
        <select class="form-control"  name="category" >
          <option value="">Select Category (All)</option>
          <?php 
              $categories = config('constants.mediacategory');
              if($categories)   {
                  foreach($categories as $key=>$val)  {
                    $selected = (isset($category) && @$category == $key)?"selected":"";
                    echo '<option '.$selected.'  value="'.$key.'">'.$val.'</option>';
                  }
              }
            ?>
          
          </select>
      </div>
  </div>
  
  <div class="col-md-1">
    <div class="form-group">
      <button type="submit" class="btn yellow" name="filter"><i class="fa fa-filter"></i> Filter Results</button>
    </div>   
  </div>
  
  <div class="col-md-1 pull-right">

    <a  href="" class="btn btn-block btn-info"><i class="fa fa-refresh"></i> Add Reload</a>
    <br/>
  </div>
</div>
</form>
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; echo isset($count)?" (".$count.")":""; ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="sorting_asc" >Source</th>
                                <th class="sorting_asc" >Title</th>
                                <th class="sorting_asc" >Download</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $source = url($storege).'/'.$row['file'];

                                    $html .= '<tr>';
                                   
                                    $html .= '<td><a download="'.$source.'" title="'.$row['file'].'" target="_blank" href="'.$source.'">';

                                    if($row['type'] == "image")
                                        $html .='<img src="'.$source.'" width="100">';
                                    else 
                                        $html .='<video width="200" controls>
                                                  <source src="'.$source.'" type="video/mp4">
                                                  <source src="'.$source.'" type="video/ogg">
                                                  Your browser does not support HTML5 video.
                                                </video>';
                                    $html .= '</a><br/>';
                                    $html .= '<a download="'.$source.'" title="'.$row['file'].'" target="_blank" href="'.$source.'">Download '.$row['type'].' </a>';
                                    $html .= '</td>';
                                    $html .= '<td width="40%">'.$row['title'].'</td>';
                                    
                                    
                                    
                                    $html .= '<td><a href="'.url('/').'/'.$module.'/delete/'.$row['id'].'?file='.$row['file'].'" class="btn btn-xs red">Delete</a></td>';
                                    $html .= '</tr>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any media. </h4></td><tr>'; 
                                }
                                ?>
                                
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-1 pull-right">
            <a  href="" class="btn btn-block btn-info"><i class="fa fa-refresh"></i> Reload</a>
            <br/>
          </div>
        </div>
    </div>
    @include('footer')
</div>