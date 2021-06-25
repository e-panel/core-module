@extends('core::page.media')
@section('inner-title', 'File Manager - ')
@section('mFileManager', 'opened')

@section('inner-css')
    <style>
        iframe.fullscreen {
            width: 100%!important;
            height: 80vh!important;
        }
    </style>
@endsection

@section('content')
    <iframe src="{{ route('epanel.explore.index') }}/embed" frameborder="0" class="fullscreen"></iframe>
@endsection