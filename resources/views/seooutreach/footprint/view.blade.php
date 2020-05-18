@include('header')
@include($module.'/submenu')
<div class="row">
 <div class="col-md-2">
    <select name="footprint_type" class="form-control">
        <option value="">All</option>
        <?php 
        foreach ($footprint_type as $key => $value) {
            echo '<option value="'.$key.'">'.$value.'</option>';
        }
        ?>
        
    </select>
 </div>
 <div class="col-md-2">
    <button type="submit" class="btn  btn-info"><i class="fa fa-fw fa-plus"></i> Filter</button>
    <br/>
 </div>
 <form action="{{url($module.'/footprint/export')}}" method="GET" >
    <div class="col-md-2 pull-right">
        <input type="hidden" name="filter" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
        <button name="export" value="1" type="submit" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Export</button>
    <br/>
  </div>
  <div class="col-md-2 pull-right">
        <input type="text" name="keyword" class="form-control">
    </div>
</form>
</div>
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?>
                </div>
                <div class="actions">
                    <a href="#data_modal" data-toggle="modal" onclick="loadModal('{{$module}}/footprint/create')" class="btn green-jungle btn-sm" ><i class="fa fa-plus"></i> Add Footprint</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="2%"> # </th>
                                <th class="sorting_asc" >Footprint</th>
                                <th class="sorting_asc" width="10%" >Type</th>
                                <th class="sorting_asc" width="5%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(@count($list) > 0){
                                  foreach($list as $key=>$row)  {
                                    $id  = $row['smsoutreach_footprint_id'];
                                    $html .= '<tr class="row-'.$id.'">';
                                    $html .= '<td>'.$i++.'</td>';
                                    $html .= '<td>'.$row['footprint'].'</td>';
                                    $html .= '<td>'.$footprint_type[$row['footprint_type']].'</td>';
                                    

                                    $html .= '<td><a class="btn btn-xs red delete" data-remove="row-'.$id.'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/footprint/delete/'.$id.'">Delete</a></td>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any footprint. to add <a href="#data_modal" data-toggle="modal" onclick="loadModal(\''.$module.'/footprint/create\')">click here</a></h4></td><tr>'; 
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