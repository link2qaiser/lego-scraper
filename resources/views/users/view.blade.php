@include('header')
@include($module.'/submenu')
<div class="row">
    <br/>
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/create')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add User</a>
    <br/>
  </div>
</div>
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                
            </div>
            <div class="portlet-body">
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="2%"> # </th>
                                <th class="sorting_asc" width="15%" >Name</th>
                                <th class="sorting_asc" width="15%" >Email</th>
                                <th class="sorting_asc" width="10%">Tools</th>
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $id = $row['id'];
                                    $html .= '<tr class="row-'.$id.'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['name'].'</td>';
                                    $html .= '<td>'.$row['email'].'</td>';
                                    $html .= '<td>'.str_replace(",", "<br/>", $row['tools']).'</td>';

                                    $html .= '<td>';
                                    $html .= '&nbsp;&nbsp;<a class="btn btn-xs blue" href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/update\',\''.$id.'\')" >Edit</a><a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/delete/'.$id.'">Delete</a>';
                                  
                                    $html .=  '</td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any user. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/create\')">click here</a></h4></td><tr>'; 
                                }
                                ?>
                                
                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('paging')
    </div>

    @include('footer')

</div>