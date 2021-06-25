@extends('core::page.settings')
@section('inner-title', 'Template - ')
@section('mTemplate', 'opened')

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

						<section class="tabs-section">
							<div class="tabs-section-nav tabs-section-nav-inline">
								<ul class="nav" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab">
											Pimpinan
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab">
											Kontak Kami
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#tabs-4-tab-3" role="tab" data-toggle="tab">
											Struktur Organisasi
										</a>
									</li>
								</ul>
							</div>

							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active show" id="tabs-4-tab-1">
									<fieldset class="form-group">
										{!! Form::label('KEPALA_NAMA', 'Nama Pimpinan', ['class' => 'form-label']) !!}
										{!! Form::text('KEPALA_NAMA', env('EP_KEPALA_NAMA'), ['class' => 'form-control']) !!}
									</fieldset>

									<fieldset class="form-group {{ $errors->first('KEPALA_FOTO', 'form-group-error') }}">
										<label for="KEPALA_FOTO" class="form-label">
											Foto Pimpinan (Frontend)
											<span class="color-red">*</span>
										</label>
										<div class="fileinput fileinput-new m-b-0" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<img src="{{ viewImg(env('EP_KEPALA_FOTO')) }}" alt="Foto Pimpinan">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Pilih Foto</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('KEPALA_FOTO', ['class' => 'form-control', 'accept' => 'image/*']) !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											{!! $errors->first('KEPALA_FOTO', '<span class="text-muted"><small>:message</small></span>') !!}
										</div>
									</fieldset>

									<fieldset class="form-group m-b-0">
										{!! Form::label('KEPALA_SAMBUTAN', 'Sambutan Pimpinan', ['class' => 'form-label']) !!}
										{!! Form::textarea('KEPALA_SAMBUTAN', env('EP_KEPALA_SAMBUTAN'), ['class' => 'form-control', 'rows' => 3]) !!}
									</fieldset>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-2">
									@if(env('EP_MAPS') > 0)
										<fieldset class="form-group">
											<iframe src="{{ env('EP_MAPS') }}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
										</fieldset>
									@endif
									<fieldset class="form-group m-b-0">
										{!! Form::label('MAPS', 'Google Maps IFrame URL', ['class' => 'form-label']) !!}
										{!! Form::textarea('MAPS', env('EP_MAPS'), ['class' => 'form-control', 'rows' => 5]) !!}
									</fieldset>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="tabs-4-tab-3">
									<fieldset class="form-group {{ $errors->first('ASSET_STRUKTUR', 'form-group-error') }}">
										<label for="ASSET_STRUKTUR" class="form-label">
											Struktur Organisasi
											<span class="color-red">*</span>
										</label>
										<div class="fileinput fileinput-new m-b-0" data-provides="fileinput">
											<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
												<img src="{{ viewImg(env('EP_ASSET_STRUKTUR')) }}" alt="Struktur Organisasi">
											</div>
											<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
											<div>
												<span class="btn btn-default btn-file">
													<span class="fileinput-new">Pilih Foto</span>
													<span class="fileinput-exists">Change</span>
													{!! Form::file('ASSET_STRUKTUR', ['class' => 'form-control', 'accept' => 'image/*']) !!}
												</span>
												<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
											</div>
											{!! $errors->first('ASSET_STRUKTUR', '<span class="text-muted"><small>:message</small></span>') !!}
										</div>
									</fieldset>
								</div>
							</div>
						</section>

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