@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/website/create')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Website</a>
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
                              
                                <th class="sorting_asc" width="25%" >URL</th>
                                <th class="sorting_asc" width="10%" >In Search</th>
                                <th class="sorting_asc" >Description</th>
                                <th class="sorting_asc" width="10%">Keywords</th>
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list['data']) > 0){
                                  foreach($list['data'] as $key=>$row)  { 
                                    $id = $row['web_id'];
                                    $html .= '<tr class="row-'.$row['web_id'].'">';
                                    $html .= '<td>'.$i++.'</td>';
                                  
                                    $html .= '<td>'.$row['url'].'</td>';
                                    $indexed = ($row['in_search'] == 1)?'yes':'no';
                                    $html .= '<td>'.$indexed.'</td>';
                                    $html .= '<td>'.$row['description'].'</td>';
                                    $html .= '<td align="center"><a  href="'.url($module.'/keyword/view/'.$row['web_id']).'" >View ('.$row['key_count'].')</a><br/> <a  href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/keyword/create\','.$row['web_id'].')" >+Add Keywords</a></td>';

                                    $html .= '<td><div class="btn-group"> <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> More <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu" role="menu"> </li> <li> <a href="'.url($module.'/email/view/'.$id).'"> <i class="fa fa-envelope-o"></i> View Emails </a> </li> <li> <a href="'.url($module.'/email/export/'.$id).'"> <i class="fa fa-file-excel-o"></i> Export Emails </a><li class="divider"> </li> <li> <a href="'.url($module.'/link/export/'.$id).'"> <i class="fa fa-file-excel-o"></i> Export Links </a> </li> <li> <a href="'.url($module.'/link/export/'.$id).'?flag=expired"> <i class="fa fa-file-excel-o"></i> Export Expired Links </a> </li>  <li> <a href="javascript:;"> <i class="icon-flag"></i> Comments <span class="badge badge-success">4</span> </a> </li> </ul> </div>&nbsp;&nbsp;<a class="btn btn-xs blue" href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/website/edit\','.$row['web_id'].')" >Edit</a><a class="btn btn-xs red delete" data-remove="row-'.$row['web_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/website/delete/'.$row['web_id'].'">Delete</a>
                                                        
                                                    </td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any compagin. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/website/create\')">click here</a></h4></td><tr>'; 
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