<link rel="stylesheet" href="{{url()}}/css/bootstrap.css">
<link rel="stylesheet" href="{{url()}}/css/sb-admin.css">
<link rel="stylesheet" href="{{url()}}/css/style.css">
<link rel="stylesheet" href="{{url()}}/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url()}}/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<script src="{{url()}}/js/jquery-1.10.2.js"></script>
<script src="{{url()}}/js/bootstrap.js"></script>
<script src="{{url()}}/js/jquery-ui-1.10.4.custom.js"></script>
<script>
    var target = '{{$target or ''}}';

    $(document).ready(function(){
        $('.side-nav li a:contains(' + target + ')').parent().first().addClass('active open');

        @if (Session::has('message') === true)
            @if (is_object(Session::get('message')) === true)
                $('.breadcrumb').parent().append('<div class="alert alert-danger">@foreach (Session::get('message')->all() as $row){{$row}} <br/>@endforeach </div>')
            @else
                $('.breadcrumb').parent().append('<div class="alert alert-success">{{Session::get("message")}}</div>')
            @endif
        @endif
    })
</script>
