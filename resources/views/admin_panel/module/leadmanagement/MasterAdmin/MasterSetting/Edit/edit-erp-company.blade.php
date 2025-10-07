<form action="{{ route('update-company', $company->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="form-fieldset m-3  px-3">
        <legend>Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">Company Name <span class="text-danger">*</span></label>
            <input type="text" name="company_name" value="{{ $company->company_name ?? '' }}" autocomplete="off"
                class="form-control input-sm" required placeholder="Enter Company Name ..">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Address <span
                        class="text-secondary">(optional)</span></label>
                <textarea class="form-control" placeholder="Enter Address..." name="address">{{ $company->address ?? '' }}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Status<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes" {{ $company->status == 'yes' ? 'selected' : '' }}>Active</option>
                    <option value="no" {{ $company->status == 'no' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>
    </fieldset>


    <div class="modal-footer bg-light">

        <button type="submit" class="btn btn-primary btn-icon px-2">
            <i class="fa fa-plus"></i> Update
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fa fa-times"></i> Cancel
        </button>

    </div>
</form>
