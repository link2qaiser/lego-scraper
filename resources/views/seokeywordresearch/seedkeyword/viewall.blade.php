@include('header')
@include($module.'/style')
@include($module.'/submenu')

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
                                <th class="sorting_asc" width="15%">Keywords</th>
                                <th class="sorting_asc" width="5%" >Word Count</th>
                                <th class="sorting_asc" width="15%" >Seed Keyword</th>
                                
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
                                    $class = in_array($row['keyword'], $stared)?' stared':'';
                                    $html .= '<td>'.$row['keyword'].' <span data-id="'.$id.'" data-keyword="'.$row['keyword'].'" class="star_keyword'.$class.'" data-url="'.url($module.'/seedkeyword/stared').'" > <i class="fa fa-star"></i></span></td>';
                                    $html .= '<td>'.str_word_count($row['keyword']).'</td>';
                                    $html .= '<td>'.$row['seedkeyword'].'</td>';
                                    
                       
                                    

                                    $html .= '<td><a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/seedkeyword/delete/'.$id.'">Delete</a>
                                                        
                                                    </td>';
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
    @include($module.'/script')

</div>