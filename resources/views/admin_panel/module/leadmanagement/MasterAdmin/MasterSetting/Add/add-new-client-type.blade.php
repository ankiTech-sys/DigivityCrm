<form action="{{ route('create-client-type') }}" method="POST">
    @csrf
    <fieldset class="form-fieldset m-3  px-3">
      
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Client Type <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Client Type..." value="{{ old("client_type") }}" name="client_type">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Status<span class="text-danger">*</span></label>
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
