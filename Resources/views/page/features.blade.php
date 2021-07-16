@extends('core::layouts.app')

@section('title')
    @yield('inner-title') Features
@stop

@section('tFeatures') active @stop

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
			<header class="side-menu-title">Features Menu</header>
			<ul class="side-menu-list">

				@if(empty($admin->role) || (!empty($permissions) && in_array('Penghargaan', $permissions)))
					<li class="blue @yield('mPenghargaan')">
						<a href="{{ route('epanel.penghargaan.index') }}">
							<span class="font-icon font-icon-award"></span>
							<span class="lbl">Penghargaan</span>
						</a>
					</li>
				@endif

				@if(empty($admin->role) || (!empty($permissions) && in_array('Slider', $permissions)))
					<li class="blue @yield('mSlider')">
						<a href="{{ route('epanel.slider.index') }}">
							<span class="font-icon font-icon-view-cascade"></span>
							<span class="lbl">Slider</span>
						</a>
					</li>
				@endif

				@if(empty($admin->role) || (!empty($permissions) && in_array('Tautan', $permissions)))
					<li class="blue @yield('mTautan')">
						<a href="{{ route('epanel.tautan.index') }}">
							<span class="font-icon font-icon-share"></span>
							<span class="lbl">Tautan</span>
						</a>
					</li>
				@endif

				@if(empty($admin->role) || (!empty($permissions) && in_array('Sensor', $permissions)))
					{{-- <li class="blue @yield('mSensor')">
						<a href="{{ route('epanel.sensor.index') }}">
							<span class="font-icon font-icon-lamp"></span>
							<span class="lbl">Sensor</span>
						</a>
					</li> --}}
				@endif
			</ul>
		</section>
	</nav>
@stop

@section('content')
	@include('core::layouts.components.kosong', [
        'icon' => 'font-icon font-icon-folder',
        'judul' => 'Features Section',
        'subjudul' => 'Please choose one menu from the sidebar.', 
    ])
@stop