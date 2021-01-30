<div class="sidemenu-area">
  <div class="sidemenu-header">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
      <img src="{{asset('/img/cook-3.png')}}" width="100" alt="image" />
    </a>

    <div class="burger-menu d-none d-lg-block">
      <span class="top-bar"></span>
      <span class="middle-bar"></span>
      <span class="bottom-bar"></span>
    </div>

    <div class="responsive-burger-menu d-block d-lg-none">
      <span class="top-bar"></span>
      <span class="middle-bar"></span>
      <span class="bottom-bar"></span>
    </div>
  </div>

  <div class="sidemenu-body">
    <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
      <!--<li class="nav-item-title">
        Navigations
      </li>-->

      <li class="nav-item ">
        <a href="{{route('customer_dashboard')}}" class="nav-link">
          <span class="icon"><i class="bx bx-home-circle"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('menu-category') }}" class="nav-link" aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Menu Categories</span>
        </a>

      </li>
      <li class="nav-item">
        <a href="{{route('menu')}}" class="collapsed-nav-link nav-link"
          aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Menus</span>
        </a>

      </li>
      <li class="nav-item">
        <a href="{{route('menu_item')}}" class="collapsed-nav-link nav-link"
          aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Menu Items</span>
        </a>

      </li>
       <li class="nav-item">
        <a href="{{route('recipe')}}" class="collapsed-nav-link nav-link"
          aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Recipes</span>
        </a>

      </li>
      <li class="nav-item">
        <a href="{{route('recipeItem')}}" class="collapsed-nav-link nav-link"
          aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Recipe Items</span>
        </a>

      </li>
     
       <li class="nav-item">
        <a href="{{route('menu-cost')}}" class="collapsed-nav-link nav-link"
          aria-expanded="false">
          <span class="icon"><i class="bx bx-user-circle"></i></span>
          <span class="menu-title">Menu Costing</span>
        </a>

      </li>
     
      
     {{-- <li class="nav-item">
        <a href="#" class="collapsed-nav-link nav-link drop" aria-expanded="false">
          <span class="icon"><i class="bx bx-poll"></i></span>
          <span class="menu-title">Localization</span>
        </a>

        <ul class="sidemenu-nav-second-level">
          <li class="nav-item">
            <a href="{{route('country')}}" class="nav-link">
              <span class="icon"><i class="bx bx-list-ul"></i></span>
              <span class="menu-title">Country</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('state')}}" class="nav-link">
              <span class="icon"><i class="bx bx-list-ul"></i></span>
              <span class="menu-title">State</span>
            </a>
          </li>
        </ul>
      </li>--}}
     
     {{-- <li class="nav-item">
        <a href="#" class="collapsed-nav-link nav-link drop" aria-expanded="false">
          <span class="icon"><i class="bx bx-poll"></i></span>
          <span class="menu-title">Utility</span>
        </a>

        <ul class="sidemenu-nav-second-level">
          <li class="nav-item">
            <a href="{{route('item_class')}}" class="nav-link">
              <span class="icon"><i class="bx bx-list-ul"></i></span>
              <span class="menu-title">Item classes</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('brand')}}" class="nav-link">
              <span class="icon"><i class="bx bx-list-ul"></i></span>
              <span class="menu-title">Item Brands</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('measure_unit')}}" class="nav-link" aria-expanded="false">
              <span class="icon"><i class="bx bx-list-ul"></i></span>
              <span class="menu-title">Measure Units</span>
            </a>
    
          </li>
        </ul>

      </li>--}}
   
    </ul>
  </div>
</div>
<!-- End Sidemenu Area -->