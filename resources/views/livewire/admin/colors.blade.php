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
            <th class="text-center align-middle text-primary">نام رنگ</th>
            <th class="text-center align-middle text-primary">کد رنگ</th>
            <th class="text-center align-middle text-primary">نمایش رنگ</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($colors as $index => $color)
            <tr>
                <td class="text-center align-middle">{{$colors->firstItem() + $index}}</td>
                <td class="text-center align-middle">{{$color->name}}</td>
                <td class="text-center align-middle">{{$color->code}}</td>
                <td class="text-center align-middle" style="background-color: {{$color->code}}; width: 80px;"></td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('colors.edit',$color->id)}}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="deleteColor({{$color->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($color->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$colors->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')
    <script>
        window.addEventListener('deleteColor',event=>{
            Swal.fire({
                text: "آیا از حذف مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyColor', event.detail.id);
                    Swal.fire(
                        ' حذف با موفقیت انجام شد'
                    )
                }
            })
        })
    </script>
@endsection