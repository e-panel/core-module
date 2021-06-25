@extends('core::page.settings')
@section('inner-title', 'Update Profile - ')
@section('mProfile', 'opened')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
@endsection

@section('content')
	<section class="box-typical">

		@include('core::layouts.components.top', [
	        'judul' => 'Update Profile',
	        'subjudul' => 'Silahkan lakukan perubahan pada profile Anda melalui laman ini.',
	    ])

		{!! Form::model(auth()->user(), ['autocomplete' => 'off', 'files' => 'true']) !!}

			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-6">

						<fieldset class="form-group {{ $errors->first('nama', 'form-group-error') }}">
							{!! Form::label('nama', 'Nama', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::text('nama', null, ['class' => 'form-control']) !!}
								{!! $errors->first('nama', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group {{ $errors->first('username', 'form-group-error') }}">
							{!! Form::label('username', 'Username', ['class' => 'form-label']) !!}
							<div class="form-control-wrapper">
								{!! Form::text('username', null, ['class' => 'form-control']) !!}
								{!! $errors->first('username', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group">
							{!! Form::submit('Simpan', ['class' => 'btn']) !!}
						</fieldset>

					</div>
					<div class="col-sm-4">
						<fieldset class="form-group {{ $errors->first('avatar', 'form-group-error') }}">
			                <label for="avatar" class="form-label">{{ __('pengguna::form.operator.avatar.label') }}</label>
			                <div class="fileinput fileinput-new" data-provides="fileinput">
			                    <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
			                        @if(is_null(auth()->user()->avatar))
			                            <img data-src="holder.js/500x500/auto" alt="...">
			                        @else
			                            <img src="{{ viewImg(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
			                        @endif
			                    </div>
			                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"></div>
			                    <div>
			                        <span class="btn btn-default btn-file">
			                            <span class="fileinput-new">{{ __('pengguna::form.operator.avatar.select') }}</span>
			                            <span class="fileinput-exists">{{ __('pengguna::form.operator.avatar.change') }}</span>
			                            {!! Form::file('avatar', ['class' => 'form-control', 'accept' => 'image/*']) !!}
			                        </span>
			                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{ __('pengguna::form.operator.avatar.remove') }}</a>
			                    </div>
			                    {!! $errors->first('avatar', '<span class="text-muted"><small>:message</small></span>') !!}
			                </div>
			            </fieldset>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

	</section>
@endsection