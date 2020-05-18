@include('header')
@include($module.'/submenu')
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
                                <th class="sorting_asc" width="20%">Website</th>
                                <th class="sorting_asc">Emails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $id = $row['seooutreach_link_id'];
                                    $html .= '<tr >';
                                    $html .= '<td>'.$i++.'</td>';
                                    $link = parse_url($row['link']);
                                    
                                    $html .= '<td>'.@$link['host'].' <a href="'.$row['link'].'" target="_blank"> <i class="fa fa-external-link"></i></a></td>';
                                    $html .= '<td>';
                                    if(isset($row['email'])){
                                        foreach ($row['email'] as $ikey => $ivalue) {
                                            $sid = time().rand();
                                            $html .= '<p class="row-'.$id.$sid.'"> <a class="btn btn-xs red delete" data-remove="row-'.$id.$sid.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/email/delete/'.$id.'?email='.$ivalue.'"><i class="fa fa-trash-o"></i></a> '.$ivalue.'</p>';
                                        }
                                    }
                                    $html .= '</td>';
                                    
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>No link found</h4></td><tr>'; 
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