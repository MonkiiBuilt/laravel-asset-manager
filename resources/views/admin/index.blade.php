<?php
/**
 * @author Jonathon Wallen
 * @date 6/6/17
 * @time 1:39 PM
 * @copyright 2008 - present, Monkii Digital Agency (http://monkii.com.au)
 */
?>

@extends('laravel-administrator.layout')

@section('title', 'Assets')

@section('styles')
<link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/elfinder.full.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= asset($dir . '/css/theme.css') ?>">
@endsection

@section('content')
<div id="elfinder"></div>
@endsection

@section('scripts')
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
@endsection
