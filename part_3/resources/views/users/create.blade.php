@extends('layouts.layout')
@section('title') @lang('Users') @endsection
@section('content')

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('Users')</h2>
    </div>
    <div class="card-body table-responsive">
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">@csrf
            <div class="row">
                <div class="mb-3 form-group col-md-4 col-12">
                    <label>@lang('First Name')</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        placeholder="@lang('First Name')" name="first_name"
                        value="{{ $task->first_name ?? old('first_name')}}" required>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 form-group col-md-4 col-12">
                    <label>@lang('Last Name')</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        placeholder="@lang('Last Name')" name="last_name"
                        value="{{ $task->last_name ?? old('last_name')}}" required>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 form-group col-md-4 col-12">
                    <label>@lang('Email')</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="@lang('Email')" name="email" value="{{ $task->email ?? old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 form-group col-md-4 col-12">
                    <label>@lang('Password')</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="@lang('Password')" name="password" value="{{ $task->password ?? old('password')}}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 form-group col-md-4 col-12">
                    <label>@lang('Password Confirmation')</label>
                    <input type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="@lang('Password Confirmation')" name="password_confirmation"
                        value="{{ $task->password_confirmation ?? old('password_confirmation')}}">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-4 col-12">
                    <label for="formFile" class="form-label">User Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" name="image"
                        type="file" id="formFile" required>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div id="thumbnailContainer" class="mt-4 col-12 text-center"></div>
            </div>

            <div class="row mt-4">
                <div class="form-group col-6">
                    <input type="submit" class="btn btn-dark" value="@lang('submit')">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
