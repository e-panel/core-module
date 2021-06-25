@extends('core::page.settings')
@section('inner-title', 'Ubah Password - ')
@section('mPassword', 'opened')

@section('js')
	<script src="https://cdn.enterwind.com/template/epanel/js/lib/hide-show-password/bootstrap-show-password.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#old_password').password();
			$('#new_password').password();
			$('#new_password_confirmation').password();
		});
	</script>
@endsection

@section('content')
	
	<section class="box-typical">

		@include('core::layouts.components.top', [
	        'judul' => 'Ubah Password',
	        'subjudul' => 'Silahkan lakukan perubahan password Anda apabila dirasa perlu.',
	    ])

		{!! Form::open(['autocomplete' => 'off']) !!}

			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-6">
		
						<fieldset class="form-group {{ $errors->first('old_password', 'form-group-error') }}">
							{!! Form::label('old_password', 'Password Lama', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::password('old_password', ['class' => 'form-control']) !!}
								{!! $errors->first('old_password', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group {{ $errors->first('new_password', 'form-group-error') }}">
							{!! Form::label('new_password', 'Password Baru', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::password('new_password', ['class' => 'form-control']) !!}
								{!! $errors->first('new_password', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group {{ $errors->first('new_password_confirmation', 'form-group-error') }}">
							{!! Form::label('new_password_confirmation', 'Ulangi Password Baru', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
								{!! $errors->first('new_password_confirmation', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group">
							{!! Form::submit('Simpan', ['class' => 'btn']) !!}
						</fieldset>

					</div>
				</div>
			</div>

		{!! Form::close() !!}

	</section>
@endsection