@include('header')
@include($module.'/submenu')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
            </div>
            <div class="portlet-body form">
                <form class="make_ajax" role="form" action="{!!url('/')!!}/{{$module}}/store/update/<?php echo @$data_row['sto_id']; ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-body row">
                    <div class="col-md-3">
                      <label class="control-label">Brand:</label>
                      <div class="">
                        <select  class="form-control" name="bra_id" >
                        <?php 
                          if($brands){
                            foreach($brands as $key=>$row){
                              $sel = @($key == $data_row['bra_id'])?@$data_row['bra_id']:"";
                              echo '<option '.$sel.' value="'.$key.'">'.$row['name'].'</option>';
                            }
                                
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">Name:</label>
                        <input type="text" value="<?php echo @$data_row['name']; ?>" class="form-control" required="required" id="name" name="name" placeholder="ie. BrainApp">
                    </div>
                    <div class="col-md-6">
                      <label class="control-label">URL:</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="ie. https://play.google.com/store/apps/dev?id=9056201477378752336&hl=en">
                    </div>
              
                    <div class="col-md-12"><hr><h3>Perchase Information</h3></div>
                    <div class="col-md-3">
                      <label class="control-label">Card Number:</label>
                        <input type="text" class="form-control" value="<?php echo @$data_row['card_number']; ?>"  name="card_number" placeholder="ie.999">
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">Card Holder Name:</label>
                        <input value="<?php echo @$data_row['card_holder_name']; ?>" type="text" class="form-control" name="card_holder_name" placeholder="ie. Abdullah">
                    </div>
                    <div class="col-md-3">
                      <label class="control-label">Perchase Date:</label>
                        <input value="<?php echo @$data_row['perchase_date']; ?>" type="date" class="form-control" name="perchase_date" >
                    </div>
                    <div class="col-md-12">
                      <label class="control-label">Note:</label>
                        <textarea type="text" class="form-control"  name="des" placeholder="Infomration about IP and where you buy that store"><?php echo @$data_row['des']; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
</div>