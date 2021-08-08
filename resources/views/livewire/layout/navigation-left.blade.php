<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}"><span style="color: orangered;">E</span> RPPKS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}"><img class="rounded mx-auto d-block" style="width: 30px; margin-top: 10px;" src="{{asset('assets/images/logo-kuansing.png')}}" alt="logo"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{$isActive['menu']=='dashboard'?'active':''}}"><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown {{$isActive['menu']=='data-master'?'active':''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    @foreach($dataMasterMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>

            <li class="menu-header">Laporan</li>
            <li class="{{$isActive['menu']=='laporan'?'active':''}}"><a class="nav-link" href="{{ route('laporan') }}"><i class="fas fa-book"></i> <span>Laporan</span></a></li>
        </ul>
    </aside>
</div>