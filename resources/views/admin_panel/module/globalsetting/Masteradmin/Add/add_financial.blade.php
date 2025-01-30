<form action="{{ route('admin.global-setting.create-financialYear') }}" method="POST">
  @csrf
    <fieldset class="form-fieldset  px-3">
        <legend>Information</legend>
        <div class="gorm-group ">
            <label for="" class="form-label">Financial Year <span
                    class="text-danger">*</span></label>
            <input type="text" name="financial_session" value="{{old('financial_session')}}" autocomplete="off" class="form-control input-sm"
                required placeholder="Enter Financial Year Like : 2019-2020">
        </div>
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">Start Date <span
                        class="text-danger">*</span></label>
                <input type="date" value="{{old('start_date')}}" name="start_date" autocomplete="off" class="form-control input-sm"
                    required placeholder="Enter Satrt Date like : dd-mm-yyyy ">
            </div>
            <div class="col-sm-6 form-group">
                <label for="" class="form-label">End Date<span class="text-danger">*</span></label>
                <input type="date" value="{{old('end_date')}}" name="end_date" required autocomplete="off"
                    class="form-control date input-sm hasDatepicker"
                    placeholder="Enter End Date (dd-mm-yyyy)">
            </div>
            <div class="mb-3">
                <b>Default Active : </b> <input type="checkbox" name="is_active">
            </div>
        </div>
    </fieldset>
    
                
<div class="modal-footer bg-light">
    
    <button type="submit" class="btn btn-primary btn-icon px-2">
    <i class="fa fa-plus"></i> Create
</button>
<button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">
<i class="fa fa-times"></i> Cancel
</button>

</div>
</form>