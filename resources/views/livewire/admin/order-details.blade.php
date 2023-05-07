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
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">قیمت بدون تخفیف</th>
            <th class="text-center align-middle text-primary">قیمت با تخفیف</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">وضعیت سفارش</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $index => $detail)
            <tr>
                <td class="text-center align-middle">{{$orderDetails->firstItem() + $index}}</td>
                <td class="text-center align-middle">{{$detail->product->title}}</td>
                <td class="text-center align-middle">{{ number_format($detail->price) }}</td>
                <td class="text-center align-middle">{{$detail->discount_price}}</td>
                <td class="text-center align-middle">{{$detail->count}}</td>
                <td class="text-center align-middle" wire:click="changeStatus({{$detail->id}})">
                    @if($detail->status===\App\Enums\OrderStatus::Received->value)
                        <span class="badge badge-success cursor-pointer"> تحویل شده </span>
                    @elseif($detail->status===\App\Enums\OrderStatus::Rejected->value)
                        <span class="badge badge-danger cursor-pointer"> مرجوع شده </span>
                    @elseif($detail->status===\App\Enums\OrderStatus::Processing->value)
                        <span class="badge badge-info cursor-pointer"> در حال پردازش </span>
                    @elseif($detail->status===\App\Enums\OrderStatus::Send->value)
                        <span class="badge badge-primary cursor-pointer">فرستاده شده</span>
                    @endif
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($detail->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$orderDetails->appends(Request::except('page'))->links()}}
    </div>
</div>