@extends('core::page.settings')
@section('inner-title', 'Meta Tag - ')
@section('mMeta Tag', 'opened')

@section('content')
	<section class="box-typical">
		{!! Form::open(['autocomplete' => 'off']) !!}
			<div class="box-typical-body padding-panel">
				<div class="row">
					<div class="col-sm-8">
						<h5 class="with-border">Meta <b>Tag</b></h5>

						<fieldset class="form-group">
							{!! Form::label('META_KEYWORD', 'Meta Keyword', ['class' => 'form-label']) !!}
							{!! Form::textarea('META_KEYWORD', env('EP_META_KEYWORD'), ['class' => 'form-control', 'rows' => 3]) !!}
						</fieldset>

                    	<fieldset class="form-group">
							{!! Form::label('META_DESC', 'Meta Description', ['class' => 'form-label']) !!}
							{!! Form::textarea('META_DESC', env('EP_META_DESC'), ['class' => 'form-control', 'rows' => 3]) !!}
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