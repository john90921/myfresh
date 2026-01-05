
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Fruit Kluang</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
            <li class="{{ request()->is('product') ? 'active' : '' }}"><a href="{{ route('product.index') }}" class="">Product</a></li>
         @auth
            <li class="{{ request()->is('purchase*') ? 'active' : '' }}"><a href="{{ route('purchase.processing') }}" class="">Purchase</a></li>

         @if(Auth::user()->role === 'admin')

<li class="{{ request()->is('admin/productList') ? 'active' : '' }}"><a href="{{ route('product.productListAdmin') }}" class="">Product Management</a></li>
            <li class="{{ request()->is('order*') ? 'active' : '' }}"><a href="{{ route('order.index') }}" class="">Order Management</a></li>
            @endif
            @endauth

        </ul>

        @guest
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        @else
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @endguest
    </div>
</nav>
