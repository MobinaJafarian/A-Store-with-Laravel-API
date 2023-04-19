@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش رنگ</h6>
                    <form method="POST" action="{{route('colors.update',$color->id)}}" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام رنگ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="name" value="{{$color->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">کد رنگ</label>
                            <div class="col-sm-10 input-group sample-selector colorpicker-element">
                                <input type="text" value="{{$color->code}}" name="code" class="text-left form-control" dir="ltr">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i style="background-color: {{$color->code}};"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        $('.form-select').select2();
    </script>
@endsection