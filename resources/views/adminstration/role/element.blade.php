
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($role->name) ? $role->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Permission<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        @foreach($permissions as $permission)
            {{--<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>--}}

            <div class="checkbox m-r-xs">
                <input {{ isset($rolePermissions)?((Arr::has($rolePermissions, $permission->id))?'checked':''):'' }} name="permission[]" value="{{ $permission->id }}" type="checkbox" id="{{ $permission->id }}">
                <label for="{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>

        @endforeach
    </div>
</div>
