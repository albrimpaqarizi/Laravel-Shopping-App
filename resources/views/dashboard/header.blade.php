<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}">
            <img src="{{ url('assets/images/logo.svg') }}" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-left ">
            <li class="nav-item ">
                <a href="{{ url('/') }}" class="nav-link">Home page </a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count bg-success">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                    aria-labelledby="notificationDropdown">
                    <a class="dropdown-item py-3 border-bottom">
                        <p class="mb-0 font-weight-medium float-left">4 new notifications </p>
                        <span class="badge badge-pill badge-primary float-right">View all</span>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                            <p class="font-weight-light small-text mb-0"> Just now </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-settings m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                            <p class="font-weight-light small-text mb-0"> Private message </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                            <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="profile-text d-none d-md-inline-flex"> {{ Auth::user()->name }} </span>
                    <img class="img-xs rounded-circle" src="{{ url('storage/', Auth::user()->image) }}"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item p-0">
                        <div class="d-flex border-bottom w-100 justify-content-center">
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                            </div>
                            <div
                                class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item mt-2" href="{{ route('profiles.edit',Auth::user()->id ) }}"> Manage
                        Accounts
                    </a>
                    <a class="dropdown-item"> Change Password </a>
                    <a class="dropdown-item"> Check Inbox </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu icon-menu"></span>
        </button>
    </div>
</nav>