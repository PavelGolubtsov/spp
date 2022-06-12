@extends('layouts.layout')
@section('content')
<!-- content-wrapper -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
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
                        <th style="width: 20%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getOrder as $order)
                    <tr>
                        <td style="padding: 0 0 0 0.75rem;">{{$tasks->find($order->task_id)->name}}</td>
                        @foreach($tasks->find($order->task_id)->priorities as $priority)
                            <td style="padding: 0 0 0 0.75rem;">{{$priority->name}}</td>
                        @endforeach
                        @foreach($tasks->find($order->task_id)->statuses as $status)
                            <td style="padding: 0 0 0 0.75rem;">{{$status->name}}</td>
                        @endforeach
                        <td style="padding: 0 0.75rem 0 0.75rem;" class="project-actions text-right">
                            <a style="padding: 0.25rem 0.4rem;" class="btn btn-info btn-sm" href="{{ route('tasks.edit', $order->task_id) }}">
                                <i class="fas fa-user-cog"></i>
                            </a>
                            <form style="padding: 0;" class="btn btn-sm" method="post" action="{{ route('tasks.destroy', $order->task_id) }}">
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
    </div>
    <!-- /.Main content -->
</div>
<!-- /.content-wrapper -->
@endsection