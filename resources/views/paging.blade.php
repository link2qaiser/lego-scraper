<?php 
//echo "<pre>"; print_r($list); die();
if(isset($list['total']) && @$list['total'] != 0 ):
  // echo $list['next_page_url']; 
?>
<div class="row">
   <div class="col-md-5">
      <div class="dataTables_info" id="sample_3_info" role="status" aria-live="polite">Showing <?php  echo $list['from']; ?>  to <?php echo  $list['to']; ?> of <?php   echo $list['total']; ?> entries</div>
   </div>
   <div class="col-md-7 ">
      <div class="dataTables_paginate paging_bootstrap_number pull-right" >
         <ul class="pagination">
            <li class="prev <?php echo ($list['prev_page_url'] == '')?"disabled":''; ?>"><a href="<?php  echo ($list['prev_page_url'] == '')?"#":$list['prev_page_url']; ?>" title="Prev"><i class="fa fa-angle-left"></i></a></li>
            <?php 
            $loop  = ceil($list['total'] / $list['per_page']);
            for($i = 1; $i <= $loop; $i++){
               $active = ($list['current_page'] == $i)?'active':'';
               echo '<li class="'.$active.'"><a href="'.URL::current().'?page='.$i.'">'.$i.'</a></li>';
            }
            ?>
            <!-- <li class="active"><a href="#">1</a></li> -->
            <li class="next <?php echo ($list['next_page_url'] == '')?"disabled":''; ?>"><a href="<?php echo ($list['next_page_url'] == '')?"#":$list['next_page_url']; ?>" title="Next"><i class="fa fa-angle-right"></i></a></li>
         </ul>
      </div>
   </div>
</div>
<?php endif; ?>