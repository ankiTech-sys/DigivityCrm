<form action="{{ route('admin.global-setting.create-course') }}" method="POST">
@csrf
    <fieldset class="form-fieldset  mx-3 mb-3">
        <legend>Course Information</legend>
        <div class="row">
        <div class="col-lg-6 gorm-group ">
            <label for="" class="form-label">Course Name<span
                    class="text-danger">*</span></label>
            <input type="text" name="course_name" value="{{old('course_name')}}" autocomplete="off" class="form-control input-sm"
                required placeholder="Enter Course Name">
        </div>
        <div class="col-lg-6 gorm-group ">
            <label for="" class="form-label">Course Sequence</label>
            <input type="text" name="sequence" value="{{old('sequence')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter Sequence">
        </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Course Code</label>
               <input type="text" class="form-control input-sm" name="course_code" value="{{old('course_code')}}" placeholder="Enter Course Code">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Course Full Name<span class="text-secondary">(optional)</span></label>
                <input type="text" class="form-control input-sm" name="course_full_name" value="{{old('course_full_name')}}" placeholder="Enter Course Full Name">
</div>
            <div class="col-sm-6 mb-3 pt-4">
                <b>Default Active : </b> <input type="checkbox" checked name="is_active">
            </div>
        </div>
    </fieldset>
    
                
<div class="modal-footer bg-light">
    
    <button type="submit" class="btn btn-primary btn-icon px-3">
    <i class="fa fa-plus"></i> Create
</button>
<button  type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">
<i class="fa fa-times"></i> Cancel
</button>

</div>
</form>