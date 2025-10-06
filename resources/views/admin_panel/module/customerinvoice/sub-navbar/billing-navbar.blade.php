<ul class="nav digishiksha-navbar-header nav-line tx-12 mb-3 px-3" id="myTab5" style="background-color: white;" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href=""><i class="fa fa-chart-line"></i> In App Analytics</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="{{ route('admin_panel.module.customerinvoice.submodule.customer_list') }}" ><i class="fa fa-list"></i> Customers</a>
    </li>

    <li class="nav-item">
    <a class="nav-link" id="profile-tab5" data-bs-toggle="modal" data-bs-target="#exampleModalCenterCustomer" href="JavaScript:void(0)">
        <i class="fa fa-plus"></i> Customer
    </a>
</li>
  
<li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="{{ route('admin_panel.module.load-generate-invoice') }}" ><i class="fa fa-plus"></i> Invoice </a>
</li>


    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="{{ route('admin.module.cutomerinvoice.payments.add-new-payment') }}" ><i class="fa fa-plus"></i> Payment Received </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="" ><i class="fa fa-plus"></i> Recurring Invoices</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="" ><i class="fa fa-plus"></i> Credit Note</a>
    </li>
<!--<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="contact-tab5" data-bs-toggle="dropdown" href="#">
        <i class="fa fa-plus"></i> Add New
    </a>
    <div class="dropdown-menu navbar-menu-sub tx-11 pd-0 pd-t-5">
        <a href="#" class="dropdown-item">Customer</a>
        <a href="#" class="dropdown-item">Quote</a>
        <a href="#" class="dropdown-item">Invoice</a>
    </div>
</li> -->
    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="{{ route('admin_panel.module.customerinvoice.list') }}" ><i class="fa fa-list"></i> Invoice List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab5"  href="" ><i class="fa fa-user"></i> Advance Billing</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="contact-tab5" data-bs-toggle="dropdown" href="#">
        <i class="fa fa-cogs"></i> Master Setting 
    </a>
   <!-- Dropdown Menu -->
<div class="dropdown-menu navbar-menu-sub tx-11 pd-0 pd-t-5">
    <a href="#" class="dropdown-item" >Setup Invoice Number</a>
    <a href="#" class="dropdown-item" >Setup Payment Number</a>
</div>

</li>

</ul>




