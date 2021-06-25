@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Tools
@stop

@section('tTools') active @stop

@section('css')
    @include('core::layouts.partials.datatables')
@stop

@section('sidebar-class') with-side-menu @stop
@section('sidebar')
    <div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
		<section>
			<header class="side-menu-title">Tools Menu</header>
			<ul class="side-menu-list">

				@if(empty($admin->role) || (!empty($permissions) && in_array('Backup', $permissions)))
					<li class="blue @yield('mBackup')">
						<a href="{{ route('epanel.backup.index') }}">
							<span class="font-icon font-icon-server"></span>
							<span class="lbl">Backup DB</span>
						</a>
					</li>
				@endif

				<li class="blue @yield('mClearCache')">
					<a href="{{ route('epanel.tools.clear-cache') }}">
						<span class="font-icon font-icon-refresh"></span>
						<span class="lbl">Clear Cache</span>
					</a>
				</li>

			</ul>
		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-dots',
        'judul' => 'Tools Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop