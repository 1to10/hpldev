<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IBEES | ADMIN') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
@yield('body')

<script src="{{ asset('/js/app.js') }}"></script>

<script src="{{ asset('/js/Chart.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
<script src="{{ asset('/js/ajax.js') }}"></script>


<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<!-- #endregion -->
<script>$(document).ready(function() {
        $('#example').DataTable();
    } );</script>
<script src="{{url('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{url('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script src="{{url('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    CKEDITOR.replace('my-editor', options);
    CKEDITOR.replace('my-editor-short', options);
    var domain = "{{url('/laravel-filemanager/')}}";
    //$('#lfm').filemanager('image',{prefix: domain});
    //$('#lfm2').filemanager('image',{prefix: domain});

    $('[class*="lfm"]').each(function() {
        $(this).filemanager('image', {prefix: domain});
    });

</script>
</body>
</html>