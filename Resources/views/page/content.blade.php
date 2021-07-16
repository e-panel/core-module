@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Content
@stop

@section('tContent') active @stop

@section('css')
    @include('core::layouts.partials.datatables')
@stop

@section('sidebar-class') with-side-menu @stop
@section('sidebar')
    <div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
		<section>
			<ul class="side-menu-list xs-only">
				<li class="blue">
					<a href="{{ route('epanel.index') }}">
						<span class="font-icon font-icon-arrow-left"></span>
						<span class="lbl">Kembali</span>
					</a>
				</li>
			</ul>
			<header class="side-menu-title">Content Menu</header>
			<ul class="side-menu-list">

				@if(empty($admin->role) || (!empty($permissions) && in_array('Agenda', $permissions)))
					<li class="blue @yield('mAgenda')">
						<a href="{{ route('epanel.agenda.index') }}">
							<span class="font-icon font-icon-event"></span>
							<span class="lbl">Agenda</span>
						</a>
					</li>
				@endif

				@if(empty($admin->role) || (!empty($permissions) && in_array('Berita', $permissions)))
					<li class="blue @yield('mKategori')">
						<a href="{{ route('epanel.kategori.index') }}">
							<span class="font-icon font-icon-widget"></span>
							<span class="lbl">Kategori</span>
						</a>
					</li>
				@endif
				
				@if(empty($admin->role) || (!empty($permissions) && in_array('Laman', $permissions)))
					<li class="blue @yield('mLaman')">
						<a href="{{ route('epanel.laman.index') }}">
							<span class="font-icon font-icon-page"></span>
							<span class="lbl">Laman</span>
						</a>
					</li>
				@endif
				
				@if(empty($admin->role) || (!empty($permissions) && in_array('Pengumuman', $permissions)))
					<li class="blue @yield('mPengumuman')">
						<a href="{{ route('epanel.pengumuman.index') }}">
							<span class="font-icon font-icon-list-square"></span>
							<span class="lbl">Pengumuman</span>
						</a>
					</li>
				@endif
				
			</ul>

			@if(empty($admin->role) || (!empty($permissions) && in_array('Berita', $permissions)))
				<header class="side-menu-title">Manage Berita</header>
				<ul class="side-menu-list">
					<li class="blue @yield('mUncategorized')">
						<a href="{{ route('epanel.kategori.berita.index', 'uncategorized') }}" class="label-right">
							<span class="font-icon font-icon-check-circle"></span>
							<span class="lbl">Uncategorized</span>
							<span class="label label-custom label-pill label-danger">{{ Modules\Berita\Entities\Berita::whereIdKategori(null)->count() }}</span>
						</a>
					</li>
					@foreach(Modules\Berita\Entities\Kategori::get() as $temp)
						<li class="blue @yield('m'.$temp->slug)">
							<a href="{{ route('epanel.kategori.berita.index', $temp->slug) }}" class="label-right">
								<span class="font-icon font-icon-check-circle"></span>
								<span class="lbl">{{ $temp->label }}</span>
								<span class="label label-custom label-pill label-danger">{{ $temp->berita->count() }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			@endif

		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-post',
        'judul' => 'Content Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop