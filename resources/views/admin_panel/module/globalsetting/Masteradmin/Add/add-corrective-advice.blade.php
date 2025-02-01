<form action="{{ route('admin.global-setting.create.corrective-advice.category') }}" method="POST">
@csrf
    <fieldset class="form-fieldset  mx-3 mb-3">
        <legend>Corrective Advice Category Information</legend>
        <div class="row">
        <div class="col-lg-6 gorm-group ">
            <label for="" class="form-label">Position<span
                    class="text-danger">*</span></label>
            <input type="text" name="position" value="{{old('position')}}" autocomplete="off" class="form-control input-sm"
                required placeholder="Enter Corrective Advice Category Position">
        </div>
        <div class="col-lg-6 gorm-group ">
            <label for="" class="form-label">Corrective Adivce Category <span class="text-danger">*</span></label>
            <input type="text" name="category_name" required value="{{old('category_name')}}" autocomplete="off" class="form-control input-sm"
                 placeholder="Enter Category Name">
        </div>
            <div class="col-sm-12 form-group">
                <label for="" class="form-label">Corrective Category Description</label>
              <textarea name="description" class="form-control w-100" cols="1" rows="1" placeholder="Carrective Advice Category Description"></textarea>
            </div>
       
            <div class="col-sm-6 mb-3 pt-2">
                <b>Default Active : </b> <input type="radio" value="yes" checked name="is_active"><input type="radio" class="ms-3" value="no"  name="is_active">
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