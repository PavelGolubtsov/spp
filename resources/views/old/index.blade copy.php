@extends('layouts.layout')
@section('content')
<!-- Main Content -->
<div id="content" class="content">
    <div class="content-header">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Задачи</h1>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    @if (session('success'))
        <div style="padding: 0.25rem 1.25rem;" class="alert alert-success">
            {{session('success')}}
        </div>
    @else
        <div style="padding: 0.25rem 1.25rem;" class="alert">
            &nbsp;
        </div>
    @endif

    <div class="mb-3">
        <a class="btn btn-success btn-sm" href="{{ route('tasks.create') }}">
            Создать задачу
        </a>
    </div>

    <!-- Default box -->
    <div class="card">
        <table class="table table-striped projects" style="margin: 0;">
            <thead>
                <tr>
                    <th style="width: 20%">Название</th>
                    <th style="width: 20%">Приоритет</th>
                    <th style="width: 20%">Статус</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getOrder as $order)
                <tr>
                    <td style="padding: 0 0 0 1.5rem;">{{$task->find($order->task_id)->name}}</td>
                    @foreach($task->find($order->task_id)->priorities as $priority)
                        <td style="padding: 0 0 0 1.5rem;">{{$priority->name}}</td>
                    @endforeach
                    @foreach($task->find($order->task_id)->statuses as $status)
                        <td style="padding: 0 0 0 1.5rem;">{{$status->name}}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Default box -->
    <div class="card">
            <table class="table table-striped projects" style="margin: 0;">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Название</th>
                        <th style="width: 20%">Дата создания</th>
                        <th style="width: 15%">Приоритет</th>
                        <th style="width: 15%">Статус</th>
                        <th style="width: 20%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $key => $task)
                    <tr>
                        <td style="padding: 0 0 0 1.5rem;">{{$key + 1}}</td>
                        <td style="padding: 0 0 0 0.75rem;">{{$task->name}}</td>
                        <td style="padding: 0 0 0 0.75rem;">{{$task->created_at}}</td>
                        @foreach($task->priorities as $priority)
                            <td style="padding: 0 0 0 0.75rem;">{{$priority->name}}</td>
                        @endforeach
                        @foreach($task->statuses as $status)
                            <td style="padding: 0 0 0 0.75rem;">{{$status->name}}</td>
                        @endforeach
                        <td style="padding: 0 0.75rem 0 0.75rem;" class="project-actions text-right">
                            <a style="padding: 0.25rem 0.4rem;" class="btn btn-info btn-sm" href="{{ route('tasks.edit', $task->id) }}">
                                <i class="fas fa-user-cog"></i>
                            </a>
                            <form style="padding: 0;" class="btn btn-sm" method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <!-- /.card -->

</div>
<!-- End of Main Content -->
@endsection