@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="<?php echo url('/').'/'.$module.'/category/add'; ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Category</a>
    <br/>
  </div>
</div>
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
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
                                <th> # </th>
                                <th class="sorting_asc" >Name</th>
                                <th class="sorting_asc" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $html .= '<tr>';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['name'].'</td>';
                                    $html .= '<td><a  href="'.url('/').'/'.$module.'/category/update/'.$row['c_id'].'"> Edit </a> | <a href="'.url('/').'/'.$module.'/category/delete/'.$row['c_id'].'">Delete</a</td>';
                                    $html .= '</tr>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any category. to add <a href="'.url('/').'/'.$module.'/category/add">click here</a></h4></td><tr>'; 
                                }
                                ?>
                                
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>