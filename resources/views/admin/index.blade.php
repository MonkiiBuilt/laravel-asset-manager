<?php
/**
 * @author Jonathon Wallen
 * @date 6/6/17
 * @time 1:39 PM
 * @copyright 2008 - present, Monkii Digital Agency (http://monkii.com.au)
 */
?>

@extends('vendor.laravel-administrator.layout')

@section('title', 'Assets')

@push('styles')
    <link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/elfinder.full.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/theme.css') ?>">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
@endpush

@section('content')
    <div id="elfinder"></div>
@endsection

@push('scripts')
    <script src="<?= asset($dir . '/js/elfinder.min.js') ?>"></script>

    <script type="text/javascript" charset="utf-8">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $(document).ready(function() {
            $('#elfinder').elfinder({
                // set your elFinder options here
                customData: {
                    _token: '<?= csrf_token() ?>'
                },
                url : '<?= route("elfinder.connector") ?>',  // connector URL
                useBrowserHistory: false // remove URL hash
            });
        });
    </script>
@endpush
