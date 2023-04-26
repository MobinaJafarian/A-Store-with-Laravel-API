@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">اضافه کردن ویژگی محصول  </h6>
                    <form role="form" method="POST" action="{{route('store.product.properties',$product->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @foreach($property_groups as $property_group)
                            <div class="mt-2 row">
                                <div class="col-sm-4">
                                    <label for="title">{{$property_group->title}}:</label>
                                </div>
                                <div class="col-sm-8 padding-0-18">
                                    <select class="form-select" name="properties[]" style="width: 100%;" data-select2-id="{{$property_group->id}}" tabindex="-1" aria-hidden="true">
                                       @foreach($property_group->properties()->pluck('title','id') as $key=>$value)
                                           @if(in_array($key, $product->properties()->pluck('id')->toArray()))
                                                <option selected value="{{$key}}">{{$value}}</option>
                                            @else
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ثبت</button>
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