<form action="{{ route('update-client-type', $clientType->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="form-fieldset m-3  px-3">
      
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Client Type <span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Client Type..." value="{{ old("client_type", $clientType->client_type) }}" name="client_type">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Status<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes" {{ $clientType->status == 'yes' ? 'selected' : '' }}>Active</option>
                    <option value="no" {{ $clientType->status == 'no' ? 'selected' : '' }}>Inactive</option>
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
