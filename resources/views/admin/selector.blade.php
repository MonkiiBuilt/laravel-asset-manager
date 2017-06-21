<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= asset($dir.'/css/elfinder.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset($dir.'/css/theme.css') ?>">

    <link href="{{ asset('vendor/style/css/main.5.css', env('FORCE_HTTPS', false)) }}" rel="stylesheet" type="text/css">

    <script src="<?= asset($dir.'/js/elfinder.min.js') ?>"></script>

    <script type="text/javascript" charset="utf-8">
        var caller = "<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>";

        var FileBrowserDialogue = {
            init: function()
            {
                // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (URL)
            {
                if (caller != "")
                {
                    //%26amp%3B -> &amp; -> &
                    var decURL = $('<textarea />').html(decodeURIComponent(URL)).text();

                    //We just want the path minus the host
                    var parser = document.createElement('a');
                    parser.href = decURL;
                    decURL = parser.pathname;
                    if (decURL.charAt(0) != "/") decURL = "/" + decURL; // for IE. :-\

                    decURL = decURL.replace('files', 'img');

                    //selected image
                    window.parent.assetSelected(caller, decURL);

                    // close popup window
                    window.parent.assetClose();
                }
                else
                {
                    //If no caller ID then we are on the Assets page and selection is disabled.
                }
            }
        };

        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $().ready(function() {
            $('#elfinder').elfinder({
                customData: {
                    _token: '<?= csrf_token() ?>'
                },
                url : '<?= route("elfinder.connector") ?>',  // connector URL
                width : "100%",
                height : "785px",
                getFileCallback: function(file) { // editor callback
                    FileBrowserDialogue.mySubmit(file.url);
                }
            });
        });
    </script>
</head>
<body class="modal-body">

@if(isset($_GET['title']))
    <h3>{{ $_GET['title'] }}</h3>
@endif

<div id="elfinder"></div>

</body>
</html>