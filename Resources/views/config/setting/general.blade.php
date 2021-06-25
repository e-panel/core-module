@extends('core::page.settings')
@section('inner-title', 'General - ')
@section('mGeneral', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">General <b>Settings</b></h5>
						<fieldset class="form-group {{ $errors->first('INSTANSI', 'form-group-error') }}">
							{!! Form::label('INSTANSI', 'Instansi', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::text('INSTANSI', env('EP_INSTANSI'), ['class' => 'form-control']) !!}
								{!! $errors->first('INSTANSI', '<div class="form-tooltip-error sm">:message</div>') !!}
							</div>
						</fieldset>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('SINGKATAN', 'form-group-error') }}">
									{!! Form::label('SINGKATAN', 'Singkatan', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper">
										{!! Form::text('SINGKATAN', env('EP_SINGKATAN'), ['class' => 'form-control']) !!}
										{!! $errors->first('SINGKATAN', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('PEMERINTAH', 'form-group-error') }}">
									{!! Form::label('PEMERINTAH', 'Pemerintah', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper">
										{!! Form::text('PEMERINTAH', env('EP_PEMERINTAH'), ['class' => 'form-control']) !!}
										{!! $errors->first('PEMERINTAH', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('TELEPON', 'form-group-error') }}">
									{!! Form::label('TELEPON', 'Nomor Telepon', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('TELEPON', env('EP_TELEPON'), ['class' => 'form-control']) !!}
										<i class="font-icon font-icon-phone"></i>
										{!! $errors->first('TELEPON', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="form-group {{ $errors->first('EMAIL', 'form-group-error') }}">
									{!! Form::label('EMAIL', 'Email', ['class' => 'form-label']) !!}
									<div class="form-control-wrapper form-control-icon-left">
										{!! Form::text('EMAIL', env('EP_EMAIL'), ['class' => 'form-control']) !!}
										<i class="font-icon font-icon-mail"></i>
										{!! $errors->first('EMAIL', '<div class="form-tooltip-error sm">:message</div>') !!}
									</div>
								</fieldset>
							</div>
						</div>

						<fieldset class="form-group {{ $errors->first('ALAMAT', 'form-group-error') }}">
							{!! Form::label('ALAMAT', 'Alamat', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::textarea('ALAMAT', env('EP_ALAMAT'), ['class' => 'form-control', 'rows' => 3]) !!}
								{!! $errors->first('ALAMAT', '<div class="form-tooltip-error sm">:message</div>') !!}
							</div>
						</fieldset>

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