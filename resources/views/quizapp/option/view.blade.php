@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a href="<?php echo url($module.'/option/add/'.$parent_id); ?>"  class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Slide</a>
    <br/>
  </div>
</div>
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
                                <th class="sorting_asc" width="20%" >Title</th>
                      
                                <th class="sorting_asc" width="10%" >Image</th>
                                <th class="sorting_asc" width="10%" >Options</th>
                                
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";
                                $type = ['Text','Image','Multiple Images','Video'];
                                if(count($list['data']) > 0){
                                  
                                  foreach($list['data'] as $key=>$row)  {

                                    $html .= '<tr class="row-'.$row['opt_id'].'">';
                                    $html .= '<td >'.$row['heading'].'</td>';
                                    $image = ($row['image'] != "")?'<img src="'.url('storage/'.$storege).'/'.$row['image'].'" width="100">':'<img src="'.url('assets/no-image.jpg').'" width="100">';
                                    $html .= '<td >'.$image.'</td>';
                                    $image = '';
                                    $images_url = json_decode($row['options'],true);
                                    //echo "<pre>"; print_r($images_url); die();
                                    foreach ($images_url as $key => $value) {
                                        $image .= ($value['image'] != "")?'<img src="'.url('storage/'.$storege).'/'.$value['image'].'" width="100" style="margin-right: 10px;">':'<img src="'.url('assets/no-image.jpg').'" width="100" style="margin-right: 10px;">';  
                                            $image .= $value['title'].'<br/><br/>';
                                            
                                    }
                                    $html .= '<td >'.$image.'</td>';

                                    $html .= '<td><a class="btn btn-xs red delete" data-remove="row-'.$row['opt_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/option/delete/'.$row['opt_id'].'">Delete</a></td>';
                                    $html .= '</tr>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any Options against this Questions. </h4></td><tr>'; 
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
</div>
@include('paging')
@include('footer')