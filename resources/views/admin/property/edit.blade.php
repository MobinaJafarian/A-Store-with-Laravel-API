@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش ویژگی                    </h6>
                    <form method="POST" action="{{route('properties.update',$property->id)}}" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام ویژگی </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" dir="rtl" name="title" value="{{$property->title}}">
                            </div>
                        </div>
                        <div class="form-group row" data-select2-id="23">
                            <label class="col-sm-2 col-form-label">عنوان گروه ویژگی</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="property_group_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach($property_groups as $key => $value)
                                        @if($property->property_group_id == $key)
                                        <option selected="selected" value="{{$key}}">{{$value}}</option>
                                        @else
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
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