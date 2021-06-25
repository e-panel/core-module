@extends('core::page.settings')
@section('inner-title', 'Maintenance Mode - ')
@section('mMaintenance', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">Maintenance <b>Mode</b></h5>

						<div class="checkbox-toggle -large">
                            <input type="checkbox" id="MAINTENANCE" name="MAINTENANCE" {{ env('EP_MAINTENANCE') == 1 ? 'checked' : '' }}>
                            <label for="MAINTENANCE">Aktif</label>
                        </div>
                        <p>Dengan mengaktifkan maintenance, artinya website untuk sementara tidak dapat diakses publik dan akan dialikan ke mode perawatan.</p>

						<fieldset class="form-group">
                            {!! Form::label('MAINTENANCE_NOTE', 'Note', ['class' => 'form-label']) !!}
                            {!! Form::textarea('MAINTENANCE_NOTE', env('EP_MAINTENANCE_NOTE'), ['class' => 'form-control', 'rows' => 3]) !!}
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