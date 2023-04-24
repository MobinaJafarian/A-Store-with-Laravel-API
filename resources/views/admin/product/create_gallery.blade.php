@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">  ایجاد لیست تصاویر محصول {{$product->title}}</h6>
                    <form method="POST" class="dropzone border border-primary" action="{{route('store.product.galley', $product->id)}}"  >
                        @csrf
                        <div class="form-group row">
                            <div class="fallback">
                                <input type="file" name="file" multiple>
                            </div>
                        </div>
                    </form>
                    <livewire:admin.galleries :product_id="$id"/>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
    </script>
@endsection