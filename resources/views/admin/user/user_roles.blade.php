@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="row">
            @if(Session::has('message'))
                <div class="alert alert-info">
                    <div>{{session('message')}}</div>
                </div>
            @endif
        </div>
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">اتصال کاربر به نقش</h6>
                    <form role="form" method="POST" action="{{route('store.user.roles',$user->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 offset-3">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#" role="tab">نقش های کاربر {{$user->name}}</a>
                                        @foreach($roles as $role)
                                        <div class="form-check  d-flex align-items-center">
                                            <input  @if($user->hasRole($role->name)) checked @endif     type="checkbox"  class="form-check-input" name="roles[]" value="{{$role->name}}" id="exampleCheck1">
                                            <a class="list-group-item list-group-item-action mt-2" for="exampleCheck1" data-toggle="list" href="#" role="tab">{{$role->name}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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