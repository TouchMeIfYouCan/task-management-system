@extends('user.layout.main')
@section('main-container')

                         <!-- start page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Task Management System</a></li>
                                            <li class="breadcrumb-item active">Task List</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Task List</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if(session('msg'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>{{ session('msg') }}</strong>
                                        </div>
                                        @endif
                                        @if(session('dltMsg'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ session('dltMsg') }}</strong>
                                        </div>
                                        @endif
                                        @if(session('updateMsg'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>{{ session('updateMsg') }}</strong>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-centered mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($task as $task)
                                                            <tr>
                                                                <td>
                                                                    @if($task->getFirstMediaUrl())
                                                                    <img src="{{ $task->getFirstMediaUrl() }}" alt="task-img" class="rounded me-3" height="64">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ $task->title }}
                                                                </td>
                                                                <td>
                                                                    {{ $task->description }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('user.editTask', ['id'=>$task->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                                    <form action="{{ route('user.deleteTask', ['id'=>$task->id]) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="action-icon">
                                                                            <i class="mdi mdi-delete"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive-->
                                            </div>
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
