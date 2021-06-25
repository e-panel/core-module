@extends('core::page.tools')
@section('inner-title')
    {{ __('core::tools.cache.title') }} &bullet; 
@stop

@section('mClearCache') opened @stop

@section('content')

    @include('core::layouts.components.top', [
        'judul' => __('core::tools.cache.title'),
        'subjudul' => __('core::tools.cache.subtitle'),
    ])

    <div class="card">
        <div class="card-block table-responsive">
            <table id="datatable" class="display table table-striped" cellspacing="0" width="100%">
                <body>
                    <tr>
                        <td>
                            {{ __('core::tools.cache.command.all.label') }}
                            <div class="font-11 color-blue-grey-lighter">
                                {{ __('core::tools.cache.command.all.desc') }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ request()->fullUrl() }}?clear=all" class="btn btn-block btn-danger">
                                {{ __('core::tools.cache.command.all.button') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('core::tools.cache.command.view.label') }}
                            <div class="font-11 color-blue-grey-lighter">
                                {{ __('core::tools.cache.command.view.desc') }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ request()->fullUrl() }}?clear=views" class="btn btn-block btn-warning">
                                {{ __('core::tools.cache.command.view.button') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('core::tools.cache.command.config.label') }}
                            <div class="font-11 color-blue-grey-lighter">
                                {{ __('core::tools.cache.command.config.desc') }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ request()->fullUrl() }}?clear=config" class="btn btn-block btn-success">
                                {{ __('core::tools.cache.command.config.button') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('core::tools.cache.command.route.label') }}
                            <div class="font-11 color-blue-grey-lighter">
                                {{ __('core::tools.cache.command.route.desc') }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ request()->fullUrl() }}?clear=route" class="btn btn-block btn-success">
                                {{ __('core::tools.cache.command.route.button') }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('core::tools.cache.command.log.label') }}
                            <div class="font-11 color-blue-grey-lighter">
                                {{ __('core::tools.cache.command.log.desc') }}
                            </div>
                        </td>
                        <td>
                            <a href="{{ request()->fullUrl() }}?clear=log" class="btn btn-block btn-success">
                                {{ __('core::tools.cache.command.log.button') }}
                            </a>
                        </td>
                    </tr>
                </body>
            </table>
        </div>
    </div>
@stop
