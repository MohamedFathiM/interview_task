<div class="row">
    <div class="form-group col-6">
        <label>@lang('Title')</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="@lang('Title')" name="title" value="{{ $task->title ?? old('title')}}">
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group col-6 mt-2">
        <label>@lang('Done')</label>
        <div class="custom-control custom-checkbox ">
            <input type="checkbox" class="custom-control-input" name="is_done" value="1" {{ $task->is_done ? 'checked'
            :''
            }}>
        </div>
    </div>
    <div class="form-group col-12 mt-2">
        <label>@lang('Description')</label>
        <textarea name="description" id="" cols="30" rows="10"
            class="form-control @error('description') is-invalid @enderror">
            {{ $task->description ?? old('description')}}
        </textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mt-4">
    <div class="form-group col-6">
        <input type="submit" class="btn btn-dark" value="@lang('submit')">
    </div>
</div>
