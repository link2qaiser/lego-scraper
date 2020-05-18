@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/seedkeyword/create')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Seed Keyword</a>
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
                                
                                <th class="sorting_asc" width="10%">Keyword</th>
                                <th class="sorting_asc" >Description</th>
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $id = $row['seokwr_seedkeywords_id'];
                                    $html .= '<tr class="row-'.$id.'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    
                                    $html .= '<td>'.$row['keyword'].'</td>';
                                    $html .= '<td>'.$row['description'].'</td>';
                                    

                                    $html .= '<td>';

                                     $html .= '<div class="btn-group"> <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> More <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu" role="menu"> </li> <li> <a  href="'.url('/').'/'.$module.'/seedkeyword/viewall/'.$id.'"><i class="fa fa-list-alt"></i> View All</a> </li> <li> <a href="'.url($module.'/keywords/export/'.$id."?index=scrap_keywords").'"> <i class="fa fa-file-excel-o"></i> Export All </a></li> <li> <a href="'.url($module.'/keywords/export/'.$id."?index=stared").'"> <i class="fa fa-file-excel-o"></i> Export Stared </a></li></ul> </div>';
                                    $html .='&nbsp;&nbsp;&nbsp;<a class="btn btn-xs blue" href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/seedkeyword/edit\','.$id.')" >Edit</a><a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/seedkeyword/delete/'.$id.'">Delete</a>';

                                    $html .= '</td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any compagin. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/seedkeyword/create\')">click here</a></h4></td><tr>'; 
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