@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش برند</h6>
                    <form method="POST" action="{{route('brands.update',$brand->id)}}" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        <div>
                            <figure class="avatar avatar">
                                <img src="{{url('images/admin/brands/big/'.$brand->image)}}" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">عنوان برند</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$brand->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input  class="col-sm-10" type="file" class="form-control-file" id="file" name="image">
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