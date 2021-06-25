@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Plugin
@stop

@section('tPlugin') active @stop

@section('css')
    @include('core::layouts.partials.datatables')
@stop

@section('sidebar-class') with-side-menu @stop
@section('sidebar')
    <div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
		<section>

			@if(empty($admin->role) || (!empty($permissions) && in_array('Pegawai', $permissions)))
				<header class="side-menu-title">Kepegawaian</header>
				<ul class="side-menu-list">
					@if(config('ppid.enable.satker'))
						<li class="blue @yield('mSatuanKerja')">
							<a href="{{ route('epanel.satker.index') }}">
								<span class="font-icon font-icon-build"></span>
								<span class="lbl">Satuan Kerja</span>
							</a>
						</li>
					@endif
					@if(config('ppid.enable.pegawai'))
						<li class="blue @yield('mPegawai')">
							<a href="{{ route('epanel.pegawai.index') }}">
								<span class="font-icon font-icon-users-group"></span>
								<span class="lbl">Pegawai</span>
							</a>
						</li>
					@endif
					@if(config('ppid.enable.pimpinan'))
						<li class="blue @yield('mPimpinan')">
							<a href="{{ route('epanel.pimpinan.index') }}">
								<span class="font-icon font-icon-user"></span>
								<span class="lbl">Pimpinan</span>
							</a>
						</li>
					@endif
				</ul>
			@endif

			@if(empty($admin->role) || (!empty($permissions) && in_array('PPID', $permissions)))
				<header class="side-menu-title">PPID Pembantu</header>
				<ul class="side-menu-list">
					@if(config('ppid.enable.unduhan'))
						<li class="blue @yield('mUnduhan')">
							<a href="{{ route('epanel.unduhan.index') }}">
								<span class="font-icon font-icon-download"></span>
								<span class="lbl">Unduhan</span>
							</a>
						</li>
					@endif
					@if(config('ppid.enable.pengadaan'))
						<li class="blue @yield('mPengadaan')">
							<a href="{{ route('epanel.pengadaan.index') }}">
								<span class="font-icon font-icon-doc"></span>
								<span class="lbl">Info. Pengadaan</span>
							</a>
						</li>
					@endif
					@if(config('ppid.enable.sop'))
						<li class="blue @yield('mSOP')">
							<a href="{{ route('epanel.sop.index') }}">
								<span class="font-icon font-icon-snippet"></span>
								<span class="lbl">SOP Kegiatan</span>
							</a>
						</li>
					@endif
					@if(config('ppid.enable.layanan'))
						<li class="blue @yield('mLayanan')">
							<a href="{{ route('epanel.layanan.index') }}">
								<span class="font-icon font-icon-question"></span>
								<span class="lbl">Produk & Layanan</span>
							</a>
						</li>
					@endif
				</ul>
			@endif

			@if(Module::has('JDIH'))
				<header class="side-menu-title">JDIH</header>
				<ul class="side-menu-list">
					<li class="blue @yield('mJDKategori')">
						<a href="{{ route('epanel.jdih.kategori.index') }}">
							<span class="font-icon font-icon-folder"></span>
							<span class="lbl">Kategori</span>
						</a>
					</li>
					<li class="blue @yield('mJDTahun')">
						<a href="{{ route('epanel.jdih.tahun.index') }}">
							<span class="font-icon font-icon-calend"></span>
							<span class="lbl">Tahun</span>
						</a>
					</li>
					<li class="blue @yield('mJDStatus')">
						<a href="{{ route('epanel.jdih.status.index') }}">
							<span class="font-icon font-icon-revers"></span>
							<span class="lbl">Status</span>
						</a>
					</li>
					<li class="blue @yield('mJDPeraturan')">
						<a href="{{ route('epanel.jdih.peraturan.index') }}">
							<span class="font-icon font-icon-doc"></span>
							<span class="lbl">Peraturan</span>
						</a>
					</li>
				</ul>
			@endif

			@if(Module::has('JDIH'))
				<header class="side-menu-title">JDIH</header>
				<ul class="side-menu-list">
					<li class="blue @yield('mJDKategori')">
						<a href="{{ route('epanel.jdih.kategori.index') }}">
							<span class="font-icon font-icon-folder"></span>
							<span class="lbl">Kategori</span>
						</a>
					</li>
					<li class="blue @yield('mJDTahun')">
						<a href="{{ route('epanel.jdih.tahun.index') }}">
							<span class="font-icon font-icon-calend"></span>
							<span class="lbl">Tahun</span>
						</a>
					</li>
					<li class="blue @yield('mJDStatus')">
						<a href="{{ route('epanel.jdih.status.index') }}">
							<span class="font-icon font-icon-revers"></span>
							<span class="lbl">Status</span>
						</a>
					</li>
					<li class="blue @yield('mJDPeraturan')">
						<a href="{{ route('epanel.jdih.peraturan.index') }}">
							<span class="font-icon font-icon-doc"></span>
							<span class="lbl">Peraturan</span>
						</a>
					</li>
				</ul>
			@endif

			@if(Module::has('Tourism'))
				<header class="side-menu-title">Tourism</header>
				<ul class="side-menu-list">
					<li class="blue @yield('mTrEvents')">
						<a href="{{ route('epanel.tourism.events.index') }}">
							<span class="font-icon font-icon-folder"></span>
							<span class="lbl">Events</span>
						</a>
					</li>
					<li class="blue @yield('mTrPlaces')">
						<a href="{{ route('epanel.tourism.categories.index') }}">
							<span class="font-icon font-icon-calend"></span>
							<span class="lbl">Places</span>
						</a>
					</li>
				</ul>
			@endif

		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-snippet',
        'judul' => 'Plugin Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop