@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">

    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/template/create')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Template</a>

  </div>
  <div class="col-md-2 pull-right">
    
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/shortcode/show')" class="btn btn-block btn-success"><i class="fa fa-fw fa-plus"></i> Show Short Codes</a>
  </div>

</div>
<br/>
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
                                <th class="sorting_asc" width="15%" >Title</th>
                                <th class="sorting_asc" >Template</th>
                                
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list['data']) > 0){
                                  foreach($list['data'] as $key=>$row)  { 
                                    $id = $row['tem_id'];
                                    $html .= '<tr class="row-'.$id.'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['title'].'</td>';
                                    $html .= '<td>'.$row['template'].'</td>';
                                   
                                    $html .= '<td><a class="btn btn-xs blue" href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/template/edit\','.$id.')" >Edit</a><a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/template/delete/'.$id.'">Delete</a></td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any compagin. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/template/create\')">click here</a></h4></td><tr>'; 
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