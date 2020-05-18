@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/compaign/create')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Compaign</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="2%"> # </th>
                                <th class="sorting_asc" width="15%" >Title</th>
                                <th class="sorting_asc" >Description</th>
                                <th class="sorting_asc" width="10%">Keywords</th>
                                <th class="sorting_asc" width="10%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list['data']) > 0){
                                  foreach($list['data'] as $key=>$row)  { 
                                    $html .= '<tr class="row-'.$row['cam_id'].'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['title'].'</td>';
                                    $html .= '<td>'.$row['description'].'</td>';
                                    $html .= '<td align="center"><a  href="'.url($module.'/keyword/view/'.$row['cam_id']).'" >View ('.$row['key_count'].')</a><br/> <a  href="#data_modal" data-toggle="modal" onclick="loadModal(\'seooutreach/keyword/create\','.$row['cam_id'].')" >+Add Keywords</a></td>';

                                    $html .= '<td><a class="btn btn-xs blue" href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/compaign/edit\','.$row['cam_id'].')" >Edit</a> <a class="btn btn-xs red delete" data-remove="row-'.$row['cam_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/compaign/delete/'.$row['cam_id'].'">Delete</a></td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any compagin. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/compaign/create\')">click here</a></h4></td><tr>'; 
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