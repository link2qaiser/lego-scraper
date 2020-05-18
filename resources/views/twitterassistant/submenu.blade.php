<br/>
<div class="row">
    <div class="col-md-12">
        <div id="folio-actions" class="navbar navbar-default" role="navigation">
            
            <div class="collapse navbar-collapse navbar-ex1-collapse listing-navbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/')}}/{{$module}}">Twitter Account</a></li>
                    <li class="dropdown listing-documents">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Categories <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li ><a href="{{url('/')}}/{{$module}}/category">View </a></li>
                            <li ><a href="{{url('/')}}/{{$module}}/category/add">Add</a></li>
                        </ul>
                    </li>
                    <li class="dropdown listing-documents">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage RSS <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li ><a href="{{url('/')}}/{{$module}}/rss">View </a></li>
                            <li ><a href="{{url('/')}}/{{$module}}/rss/add">Add</a></li>
                        </ul>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
</div>