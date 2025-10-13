{{-- session changed modal start hewe --}}
<!-- <footer style="background-color: black; color: white; text-align: center; padding: 10px 0; width: 103%;margin-left:-24px;overflow-y:hidden;margin-bottom:-50px">
    <p>&copy; 2025 Digivity Technology. All rights reserved.</p>
</footer> -->
<!-- Button trigger modal -->
</div>


{{-- edit status modal end here --}}
<!-- Modal -->
<div class="modal fade" id="changeSession" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Financial Year</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
    use App\Models\GlobalSetting\MsterSetting\Financial\FinancialYearModel;
    $years = FinancialYearModel::all();
@endphp

<form id="updateSession" method="POST">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="financial_id" class="from-label fw-bold">Financial Year</label>
            <select name="financial_id" class="form-select" id="financial_id">
                <option value="">**Select Financial Year</option>
                @foreach ($years as $year)
                    <option value="{{ $year->id }}" {{ $year->is_active === 'yes' ? 'selected' : '' }}>
                        {{ $year->financial_session }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Change Session</button>
    </div>
</form>

{{-- Update Financial Session --}}
<script type="text/javascript">
$(document).ready(function () {
    $('#updateSession').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let route = "{{ route('financialYear.update') }}";

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is fetched correctly
            },
            url: route,
            type: "POST",
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // Corrected the reload method
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error || 'An unexpected error occurred.'
                    });
                }
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: xhr.responseJSON?.message || 'Failed to update financial session.'
                });
            }
        });
    });
});
</script>


{{-- logout script section start here --}}
<script class="text/javascript">
    $(document).ready(function() {
        $('#sign_out').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('logout') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {
                            window.location.href = '{{ route('admin.login') }}';
                        },
                        error: function(error) {
                            console.log('Logout failed:', error);
                        }
                    });

                }
            });
        });
    });
</script>
{{-- logout script section end here --}}

{{-- loader code here --}}
<script>
    // Show loader on page refresh, navigation, or back/forward navigation
    window.addEventListener("beforeunload", function () {
        document.getElementById("ld").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    });

    // Show loader even when navigating back/forward using browser arrows
    window.addEventListener("pageshow", function (event) {
        // Show the loader on back/forward navigation
        if (event.persisted) {
            document.getElementById("ld").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }
        
        // Hide the loader after the page fully loads
        document.getElementById("ld").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    });
</script>



</div>


<script>
    $(function() {
        'use script'

        window.darkMode = function() {
            $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function() {
            $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if (hasMode === 'dark') {
            darkMode();
        } else {
            lightMode();
        }
        $('.select2').select2({
  placeholder: '**Please Select Here..',
  searchInputPlaceholder: 'Search options'
});
    })
</script>


<script src="{{ asset('../../assets/lib/ionicons/ionicons/ionicons.esm.js') }}" type="module"></script>
{{-- <script src="{{ asset('../../assets/lib/select2/js/select2.min.js')}}"></script> --}}
<script src="{{ asset('../../assets/lib/jquery.flot/jquery.flot.js ') }}"></script>
<script src="{{ asset('../../assets/lib/jquery.flot/jquery.flot.stack.js ') }}"></script>
<script src="{{ asset('../../assets/lib/jquery.flot/jquery.flot.resize.js ') }}"></script>
<script src="{{ asset('../../assets/lib/chart.js/Chart.bundle.min.js ') }}"></script>
<script src="{{ asset('../../assets/lib/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/jqvmap/jquery.vmap.min.js ') }}"></script>
<script src="{{ asset('../../assets/lib/jqvmap/maps/jquery.vmap.usa.js ') }}"></script>
<script src="{{ asset('../../assets/js/xlsx.full.min.js ') }}"></script>


<script src="{{ asset('../../assets/js/dashforge.sampledata.js') }}"></script>
<script src="{{ asset('../../assets/js/dashboard-one.js') }}"></script>

<script src="{{ asset('../../assets/lib/feather-icons/feather.min.js') }}"></script>


<script src="{{ asset('../../assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('../../assets/lib/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('../../assets/lib/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('../../assets/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

<script src="{{ asset('../../assets/js/dashforge.js') }}"></script>

<!-- append theme customizer -->
<script src="{{ asset('../../assets/lib/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('../../assets/js/dashforge.settings.js') }}"></script>
<script src="{{ asset('../../assets/lib/quill/quill.core.js')}}"></script>
<script src="{{ asset('../../assets/lib/quill/quill.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/typeahead/bloodhound.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/typeahead/typeahead.jquery.min.js')}}"></script>
<script src="{{ asset('../../assets/lib/typeahead/typeahead.bundle.min.js')}}"></script>

<script src="{{ asset('../../assets/js/custom.js') }}"></script>
<script src="{{ asset('../../assets/js/datatable.js')}}"></script>
<script src="{{ asset('../../assets/js/options.js')}}"></script>
<script src="{{ asset('../../assets/js/search.js')}}"></script>
<script src="{{asset('../../assets/jshelper/TableHelper.js')}}"></script>
<script src="{{asset('../../assets/jshelper/customjquery.js')}}"></script>
<script src="{{ asset('../../alertify/alertify.js')}}"></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $(".BtnEditUrl").bind( "click", function( event ) {
            var EditViewUrl = $(this).val();
            if (EditViewUrl != 0) {
                $("#editModelsData").modal('show');
                editmodalfn(EditViewUrl);
            } else {
                alert("Sorry, Edit Url Not Found!, Please Reload Page");
                window.location.reload();
            }
        });
        function editmodalfn(EditViewUrl) {
            $("#ModelLoadData").html("<div class='text-center text-secondary mg-t-30'><div class='spinner-border text-primary'></div> <div class='tx-15 mg-l-10'><b>Please wait few seconds...</b></div></div>");
            $("#ModelLoadData").load(EditViewUrl, function (responseText, textStatus, XMLHttpRequest) {
                    if (textStatus == "error") {
                        $("#ModelLoadData").html(responseText);
                    }
                $("form").submit(function(event) {
                    loader('block');
                });
                }
            );
        }


        //model show top side
        $('.modal').on('show.bs.modal', function (event) {
            var idx = $('.modal:visible').length;
            $(this).css('z-index', 1040 + (10 * idx));
        });
        $('.modal').on('shown.bs.modal', function (event) {
            var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
            $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
            $('.modal-backdrop').not('.stacked').addClass('stacked');
        });

    });
</script>
{!! autoAlert()!!}
</body>

</html>
