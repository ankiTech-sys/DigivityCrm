<form action="{{ route('admin.module.cutomerinvoice.add_customer') }}" method="POST">
                @csrf
                <fieldset class="form-fieldset mx-3 mb-3">
                    <legend>Service Category Information</legend>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label class="form-label">Select Service<span class="text-danger">*</span></label>

                            <select name="service_category_id" required class="form-control input-sm" id="">
                                <option value="">**Select Service</option>

                                @foreach($category as $cat)
    <option value="{{ $cat->id }}" 
        {{ (old('service_category_id', $customer->category_id) == $cat->id) ? 'selected' : '' }}>
        {{ $cat->category_name }}
    </option>
@endforeach

                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label">Customer Type <span class="text-danger">*</span></label>
                            <select name="customer_type" required class="form-control input-sm" id="customer_type">
                                <option value="">**Select Type</option>
                                <option value="School" {{ old('customer_type') == 'School' ? 'selected' : '' }}>School
                                </option>
                                <option value="Individual" {{ old('customer_type') == 'Individual' ? 'selected' : '' }}>
                                    Individual</option>
                                <option value="Other" {{ old('customer_type') == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Primary Contact <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <select name="salutation_pr" required class="form-control input-sm" id="">
                                        <option value="">**Select Salutation</option>
                                        <option value="Mr." {{ old('salutation_pr') == 'Mr.' ? 'selected' : '' }}>Mr.
                                        </option>
                                        <option value="Mrs." {{ old('salutation_pr') == 'Mrs.' ? 'selected' : '' }}>Mrs.
                                        </option>
                                        <option value="Ms." {{ old('salutation_pr') == 'Ms.' ? 'selected' : '' }}>Ms.
                                        </option>
                                        <option value="Dr." {{ old('salutation_pr') == 'Dr.' ? 'selected' : '' }}>Dr.
                                        </option>
                                        <option value="Miss." {{ old('salutation_pr') == 'Miss.' ? 'selected' : '' }}>
                                            Miss.</option>
                                    </select>

                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control input-sm" required name="fname"
                                        value="{{ old('fname') }}" placeholder="Enter First Name">
                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control input-sm" name="lname"
                                        value="{{ old('lname') }}" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Company/School Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-sm" required name="org_name"
                                value="{{ old('org_name') }}" placeholder=" Enter Company Name">

                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="form-label"> Email Adress <span class="text-danger">*</span></label>
                            <input type="email" class="form-control  input-sm" required name="email_address"
                                value="{{ old('email_adress') }}" placeholder=" Email Adsress">

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Company Email <span
                                    class="text-secondary">(optional)</span></label>
                            <input type="email" class="form-control input-sm" name="org_email_address"
                                value="{{ old('org_email_adress') }}" placeholder=" Comapny Email Asdress">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <select name="org_country" required class="form-control input-sm" id="">
                                        <option value="">**Select Country</option>
                                        <option value="India" {{ old('org_country') == 'India' ? 'selected' : '' }}>India
                                        </option>
                                        <option value="Other" {{ old('org_country') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>

                                <div class="col-sm-4">


                                    @include('admin_panel.comman.all-state');


                                </div>
                                <div class="col-sm-4">
                                    <!-- <label class="form-label">Company Em <span class="text-secondary">(optional)</span></label> -->
                                    <input type="text" name="org_city" required value="{{ old('org_city') }}"
                                        class="form-control input-sm" placeholder="Enter City Name.." id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Pin Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-sm" name="pin_code"
                                value="{{ old('pin_code') }}" placeholder="&#127968; Pin Code">

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-6">

                                    <input type="text" class="form-control input-sm" name="w_p_contact"
                                        value="{{ old('w_p_contact') }}" placeholder=" &#128222; Work Phone">
                                </div>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control input-sm" name="m_contact"
                                        value="{{ old('m_contact') }}" placeholder=" &#128241; Mobile">

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 mb-3 pt-4">
                            <b>Default Active: </b>
                            <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                        </div>
                    </div>
                </fieldset>

                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary btn-icon px-3">
                        <i class="fa fa-plus"></i> Create
                    </button>
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                </div>
            </form>