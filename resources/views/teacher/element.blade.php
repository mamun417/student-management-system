
@include('partials.flash_messages.flashMessages')

<div class="form-group">
    <label class="col-lg-2 control-label">Name<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($teacher->user->name) ? $teacher->user->name:'' }}" required="required" name="name" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Email<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($teacher->user->email) ? $teacher->user->email:'' }}" required="required" name="email" type="email" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Phone<span class="required-star"> *</span></label>
    <div class="col-lg-10">
        <input value="{{ isset($teacher->phone) ? $teacher->phone:'' }}" required="required" name="phone" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Password @if(class_basename(Route::current()->uri) == 'create')<span class="required-star"> *</span>@endif</label>
    <div class="col-lg-10">
        <input value="" name="password" type="password" class="form-control" {{ (class_basename(Route::current()->uri) == 'create')?'required':'' }}>
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Address</label>
    <div class="col-lg-10">
        <input value="{{ isset($teacher->address) ? $teacher->address:'' }}" name="address" type="text" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 control-label">Subject</label>
    <div class="col-lg-10">
        <input value="{{ isset($teacher->subject) ? $teacher->subject:'' }}" name="subject" type="text" class="form-control">
    </div>
</div>


