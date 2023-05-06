<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه ساعت</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon.png')}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">

    <link rel="stylesheet" href="{{url('panel/vendors/bundle.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/dropzone/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('/css/kamadatepicker.min.css')}}">
    <link rel="stylesheet" href="{{ url('panel/vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{url('panel/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/custom.css')}}" type="text/css">
</head>

<body class="error-page" style="background-color: #E91E63;">

    <div class="m-2 card">
        <div class="card-body ">
            <div class="text-center row justify-content-md-center">

                <div dir="ltr" class="col-12">
                    <h3 class="text-center display-5 w-100 text-info font-weight-bold">با تشکر از خرید شما</h3>
                </div>
                <div dir="ltr" class="col-12">
                    <p class="text-center display-5 w-100 text-success font-weight-bold">کارشناسان ما جهت پشتیبانی در خدمت شما هستند</p>
                </div>
                <div dir="ltr" class="col-12">
                    <p class="text-center display-5 w-100 font-weight-bold"> شماره پیگیری خرید شما {{$code}} است </p>
                </div>
                <div class="col-lg-3 col-sm-6 m-t-b-20">
                    <a href="watchshop://dn.ss" id="callback-link">
                        <button type="button" class="btn btn-primary btn-pulse">
                            <i class="mr-2 ti-user"></i>برگشت
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>