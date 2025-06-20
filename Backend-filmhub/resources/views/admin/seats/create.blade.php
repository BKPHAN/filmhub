@extends('admin.layouts.master')
@section('title')

@endsection
@section('style-libs')
    <!-- Plugins css -->
    <link href="{{asset('theme/admin/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('theme/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('script-libs')
    <!-- ckeditor -->
    <script src="{{asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
    <!-- dropzone js -->
    <script src="{{asset('theme/admin/libs/dropzone/dropzone-min.js')}}"></script>

    <script src="{{asset('theme/admin/js/create-product.init.js')}}"></script>
@endsection
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tạo mới ghế</h1>
        <!--  Page main content   -->
        <!--   Main product information             -->
        <form action="{{route('admin.createSeat')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!--   left content-->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Main product information -->
                        <a href="#collapseProductInfo" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Thông tin chính của ghế</h6> -->
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseProductInfo">
                            <div class="card-body">
                                <div class="mb-3">
                                    <!-- chọn phòng -->
                                    <label for="choices-category-input" class="form-label">Chọn phòng</label>
                                    <select class="form-control" aria-label="Default select example"
                                            id="choices-category-input" name="room_id">
                                        <option selected>----------- Chọn phòng ----------</option>
                                        @foreach($rooms as $room_id => $room_name)
                                            <option name="room_id" value="{{$room_id}}">
                                                {{ $room_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <span style="padding: 10px 0; color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success w-sm">Tiếp tục</button>
                    </div>
                </div>
                <!-- end left content    -->

            </div>
        </form>
</div>
<!-- /.container-fluid -->
@endsection
