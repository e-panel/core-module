@extends('core::page.settings')
@section('inner-title', 'Check Update - ')
@section('mUpdate', 'opened')

@section('js')
@endsection

@section('content')
	<section class="box-typical">

		@include('core::layouts.components.top', [
	        'judul' => 'Check Update',
	        'subjudul' => 'Silahkan lakukan pembaruan fitur apabila tersedia.',
	    ])

	    @if($plugins['success'] === true)
			<table class="table table-hover table-sm">
				<thead>
					<tr>
						<th width="1">No</th>
						<th>Plugins</th>
						<th>Description</th>
						<th width="10%" class="text-center">Available</th>
						<th width="10%" class="text-center">Current</th>
						<th width="10%"></th>
					</tr>
				</thead>
				@foreach($plugins['plugins'] as $i => $plugin)
					<tr>
						<td align="center">{{ ++$i }}</td>
						<td><b>{{ $plugin['name'] }}</b></td>
						<td class="text-muted">{{ $plugin['preview'] }}</td>
						<td align="center">{{ $plugin['version'] }}</td>
						<td align="center">
							{{ config($plugin['slug'].'.version') }}
						</td>
						<td align="right">
							@if($plugin['version'] > config($plugin['slug'].'.version'))
								<a href="{{ route('epanel.settings.update') }}?plugin={{ $plugin['slug'] }}" class="text-success">
									<i class="fa fa-download"></i>
									Update Now
								</a>
							@else
								<strong class="text-success">
									<i class="fa fa-check"></i>
									Updated
								</strong>
							@endif
						</td>
					</tr>
				@endforeach
			</table>
	    @else
	    	@include('core::layouts.components.invalid')
	    @endif
	    <br/><br/>
	</section>
@endsection