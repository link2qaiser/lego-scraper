@include('header'); 
<!-- END HEADER -->
<div class="clearfix"> </div>
<!-- BEGIN CONTAINER -->

<div class="page-container"> 
  <!-- BEGIN SIDEBAR --> 
  @include('sidebar'); 
  <!-- END SIDEBAR --> 
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content"> 
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body"> Widget settings form goes here </div>
            <div class="modal-footer">
              <button type="button" class="btn blue">Save changes</button>
              <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content --> 
        </div>
        <!-- /.modal-dialog --> 
      </div>
      <!-- /.modal --> 
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> 
      <!-- BEGIN STYLE CUSTOMIZER --> 
      
      <!-- END STYLE CUSTOMIZER --> 
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">Post</h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <i class="fa fa-home"></i> <a href="index.html">Home</a> <i class="fa fa-angle-right"></i> </li>
          <li> <a href="#">Data Tables</a> <i class="fa fa-angle-right"></i> </li>
          <li> <a href="#">Responsive Datatables</a> </li>
        </ul>
      </div>
      <!-- END PAGE HEADER--> 
      <!-- BEGIN PAGE CONTENT-->
      
      <div class="row">
        <div class="col-md-12"> 
          
          <!-- BEGIN SAMPLE TABLE PORTLET-->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption"> <i class="fa fa-gift"></i>Add Post</div>
              <div class="tools"> <a href="javascript:;" class="collapse" data-original-title="" title=""> </a> <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a> <a href="javascript:;" class="reload" data-original-title="" title=""> </a> <a href="javascript:;" class="remove" data-original-title="" title=""> </a> </div>
            </div>
            <div class="portlet-body form"> 
              <!-- BEGIN FORM-->
              <form action="{!!url('post/add')!!}" method="post" class="horizontal-form" enctype="multipart/form-data">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Slug</label>
                        <input type="text" class="form-control" name="slug" placeholder="how-to-make-life-happy">
                      </div>
                    </div>
                    <!--/span-->
                    
                    <div class="col-md-6">
                      <label class="control-label">Category</label>
                      <select class="form-control" name="c_id">
                        <option value="0">---Select---</option>
                        <?php foreach($cat_list as $key=>$row)	{ ?>
                        <option value="<?php echo $row['c_id'];?>"><?php echo $row['name'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                    
                    <!--/span--> 
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Title</label>
                        <input type="text" id="firstName" class="form-control" name="title" placeholder="How to make life happy">
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Heading</label>
                        <input type="text" name="heading" id="lastName" class="form-control" placeholder="How to make life happy">
                      </div>
                    </div>
                    <!--/span--> 
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Meta Descriotion</label>
                        <textarea name="meta_desc"  class="form-control" placeholder="How to make life happy"></textarea>
                        <span class="help-block">It will be long text </span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Meta Keywords</label>
                        <textarea  name="meta_key" class="form-control" placeholder="How to make life happy"></textarea>
                        <span class="help-block">All keywords sparated by comad </span> </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Feature Image</label>
                        <input type="file" name="image"  class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Image Alt</label>
                        <input type="text" name="image_alt" id="lastName" class="form-control" placeholder="How to make life happy">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Streaming Source</label>
                        <select class="form-control" name="is_iframe">
                          <option value="0">---Select---</option>
                          <option value="1">Iframe</option>
                          <option value="2">Javascript</option>
                          <option value="3">Player</option>
                          <option value="4">Custom</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Streaming Link</label>
                        <input type="text" name="streamin_link"  class="form-control" placeholder="http://poovee.net/embed/239/?autoplay=1&stream=express&width=undefined&height=undefined&clip=express&syndicate=000000000">
                      </div>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-md-12">
                      <textarea name="content" id="summernote_1">

										</textarea>
                    </div>
                  </div>
                  <div class="form-actions right">
                    <button type="button" class="btn default">Cancel</button>
                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
                  </div>
                </div>
              </form>
              <!-- END FORM--> 
            </div>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT--> 
    </div>
  </div>
</div>

<!-- END CONTENT --> 
<!-- BEGIN QUICK SIDEBAR --> 
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
<div class="page-quick-sidebar-wrapper">
  <div class="page-quick-sidebar">
    <div class="nav-justified">
      <ul class="nav nav-tabs nav-justified">
        <li class="active"> <a href="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span> </a> </li>
        <li> <a href="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span> </a> </li>
        <li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More<i class="fa fa-angle-down"></i> </a>
          <ul class="dropdown-menu pull-right" role="menu">
            <li> <a href="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts </a> </li>
            <li> <a href="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications </a> </li>
            <li> <a href="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities </a> </li>
            <li class="divider"> </li>
            <li> <a href="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings </a> </li>
          </ul>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
          <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
            <h3 class="list-heading">Staff</h3>
            <ul class="media-list list-items">
              <li class="media">
                <div class="media-status"> <span class="badge badge-success">8</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar3.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Bob Nilson</h4>
                  <div class="media-heading-sub"> Project Manager </div>
                </div>
              </li>
              <li class="media"> <img class="media-object" src="../../assets/admin/layout/img/avatar1.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Nick Larson</h4>
                  <div class="media-heading-sub"> Art Director </div>
                </div>
              </li>
              <li class="media">
                <div class="media-status"> <span class="badge badge-danger">3</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar4.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Deon Hubert</h4>
                  <div class="media-heading-sub"> CTO </div>
                </div>
              </li>
              <li class="media"> <img class="media-object" src="../../assets/admin/layout/img/avatar2.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Ella Wong</h4>
                  <div class="media-heading-sub"> CEO </div>
                </div>
              </li>
            </ul>
            <h3 class="list-heading">Customers</h3>
            <ul class="media-list list-items">
              <li class="media">
                <div class="media-status"> <span class="badge badge-warning">2</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar6.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Lara Kunis</h4>
                  <div class="media-heading-sub"> CEO, Loop Inc </div>
                  <div class="media-heading-small"> Last seen 03:10 AM </div>
                </div>
              </li>
              <li class="media">
                <div class="media-status"> <span class="label label-sm label-success">new</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar7.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Ernie Kyllonen</h4>
                  <div class="media-heading-sub"> Project Manager,<br>
                    SmartBizz PTL </div>
                </div>
              </li>
              <li class="media"> <img class="media-object" src="../../assets/admin/layout/img/avatar8.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Lisa Stone</h4>
                  <div class="media-heading-sub"> CTO, Keort Inc </div>
                  <div class="media-heading-small"> Last seen 13:10 PM </div>
                </div>
              </li>
              <li class="media">
                <div class="media-status"> <span class="badge badge-success">7</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar9.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Deon Portalatin</h4>
                  <div class="media-heading-sub"> CFO, H&D LTD </div>
                </div>
              </li>
              <li class="media"> <img class="media-object" src="../../assets/admin/layout/img/avatar10.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Irina Savikova</h4>
                  <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                </div>
              </li>
              <li class="media">
                <div class="media-status"> <span class="badge badge-danger">4</span> </div>
                <img class="media-object" src="../../assets/admin/layout/img/avatar11.jpg" alt="...">
                <div class="media-body">
                  <h4 class="media-heading">Maria Gomez</h4>
                  <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                  <div class="media-heading-small"> Last seen 03:10 AM </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="page-quick-sidebar-item">
            <div class="page-quick-sidebar-chat-user">
              <div class="page-quick-sidebar-nav"> <a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a> </div>
              <div class="page-quick-sidebar-chat-user-messages">
                <div class="post out"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span> </div>
                </div>
                <div class="post in"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span> </div>
                </div>
                <div class="post out"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span> </div>
                </div>
                <div class="post in"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span> </div>
                </div>
                <div class="post out"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span> </div>
                </div>
                <div class="post in"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span> </div>
                </div>
                <div class="post out"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span> </div>
                </div>
                <div class="post in"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar2.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span> </div>
                </div>
                <div class="post out"> <img class="avatar" alt="" src="../../assets/admin/layout/img/avatar3.jpg"/>
                  <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span> </div>
                </div>
              </div>
              <div class="page-quick-sidebar-chat-user-form">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Type a message here...">
                  <div class="input-group-btn">
                    <button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
          <div class="page-quick-sidebar-alerts-list">
            <h3 class="list-heading">General</h3>
            <ul class="feeds list-items">
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i> </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> Just now </div>
                </div>
              </li>
              <li> <a href="javascript:;">
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-success"> <i class="fa fa-bar-chart-o"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> Finance Report for year 2013 has been released. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 20 mins </div>
                </div>
                </a> </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-danger"> <i class="fa fa-user"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 24 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 30 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 24 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-bell-o"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 2 hours </div>
                </div>
              </li>
              <li> <a href="javascript:;">
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-default"> <i class="fa fa-briefcase"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> IPO Report for year 2013 has been released. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 20 mins </div>
                </div>
                </a> </li>
            </ul>
            <h3 class="list-heading">System</h3>
            <ul class="feeds list-items">
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i> </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> Just now </div>
                </div>
              </li>
              <li> <a href="javascript:;">
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-danger"> <i class="fa fa-bar-chart-o"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> Finance Report for year 2013 has been released. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 20 mins </div>
                </div>
                </a> </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-default"> <i class="fa fa-user"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 24 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 30 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 24 mins </div>
                </div>
              </li>
              <li>
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-warning"> <i class="fa fa-bell-o"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span> </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 2 hours </div>
                </div>
              </li>
              <li> <a href="javascript:;">
                <div class="col1">
                  <div class="cont">
                    <div class="cont-col1">
                      <div class="label label-sm label-info"> <i class="fa fa-briefcase"></i> </div>
                    </div>
                    <div class="cont-col2">
                      <div class="desc"> IPO Report for year 2013 has been released. </div>
                    </div>
                  </div>
                </div>
                <div class="col2">
                  <div class="date"> 20 mins </div>
                </div>
                </a> </li>
            </ul>
          </div>
        </div>
        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
          <div class="page-quick-sidebar-settings-list">
            <h3 class="list-heading">General Settings</h3>
            <ul class="list-items borderless">
              <li> Enable Notifications
                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
              <li> Allow Tracking
                <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
              <li> Log Errors
                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
              <li> Auto Sumbit Issues
                <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
              <li> Enable SMS Alerts
                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
            </ul>
            <h3 class="list-heading">System Settings</h3>
            <ul class="list-items borderless">
              <li> Security Level
                <select class="form-control input-inline input-sm input-small">
                  <option value="1">Normal</option>
                  <option value="2" selected>Medium</option>
                  <option value="e">High</option>
                </select>
              </li>
              <li> Failed Email Attempts
                <input class="form-control input-inline input-sm input-small" value="5"/>
              </li>
              <li> Secondary SMTP Port
                <input class="form-control input-inline input-sm input-small" value="3560"/>
              </li>
              <li> Notify On System Error
                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
              <li> Notify On SMTP Error
                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
              </li>
            </ul>
            <div class="inner-content">
              <button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER --> 
<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a> </div>
  <div class="scroll-to-top"> <i class="icon-arrow-up"></i> </div>
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{!!url('category/add')!!}" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add Category</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Title</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label class="control-label">Slug</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label class="control-label">Meta Kyeword</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label class="control-label">Meta Description</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label class="control-label">H1</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label class="control-label">Content</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Food, Health">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn blue" value="Save">
        </div>
      </div>
    </form>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
@include('footer');