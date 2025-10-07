<form action="{{ route('update-lead-status',$status->id) }}" method="POST">
    @csrf
    @method("PUT")
    <fieldset class="form-fieldset m-3  px-3">
        <legend>Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">Lead Status <span class="text-danger">*</span></label>
            <input type="text" name="name" value="{{ $status->name ?? "" }}" autocomplete="off"
                class="form-control input-sm" required placeholder="Enter Lead Status ..">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Lead Status Description <span
                        class="text-secondary">(optional)</span></label>
                <textarea class="form-control" placeholder="Enter Lead Description..."  name="description">{{ $status->description ?? "" }}</textarea>
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">End Date<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes" {{ ($status->status ?? "") == "yes" ? "selected" : "" }}>Active</option>
                    <option value="no" {{ ($status->status ?? "") == "no" ? "selected" : "" }}>Inactive</option>
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
