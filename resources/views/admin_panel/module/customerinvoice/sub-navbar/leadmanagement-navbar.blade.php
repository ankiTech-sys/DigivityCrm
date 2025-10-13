<ul class="nav  nav-line tx-12 mb-1 px-3" id="myTab5" style="background-color: white;" role="tablist">


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="contact-tab5" data-bs-toggle="dropdown" href="#">
            <i class="fa fa-plus"></i> Entry
        </a>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu navbar-menu-sub tx-11 pd-0 pd-t-5">
            <a class="dropdown-item" href="{{ route('leadmanagement-client-registration') }}">
                Clients Registration
            </a>
            <a class="dropdown-item" href="{{ route('leadmanagement-client-imports') }}">
                Import Clients
            </a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="contact-tab5" data-bs-toggle="dropdown" href="#">
            <i class="fa fa-cogs"></i> Master Setting
        </a>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu navbar-menu-sub tx-11 pd-0 pd-t-5">
            <a href="{{ route('lead-statuss') }}" class="dropdown-item">Define Lead Stages</a>
            <a href="{{ route('define-companys') }}" class="dropdown-item">Define Company</a>
            <a href="{{ route('define-client-types') }}" class="dropdown-item">Client Type</a>
            <a href="{{ route('define-leadSource-types') }}" class="dropdown-item">Define Lead Source</a>
            <a href="{{ route('define-leadAssignee') }}" class="dropdown-item">Define Lead Assignee</a>
        </div>
    </li>
</ul>
