@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="<?php echo url('/').'/'.$module.'/store/add'; ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Store</a>
    <br/>
  </div>
</div>
<div class="row">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> Name </th>
                        <th> Brand </th>
                        <th> Url </th>
                        <th> Card # </th>
                        <th> Holder Name </th>
                        <th> Perchase Date </th>
                        <th> Description </th>
                        <th class="hidden-480" width="10%;"> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                     
                        
                         <?php 
                            $i  = 1;
                            $html = "";

                            if(count($list['data']) > 0){
                              foreach($list['data'] as $key=>$row)  { 
                                $html .= '<tr class="row-'.$row['sto_id'].'">';
                                $html .= '<td>'.$i++.'</td>';
                                $html .= '<td>'.$row['name'].'</td>';
                                $html .= '<td>'.$brands[$row['bra_id']]['name'].'</td>';

                               
                                $html .= '<td>'.$row['card_number'].'</td>';
                                $html .= '<td>'.$row['card_holder_name'].'</td>';
                                $html .= '<td>'.$row['perchase_date'].'</td>';
                                $html .= '<td>'.$row['des'].'</td>';



                                $html .= '<td><a class="btn btn-xs blue" href="'.url('/').'/'.$module.'/store/update/'.$row['sto_id'].'">Edit</a> <a class="btn btn-xs red delete" data-remove="row-'.$row['sto_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/store/delete/'.$row['sto_id'].'">Delete</a</td>';
                                $html .= '</tr>';
                              }
                              echo $html;
                            }
                            else {
                              echo '<tr><td colspan="6" align="center"><h4>You have not any Stores. to add <a href="'.url('/').'/'.$module.'/rss/add">click here</a></h4></td><tr>'; 
                            }
                            ?>
                    </tbody>
                  </table>
                    
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>