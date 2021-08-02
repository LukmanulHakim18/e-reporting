<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}"><span style="color: orangered;">SLN</span> Express</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}"><img class="rounded mx-auto d-block" style="width: 30px; margin-top: 10px;" src="{{asset('assets/images/Logo-normal.png')}}" alt="logo"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header {{$isActive['menu']=='dashboard'?'active':''}}">Dashboard</li>
            <li class="{{$isActive['menu']=='dashboard'?'active':''}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>

            <li class="nav-item dropdown {{$isActive['menu']=='data-master'?'active':''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    @foreach($dataMasterMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{$isActive['menu']=='order'?'active':''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-check-alt"></i> <span>Order</span></a>
                <ul class="dropdown-menu">
                    @foreach($orderMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{$isActive['menu']=='verification'?'active':''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-check"></i> <span>Verification</span></a>
                <ul class="dropdown-menu">
                    @foreach($verificationMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{$isActive['menu']=='finance'?'active':''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i> <span>Finance</span></a>
                <ul class="dropdown-menu">
                    @foreach($financeMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{$isActive['menu']=='tracking'?'active':''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i> <span>Tracking</span></a>
                <ul class="dropdown-menu">
                    @foreach($trackingMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown {{$isActive['menu']=='transaction'?'active':''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cash-register"></i> <span>Transaction</span></a>
                <ul class="dropdown-menu">
                    @foreach($transactionMenu as $key => $value)
                    <li class="{{$isActive['submenu']==$key? 'active' : '' }}"><a class="nav-link" href="{{ route($key) }}">{{$value}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </aside>
</div>