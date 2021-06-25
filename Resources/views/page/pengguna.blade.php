@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Pengguna
@endsection

@section('tPengguna', 'active')

@section('css')
    @include('core::layouts.partials.datatables')
@endsection

@section('sidebar-class', 'with-side-menu')
@section('sidebar')
    <div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
		<section>
			<header class="side-menu-title">Pengguna Menu</header>
			<ul class="side-menu-list">

				@if(empty($admin->role) || (!empty($permissions) && in_array('Pengguna', $permissions)))
					
					<li class="blue @yield('mRoles')">
						<a href="{{ route('epanel.roles.index') }}">
							<span class="font-icon font-icon-lock"></span>
							<span class="lbl">Roles</span>
						</a>
					</li>

					@if(config('pengguna.plugin.sso'))
						<li class="blue @yield('mSSO')">
							<a href="{{ route('epanel.sso.index') }}">
								<span class="font-icon font-icon-users"></span>
								<span class="lbl">SSO User</span>
							</a>
						</li>
					@else
						<li class="blue @yield('mOperator')">
							<a href="{{ route('epanel.operator.index') }}">
								<span class="font-icon font-icon-users"></span>
								<span class="lbl">Operator</span>
							</a>
						</li>
					@endif
				@endif
			</ul>
		</section>
	</nav>
@endsection

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-users',
        'judul' => 'Pengguna Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@endsection