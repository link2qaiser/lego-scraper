@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/link/add')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Link</a>
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
                              
                                <th class="sorting_asc" width="20%" >Title</th>
                                <th class="sorting_asc" width="30%" >Yelp Link</th>
                                <th class="sorting_asc" >Description</th>
                                <th class="sorting_asc" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  {

                                    $id = $row['yelout_links_id'];
                                    $html .= '<tr class="row-'.$id.'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['title'].'</td>';
                                    $html .= '<td>'.$row['link'].'&nbsp;&nbsp;&nbsp;<a href="'.$row['link'].'" target="_blank"> <i class="fa fa-external-link"></i></a></td>';

                                    $html .= '<td>'.$row['description'].'</td>';

                                    $html .= '<td><div class="btn-group"> <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true"> More <i class="fa fa-angle-down"></i> </button> <ul class="dropdown-menu" role="menu"> <li> <a href="'.url('/').'/'.$module.'/business/export?id='.$id.'"><i class="fa fa-file-excel-o"></i> Export Data</a> </li></ul> </div>';
                                    $html .= '&nbsp;&nbsp;&nbsp;<a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/link/delete?id='.$id.'">Delete</a>';
                                    if(@$row['is_stoped'] == 0)
                                        $html .= '<a class="btn btn-xs purple"  href="'.url('/').'/'.$module.'/link/update-status/stop/'.$id.'">Stop</a>';
                                    else
                                        $html .= '<a class="btn btn-xs purple"  href="'.url('/').'/'.$module.'/link/update-status/start/'.$id.'">Start</a>';
                                    $html .=  '</td>';
                            
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not yelp link. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/link/add\')">click here</a></h4></td><tr>'; 
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