@extends('layouts.app')
@section('title') @lang('Tasks') @endsection
@section('content')

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('Tasks')</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('Back')</a>
    </div>
    <div class="card-body table-responsive">
        <form action="{{ route('tasks.store') }}" method="post">@csrf
            @include('tasks._form')
        </form>
    </div>
</div>

@endsection
