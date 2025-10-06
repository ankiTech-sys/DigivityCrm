    <form action="{{ route('admin.global-setting.create-service-category') }}" method="POST">
    @csrf
        <fieldset class="form-fieldset  mx-3 mb-3">
            <legend>Service Category Information</legend>
            <div class="row">
            <div class="col-lg-6 gorm-group ">
                <label for="" class="form-label">Category Name<span
                        class="text-danger">*</span></label>
                <input type="text" name="category_name" value="{{old('category_name')}}" autocomplete="off" class="form-control input-sm"
                    required placeholder="Enter Service Category Name">
            </div>
            <div class="col-lg-6 gorm-group ">
                <label for="" class="form-label">Category Sequence</label>
                <input type="text" name="sequence" value="{{old('sequence')}}" autocomplete="off" class="form-control input-sm"
                    placeholder="Enter Sequence">
            </div>
                <div class="col-sm-6 form-group">
                    <label for="" class="form-label">Category Code</label>
                <input type="text" class="form-control input-sm" name="category_code" value="{{old('category_code')}}" placeholder="Enter Category Code">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="" class="form-label">Description<span class="text-secondary">(optional)</span></label>
                    <textarea  class="form-control input-sm" name="description" value="{{old('description')}}" > </textarea>
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