<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
            <th class="text-center align-middle text-primary">ایمیل</th>
            <th class="text-center align-middle text-primary">موبایل</th>
            <th class="text-center align-middle text-primary">نقش های کاربر</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                
            
            <tr>
                <td class="text-center align-middle">{{ $key += 1}}</td>
                <td class="text-center align-middle">
                    <figure class="avatar avatar">
                        <img src="{{ url('images/admin/users/big/'.$user->photo) }}" class="rounded-circle" alt="image">
                    </figure>
                </td>
                <td class="text-center align-middle">{{ $user->name }}</td>
                <td class="text-center align-middle">{{ $user->email }}</td>
                <td class="text-center align-middle">{{ $user->mobile }}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="#">
                        نقش های کاربر
                    </a>
                </td>
                <td class="text-center align-middle" wire:click="changeUserStatus({{ $user->id }})">
                    @if($user->status == \App\Enums\UserStatus::Active->value)
                        <span class="cursor-pointer badge badge-success">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger"> غیر فعال</span>
                        @endif

                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="#">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">{{ \Hekmatinasser\Verta\Verta::instance($user->created_at)->format('%B %d، %Y / H:i') }}</td>
            </tr>
            @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
         {{$users->appends(Request::except('page'))->links()}}
    </div>
</div>