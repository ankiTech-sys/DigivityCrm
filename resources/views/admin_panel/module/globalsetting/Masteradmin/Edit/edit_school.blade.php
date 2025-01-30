<form action="{{ route('admin.global-setting.edit.school',$schoolinformation->id) }}" method="POST">
@csrf
@method('PUT')
    <fieldset class="form-fieldset  px-3">
        <legend>School Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">School Name<span
                    class="text-danger">*</span></label>
            <input type="text" name="school_name" value="{{$schoolinformation->school_name ?? ''}}" autocomplete="off" class="form-control input-sm"
                required placeholder="Enter School Name">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Address <span
                        class="text-danger">*</span></label>
                <textarea name="school_address" class="form-control" placeholder="School Address..." id="">{{$schoolinformation->school_address ?? ''}}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">About School<span class="text-secondary">(optional)</span></label>
                <textarea name="about_school" class="form-control" placeholder="About School..." id="">{{$schoolinformation->about_school ?? ''}}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Contact No<span class="text-secondary">(optional)</span></label>
                <input type="text" name="contact_no" value="{{$schoolinformation->contact_no ?? ''}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter Contact Number..">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Email<span class="text-secondary">(optional)</span></label>
                <input type="text" name="email" value="{{$schoolinformation->email ?? ''}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter School Email">
            </div>
            <div class="col-sm-6 gorm-group ">
            <label for="" class="form-label">School <span class="text-secondary">(optional)</span></label>
            <input type="file" name="school_logo" value="{{old('school_logo')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter School Name">
        </div>
            <div class="col-sm-6 mb-3 pt-4">
                 <input type="hidden" name="is_active" value="no">
                <b>Default Active : </b> <input name="is_active" class="is_active" type="checkbox" {{$schoolinformation->is_active == 'yes' ? 'checked' :''}} >
            </div>
        </div>
    </fieldset>
    
                
<div class="modal-footer mt-3">
    
    <button type="submit" class="btn btn-primary btn-icon px-4">
    <i class="fa fa-plus"></i> Update
</button>
<button  type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
<i class="fa fa-times"></i> Cancel
</button>

</div>
</form>