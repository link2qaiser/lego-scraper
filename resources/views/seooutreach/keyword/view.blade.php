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
                                <th class="sorting_asc" width="40%"   >Keyword</th>
                                <th class="sorting_asc"  >Tags</th>
                                <th class="sorting_asc"  width="20%"   >Comments / Note</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  {
                                    $style = (@$row['tags'] != "")?'style="background-color:#bdbcbc;"':'';
                                    $html .= '<tr class="row-'.$row['keywords_id'].'" '.$style.'>';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>';
                                    $html .= ' <a class="btn btn-xs red delete" data-remove="row-'.$row['keywords_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/keyword/delete/'.$row['keywords_id'].'"><i class="fa fa-trash"></i></a>';
                                    $html .= $row['keyword'];
                                    $html .= ' <a class="btn btn-xs blue" href="https://www.google.com/search?q='.str_replace(" ", "+",$row['keyword']).'" target="_blank" ><i class="fa fa-external-link"></i></a>';
                                    $html .= '</td>';
                                    $html .= '<td>';
                                    $html .= '<select name="tags" id="select2-single-append" class="form-control select2-tags" multiple data-id="'.$row['keywords_id'].'">';
                                    $html .= '<option></option>';
                                    $tags = explode(",", $compaign['tags']);
                                    $kw_tags = [];
                                    if(isset($row['tags'])) {
                                        $kw_tags = $row['tags'];
                                    }
                                    //print_r($kw_tags); die();
                                    foreach ($tags as $tkey => $tval) {
                                        if(is_array($kw_tags))
                                            $selected = (in_array($tval, $kw_tags))?"selected":"";
                                        else
                                            $selected =  "";

                                        $html .= '<option value="'.$tval.'" '.$selected.'>'.$tval.'</option>';
                                    }
                                                     
                                    $html .= '</select>';
                                    $html .= '</td>';
                                    $html .= '<td>';
                                   
                                    $html .= '<div class="col-md-10 cust_cmnt des_box">';
                                    $html .= '<span id="des_text">';
                                    $html .= isset($row['note'])?$row['note']:'';
                                    $html .= '</span>';                                    
                                     
                                    $html .=  '<span id="edit_note" ><a href="javascript:void(0);" > <i class="fa fa-edit"></i></a></span>' ;
                                    
                                    $html .=  '<div>';
                                    $html .= '<span id="save_note" style="display: none;"><a href="javascript:void(0);" data-action="'.url('/').'/'.$module.'/keyword/update-note?keyword_id='.$row['keywords_id'].'" >save</a></span><span id="cancel_note" style="display: none; "> | <a href="javascript:void(0);" style="color: #FF0033;"  > cancel</a> <br/> </span>';
                                    $html .=  '</div>';
                                    $html .=  '</div>';
                                    $html .= '</td>';
                                    
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