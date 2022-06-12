@extends('layouts.layout')
@section('content')
<!-- Main Content -->
<div id="content" class="content">
    <div class="content-header">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Создание задачи</h1>
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
    
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="name" class="col-md-2 col-form-label text-md-end">Название <span class="text-danger">*</span></label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $task->name }}" placeholder="Введите название задачи" autocomplete="title" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-2 col-form-label text-md-end">Выберите приоритет <span class="text-danger">*</span></label>
            <div class="col-form-label mb-3">
                <select name="priority_id">
                    @foreach ($priorities as $priority)
                        <option value="{{$priority->id}}">{{$priority->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-2 col-form-label text-md-end">Выберите статус <span class="text-danger">*</span></label>
            <div class="col-form-label mb-3">
                <select name="status_id">
                    @foreach ($statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-md-2 col-form-label text-md-end"></label>
            <div class="col-md-6 col-form-label">
                <span class="text-danger"><b>*</b></span> Обязательное поле для заполнения!
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 col-form-label text-md-end">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
</div>
<!-- End of Main Content -->
@endsection