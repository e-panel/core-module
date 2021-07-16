@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Settings
@stop

@section('tSettings') active @stop

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
			
			@if(!config('pengguna.plugin.sso'))
				<header class="side-menu-title">Profile</header>
				<ul class="side-menu-list">
					<li class="blue @yield('mPassword')">
						<a href="{{ route('epanel.settings.password') }}">
							<span class="font-icon font-icon-lock"></span>
							<span class="lbl">Ubah Password</span>
						</a>
					</li>
					<li class="blue @yield('mProfile')">
						<a href="{{ route('epanel.settings.profile') }}">
							<span class="font-icon font-icon-user"></span>
							<span class="lbl">Update Profile</span>
						</a>
					</li>
				</ul>
			@endif

			<header class="side-menu-title">Configuration</header>
			<ul class="side-menu-list">
				<li class="blue @yield('mGeneral')">
					<a href="{{ route('epanel.settings.setting') }}?type=general">
						<span class="font-icon font-icon-archive"></span>
						<span class="lbl">General</span>
					</a>
				</li>
				<li class="blue @yield('mAssets')">
					<a href="{{ route('epanel.settings.setting') }}?type=assets">
						<span class="font-icon font-icon-picture-double"></span>
						<span class="lbl">Assets</span>
					</a>
				</li>
				<li class="blue @yield('mTemplate')">
					<a href="{{ route('epanel.settings.setting') }}?type=template">
						<span class="font-icon font-icon-widget"></span>
						<span class="lbl">Template</span>
					</a>
				</li>
				<li class="blue @yield('mSocial Media')">
					<a href="{{ route('epanel.settings.setting') }}?type=social-media">
						<span class="font-icon font-icon-award"></span>
						<span class="lbl">Social Media</span>
					</a>
				</li>
				<li class="blue @yield('mAPI Connection')">
					<a href="{{ route('epanel.settings.setting') }}?type=api-connection">
						<span class="font-icon font-icon-snippet"></span>
						<span class="lbl">API Connection</span>
					</a>
				</li>
				<li class="blue @yield('mAdvance')">
					<a href="{{ route('epanel.settings.setting') }}?type=advanced">
						<span class="font-icon font-icon-fire"></span>
						<span class="lbl">Advanced</span>
					</a>
				</li>

				<li class="blue @yield('mMeta Tag')">
					<a href="{{ route('epanel.settings.setting') }}?type=meta-tag">
						<span class="font-icon font-icon-contacts"></span>
						<span class="lbl">Meta Tag</span>
					</a>
				</li>
				<li class="blue @yield('mMaintenance')">
					<a href="{{ route('epanel.settings.setting') }}?type=maintenance">
						<span class="font-icon font-icon-lamp"></span>
						<span class="lbl">Maintenance</span>
					</a>
				</li>
			</ul>

			<br/>
			<ul class="side-menu-list">
				<li class="blue @yield('mUpdate')">
					<a href="{{ route('epanel.settings.check-update') }}">
						<span class="font-icon font-icon-refresh"></span>
						<span class="lbl">Check Update</span>
					</a>
				</li>
			</ul>
		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-cogwheel',
        'judul' => 'Setting Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop