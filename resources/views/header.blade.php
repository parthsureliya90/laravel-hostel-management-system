  <header id="page-header"> 
        <div class="content-header"> 
          <div class="space-x-1"> 
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button> 
          </div>
           
          <div class="space-x-1"> 
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block fw-semibold">  @auth
                   {{ Auth::user()->username }}
                @endauth </span>
                <i class="fa fa-angle-down opacity-50 ms-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                <div class="px-2 py-3 bg-body-light rounded-top">
                  <h5 class="h6 text-center mb-0">
                  @auth
                   {{ Auth::user()->username }}
                @endauth 
                  </h5>
                </div>
                <div class="p-2">  
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ route('change-password') }}" data-toggle="layout" data-action="side_overlay_toggle">
                    <span>Change Password</span>
                    <i class="fa fa-fw fa-wrench opacity-25"></i>
                  </a> 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ route('logout') }}">
                    <span>LogOut</span>
                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>  
          </div> 
        </div>
        <!-- END Header Content -->

       

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="far fa-sun fa-spin text-white"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>