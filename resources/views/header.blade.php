<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{{$page_title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for full width layout with mega menu" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('/') }}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('/') }}/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('/') }}/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}/assets/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />

    <!-- NOTIFICATION CSS -->
    <link href="{{ asset('/') }}/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="" />
    <style type="text/css">
        th {
            text-transform: uppercase;
        }
        
        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="#">
                         </a>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN MEGA MENU -->
                <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
                <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
                <div class="hor-menu hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="classic-menu-dropdown active"> <a href="{{url('/dashboard')}}"><i style="color:#fff;" class="fa fa-home"></i> <span class="selected"></span> </a> </li>

                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  "> <a href="{{ url('twitterassistant') }}"> Twitter Assistent <span class="arrow"></span> </a>
                            
                        </li>
                       

                    </ul>
                </div>
            </div>
            <!-- END HEADER INNER -->
        </div>

        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <div class="page-container">
            <!-- END HEADER & CONTENT DIVIDER -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse" aria-expanded="false">
                    <!-- END SIDEBAR MENU -->
                    <div class="page-sidebar-wrapper">
                        <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                        <ul class="page-sidebar-menu visible-sm visible-xs  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                                <button class="btn submit">
                                                    <i class="icon-magnifier"></i>
                                                </button>
                                            </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
                            <li class="nav-item start active">
                                <a href="index.html" class="nav-link nav-toggle"> Active
                                        <span class="selected"> </span>
                                        <span class="arrow "> </span>
                                    </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-home"></i>
                                            <span class="title">Dashboard</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item start ">
                                                <a href="index.html" class="nav-link ">
                                                    <i class="icon-bar-chart"></i>
                                                    <span class="title">Dashboard 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item start ">
                                                <a href="dashboard_2.html" class="nav-link ">
                                                    <i class="icon-bulb"></i>
                                                    <span class="title">Dashboard 2</span>
                                                    <span class="badge badge-success">1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item start ">
                                                <a href="dashboard_3.html" class="nav-link ">
                                                    <i class="icon-graph"></i>
                                                    <span class="title">Dashboard 3</span>
                                                    <span class="badge badge-danger">5</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="heading hide">
                                        <h3 class="uppercase">Features</h3>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-diamond"></i>
                                            <span class="title">UI Features</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="ui_metronic_grid.html" class="nav-link ">
                                                    <span class="title">Metronic Grid System</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_colors.html" class="nav-link ">
                                                    <span class="title">Color Library</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_general.html" class="nav-link ">
                                                    <span class="title">General Components</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_buttons.html" class="nav-link ">
                                                    <span class="title">Buttons</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_buttons_spinner.html" class="nav-link ">
                                                    <span class="title">Spinner Buttons</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_confirmations.html" class="nav-link ">
                                                    <span class="title">Popover Confirmations</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_sweetalert.html" class="nav-link ">
                                                    <span class="title">Bootstrap Sweet Alerts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_icons.html" class="nav-link ">
                                                    <span class="title">Font Icons</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_socicons.html" class="nav-link ">
                                                    <span class="title">Social Icons</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_typography.html" class="nav-link ">
                                                    <span class="title">Typography</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                                                    <span class="title">Tabs, Accordions &amp; Navs</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_timeline.html" class="nav-link ">
                                                    <span class="title">Timeline 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_timeline_2.html" class="nav-link ">
                                                    <span class="title">Timeline 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_timeline_horizontal.html" class="nav-link ">
                                                    <span class="title">Horizontal Timeline</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_tree.html" class="nav-link ">
                                                    <span class="title">Tree View</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <span class="title">Page Progress Bar</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_blockui.html" class="nav-link ">
                                                    <span class="title">Block UI</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_bootstrap_growl.html" class="nav-link ">
                                                    <span class="title">Bootstrap Growl Notifications</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_notific8.html" class="nav-link ">
                                                    <span class="title">Notific8 Notifications</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_toastr.html" class="nav-link ">
                                                    <span class="title">Toastr Notifications</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_bootbox.html" class="nav-link ">
                                                    <span class="title">Bootbox Dialogs</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_alerts_api.html" class="nav-link ">
                                                    <span class="title">Metronic Alerts API</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_session_timeout.html" class="nav-link ">
                                                    <span class="title">Session Timeout</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_idle_timeout.html" class="nav-link ">
                                                    <span class="title">User Idle Timeout</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_modals.html" class="nav-link ">
                                                    <span class="title">Modals</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_extended_modals.html" class="nav-link ">
                                                    <span class="title">Extended Modals</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_tiles.html" class="nav-link ">
                                                    <span class="title">Tiles</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_datepaginator.html" class="nav-link ">
                                                    <span class="title">Date Paginator</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ui_nestable.html" class="nav-link ">
                                                    <span class="title">Nestable List</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-puzzle"></i>
                                            <span class="title">Components</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="components_date_time_pickers.html" class="nav-link ">
                                                    <span class="title">Date &amp; Time Pickers</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_color_pickers.html" class="nav-link ">
                                                    <span class="title">Color Pickers</span>
                                                    <span class="badge badge-danger">2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_select2.html" class="nav-link ">
                                                    <span class="title">Select2 Dropdowns</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_select.html" class="nav-link ">
                                                    <span class="title">Bootstrap Select</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_multi_select.html" class="nav-link ">
                                                    <span class="title">Bootstrap Multiple Select</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_multiselect_dropdown.html" class="nav-link ">
                                                    <span class="title">Bootstrap Multiselect Dropdowns</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                                    <span class="title">Select Splitter</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_clipboard.html" class="nav-link ">
                                                    <span class="title">Clipboard</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_typeahead.html" class="nav-link ">
                                                    <span class="title">Typeahead Autocomplete</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_tagsinput.html" class="nav-link ">
                                                    <span class="title">Bootstrap Tagsinput</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_switch.html" class="nav-link ">
                                                    <span class="title">Bootstrap Switch</span>
                                                    <span class="badge badge-success">6</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_maxlength.html" class="nav-link ">
                                                    <span class="title">Bootstrap Maxlength</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_fileinput.html" class="nav-link ">
                                                    <span class="title">Bootstrap File Input</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_bootstrap_touchspin.html" class="nav-link ">
                                                    <span class="title">Bootstrap Touchspin</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_form_tools.html" class="nav-link ">
                                                    <span class="title">Form Widgets &amp; Tools</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_context_menu.html" class="nav-link ">
                                                    <span class="title">Context Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_editors.html" class="nav-link ">
                                                    <span class="title">Markdown &amp; WYSIWYG Editors</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_code_editors.html" class="nav-link ">
                                                    <span class="title">Code Editors</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_ion_sliders.html" class="nav-link ">
                                                    <span class="title">Ion Range Sliders</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_noui_sliders.html" class="nav-link ">
                                                    <span class="title">NoUI Range Sliders</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="components_knob_dials.html" class="nav-link ">
                                                    <span class="title">Knob Circle Dials</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-settings"></i>
                                            <span class="title">Form Stuff</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="form_controls.html" class="nav-link ">
                                                    <span class="title">Bootstrap Form
                                                            <br>Controls</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_controls_md.html" class="nav-link ">
                                                    <span class="title">Material Design
                                                            <br>Form Controls</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_validation.html" class="nav-link ">
                                                    <span class="title">Form Validation</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_validation_states_md.html" class="nav-link ">
                                                    <span class="title">Material Design
                                                            <br>Form Validation States</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_validation_md.html" class="nav-link ">
                                                    <span class="title">Material Design
                                                            <br>Form Validation</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_layouts.html" class="nav-link ">
                                                    <span class="title">Form Layouts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_repeater.html" class="nav-link ">
                                                    <span class="title">Form Repeater</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_input_mask.html" class="nav-link ">
                                                    <span class="title">Form Input Mask</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_editable.html" class="nav-link ">
                                                    <span class="title">Form X-editable</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_wizard.html" class="nav-link ">
                                                    <span class="title">Form Wizard</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_icheck.html" class="nav-link ">
                                                    <span class="title">iCheck Controls</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_image_crop.html" class="nav-link ">
                                                    <span class="title">Image Cropping</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_fileupload.html" class="nav-link ">
                                                    <span class="title">Multiple File Upload</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="form_dropzone.html" class="nav-link ">
                                                    <span class="title">Dropzone File Upload</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-bulb"></i>
                                            <span class="title">Elements</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="elements_steps.html" class="nav-link ">
                                                    <span class="title">Steps</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="elements_lists.html" class="nav-link ">
                                                    <span class="title">Lists</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="elements_ribbons.html" class="nav-link ">
                                                    <span class="title">Ribbons</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="elements_overlay.html" class="nav-link ">
                                                    <span class="title">Overlays</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="elements_cards.html" class="nav-link ">
                                                    <span class="title">User Cards</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-briefcase"></i>
                                            <span class="title">Tables</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="table_static_basic.html" class="nav-link ">
                                                    <span class="title">Basic Tables</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="table_static_responsive.html" class="nav-link ">
                                                    <span class="title">Responsive Tables</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="table_bootstrap.html" class="nav-link ">
                                                    <span class="title">Bootstrap Tables</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <span class="title">Datatables</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="?p=" class="nav-link nav-toggle">
                                            <i class="icon-wallet"></i>
                                            <span class="title">Portlets</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="portlet_boxed.html" class="nav-link ">
                                                    <span class="title">Boxed Portlets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="portlet_light.html" class="nav-link ">
                                                    <span class="title">Light Portlets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="portlet_solid.html" class="nav-link ">
                                                    <span class="title">Solid Portlets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="portlet_ajax.html" class="nav-link ">
                                                    <span class="title">Ajax Portlets</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="portlet_draggable.html" class="nav-link ">
                                                    <span class="title">Draggable Portlets</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">Charts</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="charts_amcharts.html" class="nav-link ">
                                                    <span class="title">amChart</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="charts_flotcharts.html" class="nav-link ">
                                                    <span class="title">Flot Charts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="charts_flowchart.html" class="nav-link ">
                                                    <span class="title">Flow Charts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="charts_google.html" class="nav-link ">
                                                    <span class="title">Google Charts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="charts_echarts.html" class="nav-link ">
                                                    <span class="title">eCharts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="charts_morris.html" class="nav-link ">
                                                    <span class="title">Morris Charts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <span class="title">HighCharts</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="charts_highcharts.html" class="nav-link "> HighCharts </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="charts_highstock.html" class="nav-link "> HighStock </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="charts_highmaps.html" class="nav-link "> HighMaps </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-pointer"></i>
                                            <span class="title">Maps</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="maps_google.html" class="nav-link ">
                                                    <span class="title">Google Maps</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="maps_vector.html" class="nav-link ">
                                                    <span class="title">Vector Maps</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="heading hide">
                                        <h3 class="uppercase">Layouts</h3>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="layout_blank_page.html" class="nav-link ">
                                            <i class="icon-layers"></i>
                                            <span class="title">Blank Page</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-layers"></i>
                                            <span class="title">Page Layouts</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="layout_blank_page.html" class="nav-link ">
                                                    <span class="title">Blank Page</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_classic_page_head.html" class="nav-link ">
                                                    <span class="title">Classic Page Head</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_light_page_head.html" class="nav-link ">
                                                    <span class="title">Light Page Head</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_content_grey.html" class="nav-link ">
                                                    <span class="title">Grey Bg Content</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_search_on_header_1.html" class="nav-link ">
                                                    <span class="title">Search Box On Header 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_search_on_header_2.html" class="nav-link ">
                                                    <span class="title">Search Box On Header 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_language_bar.html" class="nav-link ">
                                                    <span class="title">Header Language Bar</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_footer_fixed.html" class="nav-link ">
                                                    <span class="title">Fixed Footer</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_boxed_page.html" class="nav-link ">
                                                    <span class="title">Boxed Page</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-feed"></i>
                                            <span class="title">Sidebar Layouts</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_menu_light.html" class="nav-link ">
                                                    <span class="title">Light Sidebar Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_menu_hover.html" class="nav-link ">
                                                    <span class="title">Hover Sidebar Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_search_1.html" class="nav-link ">
                                                    <span class="title">Sidebar Search Option 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_search_2.html" class="nav-link ">
                                                    <span class="title">Sidebar Search Option 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_toggler_on_sidebar.html" class="nav-link ">
                                                    <span class="title">Sidebar Toggler On Sidebar</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="?p=layout_sidebar_menu_accordion" class="nav-link ">
                                                    <span class="title">Sidebar Accordion Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="?p=layout_sidebar_menu_compact" class="nav-link ">
                                                    <span class="title">Sidebar Compact Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_reversed.html" class="nav-link ">
                                                    <span class="title">Reversed Sidebar Page</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_fixed.html" class="nav-link ">
                                                    <span class="title">Fixed Sidebar Layout</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_sidebar_closed.html" class="nav-link ">
                                                    <span class="title">Closed Sidebar Layout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  active open">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-paper-plane"></i>
                                            <span class="title">Horizontal Menu</span>
                                            <span class="selected"></span>
                                            <span class="arrow open"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="layout_mega_menu_light.html" class="nav-link ">
                                                    <span class="title">Light Mega Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_mega_menu_dark.html" class="nav-link ">
                                                    <span class="title">Dark Mega Menu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  active open">
                                                <a href="layout_full_width.html" class="nav-link ">
                                                    <span class="title">Full Width Layout</span>
                                                    <span class="selected"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class=" icon-wrench"></i>
                                            <span class="title">Custom Layouts</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="layout_disabled_menu.html" class="nav-link ">
                                                    <span class="title">Disabled Menu Links</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_full_height_portlet.html" class="nav-link ">
                                                    <span class="title">Full Height Portlet</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="layout_full_height_content.html" class="nav-link ">
                                                    <span class="title">Full Height Content</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="heading hide">
                                        <h3 class="uppercase">Pages</h3>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-basket"></i>
                                            <span class="title">eCommerce</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="ecommerce_index.html" class="nav-link ">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Dashboard</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ecommerce_orders.html" class="nav-link ">
                                                    <i class="icon-basket"></i>
                                                    <span class="title">Orders</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ecommerce_orders_view.html" class="nav-link ">
                                                    <i class="icon-tag"></i>
                                                    <span class="title">Order View</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ecommerce_products.html" class="nav-link ">
                                                    <i class="icon-graph"></i>
                                                    <span class="title">Products</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="ecommerce_products_edit.html" class="nav-link ">
                                                    <i class="icon-graph"></i>
                                                    <span class="title">Product Edit</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-docs"></i>
                                            <span class="title">Apps</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="app_todo.html" class="nav-link ">
                                                    <i class="icon-clock"></i>
                                                    <span class="title">Todo 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="app_todo_2.html" class="nav-link ">
                                                    <i class="icon-check"></i>
                                                    <span class="title">Todo 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="app_inbox.html" class="nav-link ">
                                                    <i class="icon-envelope"></i>
                                                    <span class="title">Inbox</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="app_calendar.html" class="nav-link ">
                                                    <i class="icon-calendar"></i>
                                                    <span class="title">Calendar</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="app_ticket.html" class="nav-link ">
                                                    <i class="icon-notebook"></i>
                                                    <span class="title">Support</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-user"></i>
                                            <span class="title">User</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="page_user_profile_1.html" class="nav-link ">
                                                    <i class="icon-user"></i>
                                                    <span class="title">Profile 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_user_profile_1_account.html" class="nav-link ">
                                                    <i class="icon-user-female"></i>
                                                    <span class="title">Profile 1 Account</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_user_profile_1_help.html" class="nav-link ">
                                                    <i class="icon-user-following"></i>
                                                    <span class="title">Profile 1 Help</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_user_profile_2.html" class="nav-link ">
                                                    <i class="icon-users"></i>
                                                    <span class="title">Profile 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <i class="icon-notebook"></i>
                                                    <span class="title">Login</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_1.html" class="nav-link "> Login Page 1 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_2.html" class="nav-link "> Login Page 2 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_3.html" class="nav-link "> Login Page 3 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_4.html" class="nav-link "> Login Page 4 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_5.html" class="nav-link "> Login Page 5 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_user_login_6.html" class="nav-link "> Login Page 6 </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_user_lock_1.html" class="nav-link ">
                                                    <i class="icon-lock"></i>
                                                    <span class="title">Lock Screen 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_user_lock_2.html" class="nav-link ">
                                                    <i class="icon-lock-open"></i>
                                                    <span class="title">Lock Screen 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-social-dribbble"></i>
                                            <span class="title">General</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="page_general_about.html" class="nav-link ">
                                                    <i class="icon-info"></i>
                                                    <span class="title">About</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_contact.html" class="nav-link ">
                                                    <i class="icon-call-end"></i>
                                                    <span class="title">Contact</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <i class="icon-notebook"></i>
                                                    <span class="title">Portfolio</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="javascript:;" class="nav-link nav-toggle">
                                                    <i class="icon-magnifier"></i>
                                                    <span class="title">Search</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item ">
                                                        <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_pricing.html" class="nav-link ">
                                                    <i class="icon-tag"></i>
                                                    <span class="title">Pricing</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_pricing_2.html" class="nav-link ">
                                                    <i class="icon-tag"></i>
                                                    <span class="title">Pricing 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_faq.html" class="nav-link ">
                                                    <i class="icon-wrench"></i>
                                                    <span class="title">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_blog.html" class="nav-link ">
                                                    <i class="icon-pencil"></i>
                                                    <span class="title">Blog</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_blog_post.html" class="nav-link ">
                                                    <i class="icon-note"></i>
                                                    <span class="title">Blog Post</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_invoice.html" class="nav-link ">
                                                    <i class="icon-envelope"></i>
                                                    <span class="title">Invoice</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_general_invoice_2.html" class="nav-link ">
                                                    <i class="icon-envelope"></i>
                                                    <span class="title">Invoice 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <i class="icon-settings"></i>
                                            <span class="title">System</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item  ">
                                                <a href="page_cookie_consent_1.html" class="nav-link ">
                                                    <span class="title">Cookie Consent 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_cookie_consent_2.html" class="nav-link ">
                                                    <span class="title">Cookie Consent 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_coming_soon.html" class="nav-link ">
                                                    <span class="title">Coming Soon</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_404_1.html" class="nav-link ">
                                                    <span class="title">404 Page 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_404_2.html" class="nav-link ">
                                                    <span class="title">404 Page 2</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_404_3.html" class="nav-link ">
                                                    <span class="title">404 Page 3</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_500_1.html" class="nav-link ">
                                                    <span class="title">500 Page 1</span>
                                                </a>
                                            </li>
                                            <li class="nav-item  ">
                                                <a href="page_system_500_2.html" class="nav-link ">
                                                    <span class="title">500 Page 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle"> Mega
                                        <span class="arrow"> </span>
                                    </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 1
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 2
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 3
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle"> Full Mega
                                        <span class="arrow"> </span>
                                    </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 1
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 2
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 3
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 4
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">Example Link</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">More Options</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Accordions
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <div id="accordion2" class="panel-group mega-menu-responsive-content">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" class="collapsed"> Mega Menu Info #1 </a>
                                                                </h4>
                                                        </div>
                                                        <div id="collapseOne2" class="panel-collapse in">
                                                            <div class="panel-body"> Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements. </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-danger">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="collapsed"> Mega Menu Info #2 </a>
                                                                </h4>
                                                        </div>
                                                        <div id="collapseTwo2" class="panel-collapse collapse">
                                                            <div class="panel-body"> Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements. </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2"> Mega Menu Info #3 </a>
                                                                </h4>
                                                        </div>
                                                        <div id="collapseThree2" class="panel-collapse collapse">
                                                            <div class="panel-body"> Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements. </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle"> Classic
                                        <span class="arrow"></span>
                                    </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link"> Section 1 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link"> Section 2 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link"> Section 3 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link"> Section 4 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle"> Section 5
                                                <span class="arrow"></span>
                                            </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link nav-toggle"> Second level link </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link nav-toggle"> More options
                                                        <span class="arrow "></span>
                                                    </a>
                                                <ul class="sub-menu">
                                                    <li class="nav-item">
                                                        <a href="javascript:;" class="nav-link"> Third level link </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:;" class="nav-link"> Third level link </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:;" class="nav-link"> Third level link </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:;" class="nav-link"> Third level link </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link"> Second level link </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link"> Second level link </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:;" class="nav-link"> Second level link </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                    </div>
                </div>
                <!-- END SIDEBAR -->
            </div>

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 638px;">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">

                        <div class="toggler-close"> </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                    <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-sm">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-sm">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-sm">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Menu Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-sm">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-sm">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style </span>
                                <select class="sidebar-style-option form-control input-sm">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="light">Light</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-sm">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-sm">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            @foreach ($breadcrumbs as $key => $value)
                            <li>
                                @if($key != "#")
                                <a href="{{url($key)}}">{{$value}}</a>
                                <i class="fa fa-circle"></i> @else
                                <span>{{$value}}</span> @endif
                            </li>
                            @endforeach
                        </ul>
                        <div class="page-toolbar">
                            @yield('content')
                        </div>
                    </div>
                    <!-- END PAGE BAR -->