@include('header')
@include($module.'/submenu')
<div class="row genrator">

    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                <div class="tools"></div>
                
            </div>
            <div class="portlet-body" style="    padding: 0px;">
                <div class="table-responsive">
                    <form role="form" action="{!!url('/')!!}/{{$module}}/scrapdata" method="get"  >
                      <div class="box-body"  >
                        <div class="paragraph_html" >
                          <div class="form-group">
                              <label for="url"><strong>Headings</strong></label>
                              <select class="form-control" name="headings">
                                @for($i = 1; $i <= 5; $i++)
                                <option @if(@$heading == $i) selected="" @endif value="h{{$i}}">H{{$i}}</option>
                                @endfor
                                
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="articlecontainer"><strong>URL</strong></label>
                              <input type="text" name="articlecontainer" class="form-control" placeholder='//*[@id="post-10452"]/div[2]/div[1]' value='@if(@$articlecontainer) {{$articlecontainer}} @endif'>
                            </div>
                            <div class="form-group">
                              <label for="url"><strong>URL</strong></label>
                              <input type="text" name="url" class="form-control" placeholder="https://thelistli.com/best-router-lifts-in-the-world/" value="@if(@$url) {{$url}} @endif">
                            </div>
                            
                        </div>
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer" >
                        <button type="submit" class="btn btn-primary pull-right" >Scrap Data</button>
                        <br/>
                      </div>
                    </form>
                </div>
            </div>
            
        </div>
        @if(isset($images))
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i><?php echo isset($page_heading)?$page_heading:""; ?></div>
                <div class="tools"></div>
                
            </div>
            
            <div class="portlet-body" style="    padding: 0px;">
                <div class="table-responsive">
                    <form role="form" action="{!!url('/')!!}/{{$module}}/scrapdata" method="get"  >
                      <div class="box-body"  >
                        <div class="row" >
                          <div class="col-md-8" 
                              @foreach($images as $key=>$val)
                                  <input type="checkbox" name="image[]" value="{{$val}}">
                                  <img src="{{$val}}" width="200">
                           
                              @endforeach
                         </div>
                         <div class="col-md-4" >
                          <table>
                          <?php $count = 1; ?>
                              @foreach($headings as $key=>$val)
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="headings[]" value="{{$val}}" >
                                    </td>
                                    <td>
                                      <h3><strong>{{$count++ .'. '.$val}}</strong></h3>
                                    </td>
                                  </tr>
                           
                              @endforeach
                         </div>
                         </table>
                       </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </div>
                      <!-- /.box-body -->
                      
                      <div class="box-footer" >
                        <button type="submit" class="btn btn-primary pull-right" >Genrate</button>
                        <br/>
                      </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
    
    @include('footer')
    @include($module.'/script')
    @include($module.'/style')
</div>
