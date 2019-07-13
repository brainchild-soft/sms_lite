<div class="sidebar" id="sidebar"> <!-- sidebar -->
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                      <li class="menu-title">
                          {{ Auth::user()->name }}
                      </li>

                    	<li class="active">
                          <a href="{{ url('/home') }}">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                          </a>
                      </li>
			
                      <li>
                          <a href="{{ url('/CustomerGateway') }}">
                              <i class="fa fa-deafness" aria-hidden="true"></i> 
                              <span>Gateways </span>
                            </a>
                      </li>
                      
                      <li>
                          <a href="{{ url('/Users') }}">
                              <i class="fa fa-users" aria-hidden="true"></i>  
                              <span> Users </span>
                          </a>
                      </li>
 
                      <li>
                          <a href="{{ url('/ApiUser') }}">
                              <i class="fa fa-drivers-license-o" aria-hidden="true"></i> 
                              <span>Api User </span>
                          </a>
                      </li>

                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }} 
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>

                    </ul>
                </div>
            </div>
        </div>