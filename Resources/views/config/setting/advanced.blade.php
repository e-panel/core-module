@extends('core::page.settings')
@section('inner-title', 'Advance - ')
@section('mAdvance', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">Advance <b>Setting</b></h5>
						<fieldset class="form-group {{ $errors->first('HEAD_CODE', 'form-group-error') }}">
							<label class="form-label">Head <b>Code</b></label>
							<div class="form-control-wrapper">
								{!! Form::textarea('HEAD_CODE', rawurldecode(env('EP_HEAD_CODE')), ['class' => 'form-control', 'rows' => 7]) !!}
								{!! $errors->first('HEAD_CODE', '<div class="form-tooltip-error sm">:message</div>') !!}
							</div>
							<p class="text-muted">
								<small>
									You may want to add some <code>html/css/js</code> code to head. For example custom css. Google verification code or other meta tags etc.
								</small>
							</p>
						</fieldset>
						<fieldset class="form-group {{ $errors->first('FOOTER_CODE', 'form-group-error') }}">
							<label class="form-label">Footer <b>Code</b></label>
							<div class="form-control-wrapper">
								{!! Form::textarea('FOOTER_CODE', rawurldecode(env('EP_FOOTER_CODE')), ['class' => 'form-control', 'rows' => 7]) !!}
								{!! $errors->first('FOOTER_CODE', '<div class="form-tooltip-error sm">:message</div>') !!}
							</div>
							<p class="text-muted">
								<small>
									You may want to add some <code>html/css/js</code> code to footer. For Example Google Analytics code etc.
								</small>
							</p>
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