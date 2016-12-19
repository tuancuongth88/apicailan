<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>

			<li><a href="{{ action('UserController@index') }}"><i class="fa fa-dashboard"></i> <span>Quản lý User</span></a></li>
			<li><a href="{{ action('ThongKeController@index') }}"><i class="fa fa-dashboard"></i> <span>Thống kê bảng cân</span></a></li>

		</ul>
	</section>
	<!-- /.sidebar -->
</aside>