<form action="{{ route('update-leadAssignee', $leadassignee->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset class="form-fieldset m-3  px-3">
        <legend>Information</legend>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Lead Assignee Name <span class="text-danger">*</span></label>
                <input type="text" name="lead_assignee_name" value="{{ old('lead_assignee_name', $leadassignee->lead_assignee_name) }}" autocomplete="off"
                    class="form-control input-sm" required placeholder="Enter Lead Assignee Name ..">
            </div>

            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Contact No. <span class="text-muted">(optional)</span></label>
                <input type="text" name="contact_no" value="{{ old('contact_no', $leadassignee->contact_no ?? "") }}" autocomplete="off"
                    class="form-control input-sm" placeholder="Enter Contact No. ..">
            </div>

            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Status<span class="text-danger">*</span></label>
                <select class="form-select" name="status">
                    <option value="yes" {{ $leadassignee->status == "yes" ? "selected" : "" }}>Active</option>
                    <option value="no" {{ $leadassignee->status == "no" ? "selected" : "" }}>Inactive</option>
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
