<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('dashboard')}}">Five online</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ (request()->is('home*')) ? 'active' : '' }}">
            <a href="{{route('dashboard')}}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('dashboard')}}">Home</a></li>
            </ul>
        </li>
        <li class="dropdown {{ (request()->is('product*')) ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>PRODUCT</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('product.create')}}">Add</a></li>
                <li><a class="nav-link" href="{{route('product.index')}}">List</a></li>
            </ul>
        </li>
    </ul>
</aside>
