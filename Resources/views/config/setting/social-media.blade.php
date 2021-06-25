@extends('core::page.settings')
@section('inner-title', "Social Media - ")
@section('mSocial Media', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">Social <b>Media</b></h5>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('SOCIAL_FB', 'form-group-error') }}">
									{!! Form::label('SOCIAL_FB', 'Facebook', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('SOCIAL_FB', env('EP_SOCIAL_FB'), ['class' => 'form-control']) !!}
										<i class="fa fa-facebook-square"></i>
										{!! $errors->first('SOCIAL_FB', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('SOCIAL_IG', 'form-group-error') }}">
									{!! Form::label('SOCIAL_IG', 'Instagram', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('SOCIAL_IG', env('EP_SOCIAL_IG'), ['class' => 'form-control']) !!}
										<i class="fa fa-instagram"></i>
										{!! $errors->first('SOCIAL_IG', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('SOCIAL_TW', 'form-group-error') }}">
									{!! Form::label('SOCIAL_TW', 'Twitter', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('SOCIAL_TW', env('EP_SOCIAL_TW'), ['class' => 'form-control']) !!}
										<i class="fa fa-twitter"></i>
										{!! $errors->first('SOCIAL_TW', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('SOCIAL_YT', 'form-group-error') }}">
									{!! Form::label('SOCIAL_YT', 'Youtube', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('SOCIAL_YT', env('EP_SOCIAL_YT'), ['class' => 'form-control']) !!}
										<i class="fa fa-youtube-play"></i>
										{!! $errors->first('SOCIAL_YT', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
						</div>
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