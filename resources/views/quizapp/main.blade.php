@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="<?php echo url('/').'/'.$module.'/add'; ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add App</a>
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
                                <th class="sorting_asc" width="20%" >Name</th>
                                <th class="sorting_asc" width="10%" >Image</th>
                                <th class="sorting_asc" width="40%" >Description</th>
                                <th class="sorting_asc" width="10%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(count($list['data']) > 0){
                                  
                                  foreach($list['data'] as $key=>$row)  {

                                    $html .= '<tr>';
                                    $html .= '<td >'.$row['name'].'</td>';
                                    $html .= '<td >'.$row['app_img'].'</td>';
                                    $html .= '<td >'.$row['description'].'</td>';
                                    $html .= '<td><a href="'.url('/').'/'.$module.'/delete/'.$row['app_id'].'" class="btn btn-xs blue">Edit</a><a href="'.url('/').'/'.$module.'/delete/'.$row['app_id'].'" class="btn btn-xs red">Delete</a></td>';
                                    $html .= '</tr>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any Apps. </h4></td><tr>'; 
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