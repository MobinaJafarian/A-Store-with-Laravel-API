@extends('admin.layouts.master')

@section('content')
<main class="main-content">
	<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">{{ $users }}</h2>
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
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">{{ $orders }}</h2>
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
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">{{ $comments }}</h2>
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
                                <h2 class="font-weight-bold m-b-10 line-height-30 primary-font">{{ $products }}</h2>
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
		
		

	</main>
@endsection