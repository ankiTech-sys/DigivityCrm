<form action="{{ route('update-leadSource-type',$leadsource->id) }}" method="POST">
    @csrf
    @method("PUT")
    <fieldset class="form-fieldset m-3  px-3">
        <legend>Information</legend>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Lead Source Name <span class="text-danger">*</span></label>
                <input type="text" name="lead_source_name" value="{{ $leadsource->lead_source_name ?? "" }}" autocomplete="off"
                    class="form-control input-sm" required placeholder="Enter Lead Source Name ..">
            </div>

            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Status<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes" {{ $leadsource->status == "yes" ? "selected" : "" }}>Active</option>
                    <option value="no" {{ $leadsource->status == "no" ? "selected" : "" }}>Inactive</option>
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
