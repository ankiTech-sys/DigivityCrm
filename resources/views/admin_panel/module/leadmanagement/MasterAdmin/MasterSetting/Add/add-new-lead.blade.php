<form action="{{ route('create-lead-status') }}" method="POST">
    @csrf
    <fieldset class="form-fieldset m-3  px-3">
        <legend>Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">Lead Status <span class="text-danger">*</span></label>
            <input type="text" name="name" value="{{ old('lead_status') }}" autocomplete="off"
                class="form-control input-sm" required placeholder="Enter Lead Status ..">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Lead Status Description <span
                        class="text-secondary">(optional)</span></label>
                <textarea class="form-control" placeholder="Enter Lead Description..." value="{{ old("description") }}" name="description"></textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">End Date<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes">Active</option>
                    <option value="no">Inactive</option>
                </select>
            </div>

        </div>
    </fieldset>


    <div class="modal-footer bg-light">

        <button type="submit" class="btn btn-primary btn-icon px-2">
            <i class="fa fa-plus"></i> Create
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fa fa-times"></i> Cancel
        </button>

    </div>
</form>
