<header class="main-header">
	<a href="#" class="logo">
		<span class="logo-mini">ABC</span>
		<span class="logo-lg">ABC</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Menu</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="user">
					<a href="{{ action('UserController@edit', Auth::user()->get()->id) }}"><i class="fa fa-user"></i>TuanCuong</a>
				</li>
				<li class="user">
					<a href="{{ action('AdminController@logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a>
				</li>
			</ul>
		</div>
	</nav>
</header>