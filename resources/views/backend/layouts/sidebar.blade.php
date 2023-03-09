<script src="https://kit.fontawesome.com/0b13bde584.js" crossorigin="anonymous"></script>
<style>
    
    .sidebar .nav .nav-item .nav-link .menu-title{
        margin: 0 0 0 17px;
    }
</style>
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav ">
            <li class="nav-item {{ request()->is('subcategory') ? 'active' : '' }} ">
                <a class="nav-link" href="/auth">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a> 
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Category</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item "> <a class="nav-link " href="{{ route('category.create') }}">Add</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">Manage</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                    aria-controls="ui-basic1">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Subcategory</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item "> <a class="nav-link" href="{{ route('subcategory.create') }}">Add</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('subcategory.index') }}">Manage</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                    aria-controls="ui-basic2">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Childcategory</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('childcategory.create') }}">Add</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('childcategory.index') }}">Manage</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">  
                <a class="nav-link" href="{{route('all.ads')}}">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span class="menu-title"> All advertisements</span>
                </a>
            </li>
             
            <li class="nav-item">
            <a class="nav-link" href="{{route('all.reported.ads')}}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="menu-title">Reported ads</span> 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('all.show-all-register-user')}}">
                        <i class="fa-solid fa-users"></i>
                        <span class="menu-title"> Show All register user</span>
                    </a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('show-comment')}}">
                         <i class="mdi mdi-comment"></i>
                        <span class="menu-title"> Show Comment User</span>
                    </a>
             </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/icons/mdi.html">
                    <i class="mdi mdi-emoticon menu-icon"></i>
                    <span class="menu-title">Icons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">User Pages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documentation/documentation.html">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Documentation</span>
                </a>
            </li> --}}
        </ul>
    </nav>
