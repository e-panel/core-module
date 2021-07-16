@php \Carbon\Carbon::setLocale('id'); @endphp
@extends('core::layouts.app')
@section('title', 'Dashboard')
@section('tDashboard', 'active')

@section('css')
    @include('core::layouts.partials.analytics.css')
    <link rel="stylesheet" href="https://cdn.enterwind.com/template/epanel/css/separate/pages/widgets.min.css">
@endsection

@section('js')
    @include('core::layouts.partials.analytics.js')
@endsection

@section('content')
    <div class="container-fluid">
    
        @if($plugins['success'] === false)
            @include('core::layouts.components.invalid')
        @endif

        <section class="card card-default m-b-lg">
            <header class="card-header">
                <h4 class="m-b-0"><b>Welcome to E-Panel!</b></h4>
                <p class="m-b-0 text-muted">We've assembled some links to get you started.</p>
            </header>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3 col-xs-6">
                                <section class="widget widget-simple-sm">
                                    <div class="widget-simple-sm-icon">
                                        <i class="font-icon font-icon-post color-green"></i>
                                    </div>
                                    <div class="widget-simple-sm-bottom">{{ Modules\Berita\Entities\Berita::count() }} Berita</div>
                                </section>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <section class="widget widget-simple-sm">
                                    <div class="widget-simple-sm-icon">
                                        <i class="font-icon font-icon-calend color-green"></i>
                                    </div>
                                    <div class="widget-simple-sm-bottom">{{ Modules\Agenda\Entities\Agenda::count() }} Agenda</div>
                                </section>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <section class="widget widget-simple-sm">
                                    <div class="widget-simple-sm-icon">
                                        <i class="font-icon font-icon-bookmark color-green"></i>
                                    </div>
                                    <div class="widget-simple-sm-bottom">{{ Modules\Pengumuman\Entities\Pengumuman::count() }} Pengumuman</div>
                                </section>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <section class="widget widget-simple-sm">
                                    <div class="widget-simple-sm-icon">
                                        <i class="font-icon font-icon-comments color-green"></i>
                                    </div>
                                    <div class="widget-simple-sm-bottom">{{ Modules\Inbox\Entities\Feedback::count() }} Feedback</div>
                                </section>
                            </div>
                        </div>

                        {!! Form::open(['autocomplete' => 'off', 'class' => 'widget widget-activity', 'route' => 'epanel.settings.setting']) !!}
                            <header class="widget-header">
                                SEKILAS INFO
                                <div class="pull-right">
                                    <div class="checkbox-toggle m-b-0">
                                        <input type="checkbox" id="HEADLINE" name="HEADLINE" {{ env('EP_HEADLINE') == 1 ? 'checked' : '' }}>
                                        <label for="HEADLINE">Aktif</label>
                                    </div>
                                </div>
                            </header>
                            <div class="card-block">
                                <fieldset class="form-group {{ $errors->first('HEADLINE_TEXT', 'form-group-error') }}">
                                    {!! Form::label('HEADLINE_TEXT', 'Uraian', ['class' => 'form-label']) !!}
                                    <div class="form-control-wrapper">
                                        {!! Form::textarea('HEADLINE_TEXT', env('EP_HEADLINE_TEXT'), ['class' => 'form-control', 'rows' => 2]) !!}
                                        {!! $errors->first('HEADLINE_TEXT', '<div class="form-tooltip-error sm">:message</div>') !!}
                                    </div>
                                </fieldset>
                                <fieldset class="form-group m-b-0">
                                    {!! Form::hidden('type', 'sekilas-info') !!}
                                    {!! Form::submit('Simpan', ['class' => 'btn']) !!}
                                </fieldset>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-muted" style="margin: 10px;"><b>WEBSITE OVERVIEW</b></h5>
                        <table class="table table-xs table-bordered">
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">Pengguna</label>
                                    {{ auth()->user()->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">E-Mail</label>
                                    {{ auth()->user()->username }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">Last Login</label>
                                    {{ auth()->user()->last_login }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">URL</label>
                                    <a href="{{ \URL::to('/') }}">
                                        {{ \URL::to('/') }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">IP</label>
                                    {{ request()->ip() }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">Serial Key</label>
                                    <b>{{ env('EP_KEY') }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="form-label m-l-0 m-b-0">Status</label>
                                    @if($plugins['success'] === false)
                                        <strong class="text-danger"><i class="fa fa-times"></i> Invalid Key</strong>
                                    @else
                                        <strong class="text-success"><i class="fa fa-check"></i> Activated</strong>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <section class="widget widget-activity m-b-0">
                    <header class="widget-header">
                        Latest Posts (Top 5)
                    </header>
                    <div>
                        @foreach(Modules\Berita\Entities\Berita::whereStatus(1)->latest()->paginate(5) as $i => $temp)
                            <div class="widget-activity-item">
                                <div class="user-card-row">
                                    <div class="tbl-row">
                                        <div class="tbl-cell tbl-cell-photo">
                                            <a href="#">
                                                <img src="{{ \Avatar::create(optional($temp->operator)->nama)->toBase64() }}" alt="">
                                            </a>
                                        </div>
                                        <div class="tbl-cell">
                                            <p>
                                                <a href="#" class="semibold">{{ optional($temp->operator)->nama }}</a>
                                                added a new post
                                                <a href="#">{!! $temp->judul !!}</a>
                                            </p>
                                            <p class="small">
                                                <i class="fa fa-eye"></i> {{ $temp->view }} Kali &nbsp;
                                                <i class="fa fa-calendar"></i> {{ $temp->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection