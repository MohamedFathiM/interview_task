@extends('layouts.app')

@section('content')

@section('styles')
<style>
    .task-box {
        background-color: #fff;
        padding: 5px;
        margin: 20px auto;
        border: 1px solid #ccc;
        width: 450px;
    }

    .task-box .task-name {
        margin-left: 20px;
        margin-right: 20px;
        font-size: 20px;
        font-weight: bold;
    }

    a,
    p,
    button.btn-outline-danger {
        margin-left: 20px;
        margin-right: 20px;
    }
</style>
@endsection

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">{{ __('Tasks') }}</h2>
        <a href="{{ route('tasks.create') }}"
            class="btn btn-outline-primary btn-lg font-weight-bold">@lang('site.add')</a>
    </div>
    <div class="card-body">
        <p class="page-description">All User Taks</p>

        @foreach ($tasks as $task)
        <div class="task-box">
            <div class="d-flex justify-content-between">
                <div class="task-name"> {{ ucfirst($task->title) }} </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" disabled {{ $task->is_done ? 'checked'
                    :
                    '' }}>
                </div>
            </div>
            <p class="text-muted">{{ $task->description }}</p>
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.edit',$task) }}"
                    class="btn btn-outline-success btn-lg font-weight-bold">@lang('Edit')</a>
                <button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
                    onclick="return confirm('Are You Sure ?')">@lang('Delete')</button>
            </div>
            <form action="{{ route('tasks.destroy',$task) }}" id="DeleteForm" method="POST">
                @method('delete')
                @csrf
            </form>

        </div>
        @endforeach
    </div>
</div>

@endsection
