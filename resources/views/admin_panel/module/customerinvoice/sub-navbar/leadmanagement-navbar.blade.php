<ul class="nav digishiksha-navbar-header nav-line tx-12 mb-3 px-3" id="myTab5" style="background-color: white;"
    role="tablist">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('leadmanagement-client-imports') }}">
            <i class="fa fa-plus"></i> Import Clients
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="contact-tab5" data-bs-toggle="dropdown" href="#">
            <i class="fa fa-cogs"></i> Master Setting
        </a>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu navbar-menu-sub tx-11 pd-0 pd-t-5">
            <a href="{{ route("lead-statuss") }}" class="dropdown-item">Define Lead Stages</a>
            <a href="#" class="dropdown-item">Setup Payment Number</a>
        </div>

    </li>
</ul>
