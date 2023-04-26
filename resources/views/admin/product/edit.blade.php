@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش محصول</h6>
                    <div class="row d-flex justify-content-center">
                        <figure class="col-offset-3 col-6">
                            <img src="{{url('images/admin/products/small/'.$product->image)}}" alt="image">
                        </figure>
                    </div>
                    <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام فارسی محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->title}}" class="form-control text-left" dir="rtl" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام انگلیسی محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->title_en}}" class="form-control text-left" dir="rtl" name="title_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">قیمت محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->price}}" class="form-control text-left" dir="rtl" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">تعداد محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->count}}" class="form-control text-left" dir="rtl" name="count">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام گارانتی محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->guaranty}}" class="form-control text-left" dir="rtl" name="guaranty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">تخفیف محصول</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$product->discount}}" class="form-control text-left" dir="rtl" name="discount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">توضیحات محصول</label>
                            <div class="col-sm-10">
                                <textarea id="description" class="form-control" name="description" rows="10" cols="30">
                                    {{$product->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" @if($product->is_special) checked @endif class="custom-control-input" id="customCheck" name="is_special">
                                    <label class="custom-control-label" for="customCheck"> فروش شگفت انگیز </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-form-label"> تاریخ انقضای شگفت انگیز</label>
                            </div>
                            <div class="col-sm-6">
                                <input value="{{\Hekmatinasser\Verta\Verta::instance($product->special_expiration)}}" type="text" id="special_expiration" class="text-left form-control" dir="rtl"
                                       name="special_expiration">
                            </div>
                        </div>
                        <div class="form-group row" data-select2-id="23">
                            <label class="col-sm-2 col-form-label">دسته بندی</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach($categories as $key => $value)
                                        @if($product->category_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @endif
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" data-select2-id="23">
                            <label class="col-sm-2 col-form-label">برند</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="brand_id" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    @foreach($brands as $key => $value)
                                        @if($product->brand_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @endif
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" data-select2-id="23">
                            <label class="col-sm-2 col-form-label">انتخاب رنگ</label>
                            <div class="col-sm-10">
                                <select class="form-select" multiple="" name="colors[]"
                                        style="width: 100%;text-align: right" style="width: 100%;" data-select2-id="3"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($colors as $key => $value)
                                        @if(in_array($key,$product->colors()->pluck('id')->toArray()))
                                        <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                         <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input  class="col-sm-10" type="file" class="form-control-file" id="file" name="file">
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
        var customOptions = {
            placeholder: "روز / ماه / سال"
            , twodigit: false
            , closeAfterSelect: true
            , nextButtonIcon: "fa fa-arrow-circle-right"
            , previousButtonIcon: "fa fa-arrow-circle-left"
            , buttonsColor: "#5867dd"
            , markToday: true
            , markHolidays: true
            , highlightSelectedDay: true
            , sync: true
            , gotoToday: true
        }
        kamaDatepicker('special_expiration', customOptions);
        if($('#description').length) {
            CKEDITOR.replace('description');
        }
    </script>
@endsection