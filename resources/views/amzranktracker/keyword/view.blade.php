@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/keyword/create','{{$cam_id}}')" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Keywords</a>
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
                                <th class="sorting_asc"  >Rank Log</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  { 
                                    $html .= '<tr class="row-'.$row['amzkeywords_id'].'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['keyword'];

                                    $html .= ' <a class="btn btn-xs red delete" data-remove="row-'.$row['amzkeywords_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/keyword/delete/'.$row['amzkeywords_id'].'"><i class="fa fa-trash"></i></a></td>';
                                    $html .= '<td>';
                                    if(isset($row['rank_log'])) {
                                    
                                        foreach ($row['rank_log'] as $val) {
                                            $html .= "Date:".$val['rank_date']." | Position:".$val['position']." | Page:".$val['page'].'<br/>';
                                            
                                        }
                                    }
                                    $html .'</td>';
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