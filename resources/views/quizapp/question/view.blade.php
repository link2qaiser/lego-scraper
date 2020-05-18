@include('header')
@include($module.'/submenu')
<div class="row">
  <div class="col-md-2 pull-right">
    <a  href="<?php echo url('/').'/'.$module.'/question/add'; ?>" class="btn btn-block btn-info"><i class="fa fa-fw fa-plus"></i> Add Question</a>
    <br/>
  </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; echo isset($count)?" (".$count.")":""; ?></div>
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
                                <th class="sorting_asc" width="20%" >Title</th>
                                <th class="sorting_asc" width="10%" >Heading</th>
                                <th class="sorting_asc" width="10%" >Slug</th>
                                <th class="sorting_asc" width="10%" >Meta</th>
                                <th class="sorting_asc" width="20%" >Image</th>
                                <th class="sorting_asc" width="10%" >Options</th>
                                <th class="sorting_asc" width="10%" >Result</th>
                                <th class="sorting_asc" width="15%" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  = 1;
                                $html = "";

                                if(count($list['data']) > 0){
                                  
                                  foreach($list['data'] as $key=>$row)  {

                                    $html .= '<tr class="row-'.$row['que_id'].'">';
                                    $html .= '<td >'.$row['title'].'</td>';
                                    $html .= '<td >'.$row['heading'].'</td>';
                                    $html .= '<td >'.$row['slug'].'</td>';
                                    $html .= '<td >'.$row['meta'].'</td>';
                                   
                                    $image = ($row['image'] != "")?'<img src="'.url('storage/'.$storege).'/'.$row['image'].'" width="100">':'<img src="'.url('assets/no-image.jpg').'" width="100">';
                                    $html .= '<td >'.$image.'</td>';
                                    $html .= '<td align="center" ><a href="'.url('/').'/'.$module.'/option/'.$row['que_id'].'" >View</a><br/><a href="'.url('/').'/'.$module.'/option/add/'.$row['que_id'].'" >+ Add New</a></td>';

                                    $html .= '<td align="center" ><a href="'.url('/').'/'.$module.'/result/'.$row['que_id'].'" >View</a><br/><a href="'.url('/').'/'.$module.'/result/add/'.$row['que_id'].'" >+ Add New</a></td>';

                                    $html .= '<td><a href="'.url('/').'/'.$module.'/question/update/'.$row['que_id'].'" class="btn btn-xs blue">Edit</a><a class="btn btn-xs red delete" data-remove="row-'.$row['que_id'].'" href="javascript:void(0);" data-url="'.url('/').'/'.$module.'/question/delete/'.$row['que_id'].'">Delete</a></td>';
                                    $html .= '</tr>';
                                  }
                                  echo $html;
                                }
                                else {
                                  echo '<tr><td colspan="6" align="center"><h4>You have not any Question. </h4></td><tr>'; 
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
</div>
@include('paging')
@include('footer')