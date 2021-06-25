@extends('core::page.settings')
@section('inner-title', "API Connection - ")
@section('mAPI Connection', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">Google <b>Section</b></h5>
						<div class="row">
							<div class="col-md-4">
								<fieldset class="form-group">
									{!! Form::label('API_ANALYTICS', 'ID Google Analytics', ['class' => 'form-label']) !!}
									{!! Form::text('API_ANALYTICS', env('EP_API_ANALYTICS'), ['class' => 'form-control']) !!}
								</fieldset>
							</div>
							<div class="col-md-8">
								<fieldset class="form-group {{ $errors->first('API_ANALYTICS_MAIL', 'form-group-error') }}">
									{!! Form::label('API_ANALYTICS_MAIL', 'Mail Google Analytics', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper">
										{!! Form::text('API_ANALYTICS_MAIL', env('EP_API_ANALYTICS_MAIL'), ['class' => 'form-control']) !!}
										{!! $errors->first('API_ANALYTICS_MAIL', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
						</div>
						<fieldset class="form-group">
							{!! Form::label('API_YOUTUBE', 'Youtube API Key', ['class' => 'form-label']) !!}
							{!! Form::text('API_YOUTUBE', env('EP_API_YOUTUBE'), ['class' => 'form-control', 'disabled']) !!}
						</fieldset>

						<br/>
						<h5 class="with-border">Facebook <b>Section</b></h5>
						<fieldset class="form-group">
							{!! Form::label('API_FB', 'Facebook App ID', ['class' => 'form-label']) !!}
							{!! Form::text('API_FB', env('EP_API_FB'), ['class' => 'form-control', 'disabled']) !!}
						</fieldset>

						<br/>
						<fieldset class="form-group">
							{!! Form::hidden('type', request('type')) !!}
							{!! Form::submit('Simpan', ['class' => 'btn']) !!}
						</fieldset>

					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</section>
@endsection