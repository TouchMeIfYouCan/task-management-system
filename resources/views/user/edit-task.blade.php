@extends('user.layout.main')
@section('main-container')

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Task Management System</a></li>
                                            <li class="breadcrumb-item active">Add New Task</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add New Task</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-xxl-4 col-lg-6">
                                                        <div class="card">

                                                            <!-- Logo -->
                                                            <div class="card-header pt-3 pb-3 text-center bg-primary">
                                                                <div class="text-center w-75 m-auto">
                                                                    <h3 style="font-size: 20px;" class="text-white text-center pb-0 fw-bold mb-0">TASK EDIT</h3>                                                                </div>
                                                            </div>

                                                            <div class="card-body p-4">



                                                                <form action="{{ route('user.updateTask', ['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-2">
                                                                        <label for="title" class="form-label">Title</label>
                                                                        <input class="form-control" type="text" name="title" value="{{ $data->title }}">
                                                                        @error('title')
                                                                            <p class="error-text mt-1">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label for="description" class="form-label">Description</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <textarea class="form-control" name="description" rows="2">{{ $data->description }}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    @if($data->getFirstMediaUrl())
                                                                    <div>
                                                                        <img src="{{ $data->getFirstMediaUrl() }}" alt="task-img" class="rounded me-3" height="64">
                                                                    </div>
                                                                    @endif

                                                                    <div class="mb-2">
                                                                        <label for="image" class="form-label">Image</label>
                                                                        <input type="file" name="image" class="form-control">
                                                                        @error('image')
                                                                            <p class="error-text mt-1">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>



                                                                    <div class="mt-3 mb-0 text-center">
                                                                        <button class="btn btn-primary" type="submit"> Submit </button>
                                                                    </div>

                                                                </form>
                                                            </div> <!-- end card-body -->
                                                        </div>
                                                        <!-- end card -->

                                                        <!-- end row -->

                                                    </div> <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end container -->
                                            <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

@endsection
