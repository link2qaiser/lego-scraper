@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/keyword/create','{{$web_id}}')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Keywords</a>
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
                                <th class="sorting_asc"  >Keyword</th>
                                <th class="sorting_asc"  >Ranking Detial</th>
                                <th class="sorting_asc"  >Current Page</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list['data']) > 0){
                                  
                                  foreach($list['data'] as $key=>$row)  { 
                                    $html .= '<tr class="row-'.$row['key_id'].'">';
                                    $html .= '<td>'.$i.'</td>';
                                    $html .= '<td>'.$row['keyword'];
                                    $html .= ' <a class="btn btn-xs red delete" data-remove="row-'.$row['key_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/keyword/delete/'.$row['key_id'].'"><i class="fa fa-trash"></i></a></td>';
                                    
                                    $html .= '<td>';
                                    if($row['ranking_log'] != "") {
                                        $ranking_log = json_decode($row['ranking_log'],true);
                                        ksort($ranking_log);
                                        
                                        $pre = 0;
                                        $k = 0;
                                        foreach ($ranking_log as $ikey=>$ival) {
                                            
                                            if($k == 0) {
                                                $diff = 0;  
                                            }else {
                                                $diff = $pre - (int)$ival;
                                            }
                                            $class = '';
                                            if($diff < 0) {
                                                $class = 'red';
                                            }
                                            else if($diff > 0) {
                                                $diff = '+'.$diff;
                                                $class = 'green';
                                            }


                                            $html .= $ikey.": <strong>".$ival."</strong>";
                                            $html .= " | Difference: <strong style='color:".$class."'>".$diff."</strong><br/>";
                                            $pre = (int)$ival;
                                            $k++;
                                        }
                                    }
                                    $html .= '</td>';
                                    $html .= '<td>'.$row['page'];
                                    
                                    $html .= '</td>';
                                    
                                    $i++;
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any keyword. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/keyword/create/'.$cam_id.'\')">click here</a></h4></td><tr>'; 
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