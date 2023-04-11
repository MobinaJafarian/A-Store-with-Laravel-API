@extends('admin.layouts.master')

@section('content')
<main class="main-content">
	<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-primary font-weight-bold primary-font">تعداد کاربران</h6>
                            </div>
                            <div>
                                <span class="dashboard-pie-1" style="display: none;">2/5</span><svg class="peity" height="60" width="60"><path d="M 30.000000000000004 0 A 30 30 0 0 1 47.633557568774194 54.270509831248425 L 30 30" data-value="2" fill="rgba(88, 103, 221, 0.3)"></path><path d="M 47.633557568774194 54.270509831248425 A 30 30 0 1 1 29.999999999999993 0 L 30 30" data-value="3" fill="rgb(88, 103, 221)"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-success font-weight-bold primary-font">تعداد فروش</h6>
                            </div>
                            <div>
                                <span class="dashboard-pie-2" style="display: none;">4/5</span><svg class="peity" height="60" width="60"><path d="M 30.000000000000004 0 A 30 30 0 1 1 1.4683045111453907 20.729490168751582 L 30 30" data-value="4" fill="rgba(10, 187, 135, 0.3)"></path><path d="M 1.4683045111453907 20.729490168751582 A 30 30 0 0 1 29.999999999999993 0 L 30 30" data-value="1" fill="rgb(10, 187, 135)"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-warning font-weight-bold primary-font">مجموع نظرات</h6>
                            </div>
                            <div>
                                <span class="dashboard-pie-3" style="display: none;">1/5</span><svg class="peity" height="60" width="60"><path d="M 30.000000000000004 0 A 30 30 0 0 1 58.53169548885461 20.72949016875158 L 30 30" data-value="1" fill="rgba(255, 184, 34, 0.3)"></path><path d="M 58.53169548885461 20.72949016875158 A 30 30 0 1 1 29.999999999999993 0 L 30 30" data-value="4" fill="rgb(255, 184, 34)"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">1</h2>
                                <h6 class="mb-2 font-size-13 text-info font-weight-bold primary-font">تعداد محصولات </h6>
                            </div>
                            <div>
                                <span class="dashboard-pie-4" style="display: none;">2/5</span><svg class="peity" height="60" width="60"><path d="M 30.000000000000004 0 A 30 30 0 0 1 47.633557568774194 54.270509831248425 L 30 30" data-value="2" fill="rgba(85, 166, 235, 0.3)"></path><path d="M 47.633557568774194 54.270509831248425 A 30 30 0 1 1 29.999999999999993 0 L 30 30" data-value="3" fill="rgb(85, 166, 235)"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد کاربر</h6>
                    <form method="POST" >
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی" dir="rtl" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="ایمیل" dir="rtl" name="email" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">موبایل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="موبایل" dir="rtl" name="mobile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">پسورد</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="پسورد" dir="rtl" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">واتس اپ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="whatsapp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">تلگرام</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="telegram">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">اینستاگرام</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="instagram">
                            </div>
                        </div>
                        <div class="form-group row">
							<label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
							<input  class="col-sm-10" type="file" class="form-control-file" id="file">
						</div>
                        <div class="form-group row">
							<button name="submit" type="button" class="btn btn-success btn-uppercase">
								<i class="ti-check-box m-r-5"></i> ذخیره
							</button>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="card">
            <div class="card-body">
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
							<tr>
								<td class="text-center align-middle"></td>
								<td class="text-center align-middle">
									<figure class="avatar avatar">
										<img src="" class="rounded-circle" alt="image">
									</figure>
								</td>
								<td class="text-center align-middle"></td>
								<td class="text-center align-middle"></td>
								<td class="text-center align-middle"></td>
								<td class="text-center align-middle">
									<a class="btn btn-outline-info" href="#">
										نقش های کاربر
									</a>
								</td>
								<td class="text-center align-middle">
										<span class="cursor-pointer badge badge-success">فعال</span>
								</td>
								<td class="text-center align-middle">
									<a class="btn btn-outline-info" href="#">
										ویرایش
									</a>
								</td>
								<td class="text-center align-middle"></td>
							</tr>
						
					</table>
					<div style="margin: 40px !important;"
						 class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
					</div>
				</div>
            </div>
        </div>

	</main>
@endsection