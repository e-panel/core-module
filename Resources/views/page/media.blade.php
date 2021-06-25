@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Media
@stop

@section('tMedia') active @stop

@section('css')
    @include('core::layouts.partials.datatables')
    @yield('inner-css')
@stop

@section('sidebar-class') with-side-menu @stop
@section('sidebar')
    <div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
		<section>
			<header class="side-menu-title">Media Menu</header>
			<ul class="side-menu-list">
				<li class="blue @yield('mAlbum')">
					<a href="{{ route('epanel.album.index') }}">
						<span class="font-icon font-icon-picture-double"></span>
						<span class="lbl">Galeri</span>
					</a>
				</li>
				<li class="blue @yield('mFileManager')">
					<a href="{{ route('epanel.explore.index') }}">
						<span class="font-icon font-icon-folder"></span>
						<span class="lbl">File Manager</span>
					</a>
				</li>
			</ul>
		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-picture-double',
        'judul' => 'Media Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop