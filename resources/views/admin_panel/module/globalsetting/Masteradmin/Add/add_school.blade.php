<form action="{{ route('admin.global-setting.create-school') }}" method="POST">
@csrf
    <fieldset class="form-fieldset  px-3">
        <legend>School Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">School Name<span
                    class="text-danger">*</span></label>
            <input type="text" name="school_name" value="{{old('school_name')}}" autocomplete="off" class="form-control input-sm"
                required placeholder="Enter School Name">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Address <span
                        class="text-danger">*</span></label>
                <textarea name="school_address" class="form-control" placeholder="School Address..." id="">{{old('address')}}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">About School<span class="text-secondary">(optional)</span></label>
                <textarea name="about_school" class="form-control" placeholder="About School..." id="">{{old('about_school')}}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Contact No<span class="text-secondary">(optional)</span></label>
                <input type="text" name="contact_no" value="{{old('contact_no')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter Contact Number..">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">School Email<span class="text-secondary">(optional)</span></label>
                <input type="text" name="email" value="{{old('email')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter School Email">
            </div>
            <div class="col-sm-6 gorm-group ">
            <label for="" class="form-label">School <span class="text-secondary">(optional)</span></label>
            <input type="file" name="school_logo" value="{{old('school_logo')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter School Name">
        </div>
            <div class="col-sm-6 mb-3 pt-4">
                <b>Default Active : </b> <input type="checkbox" checked name="is_active">
            </div>
        </div>
    </fieldset>
    
                
<div class="modal-footer bg-light">
    
    <button type="submit" class="btn btn-primary btn-icon px-2">
    <i class="fa fa-plus"></i> Create
</button>
<button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">
<i class="fa fa-times"></i> Cancel
</button>

</div>
</form>