@extends('core::page.settings')
@section('inner-title', 'Assets - ')
@section('mAssets', 'opened')

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection

@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
@endsection

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off', 'files' => true]) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border"><b>Assets</b></h5>

						<fieldset class="form-group {{ $errors->first('ASSET_FAVICON', 'form-group-error') }}">
							<label for="ASSET_FAVICON" class="form-label">
								Favicon
								<span class="color-red">*</span>
							</label>
							<div class="fileinput fileinput-new m-b-0" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="height: 50px;">
									<img src="{{ viewImg(env('EP_ASSET_FAVICON')) }}" alt="Favicon">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail"></div>
								<div>
									<span class="btn btn-default btn-file">
										<span class="fileinput-new">Pilih Foto</span>
										<span class="fileinput-exists">Change</span>
										{!! Form::file('ASSET_FAVICON', ['class' => 'form-control', 'accept' => 'image/*']) !!}
									</span>
									<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
								{!! $errors->first('ASSET_FAVICON', '<span class="text-muted"><small>:message</small></span>') !!}
							</div>
						</fieldset>

						<fieldset class="form-group {{ $errors->first('ASSET_LOGO', 'form-group-error') }}">
							<label for="ASSET_LOGO" class="form-label">
								Logo Website
								<span class="color-red">*</span>
							</label>
							<div class="fileinput fileinput-new m-b-0" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="height: 100px;">
									<img src="{{ viewImg(env('EP_ASSET_LOGO')) }}" alt="Logo">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail"></div>
								<div>
									<span class="btn btn-default btn-file">
										<span class="fileinput-new">Pilih Foto</span>
										<span class="fileinput-exists">Change</span>
										{!! Form::file('ASSET_LOGO', ['class' => 'form-control', 'accept' => 'image/*']) !!}
									</span>
									<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
								{!! $errors->first('ASSET_LOGO', '<span class="text-muted"><small>:message</small></span>') !!}
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