@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش گروه ویژگی ها</h6>
                    <form method="POST" action="{{route('property_groups.update',$property_group->id)}}" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">عنوان گروه ویژگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$property_group->title}}">
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