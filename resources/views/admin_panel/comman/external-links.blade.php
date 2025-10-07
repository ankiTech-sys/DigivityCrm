<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 5 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../../assets/newimage/lalji-fav.png') }}">

    <title>Digivity Software : : CRM</title>
    <!-- vendor css -->


    <script src="{{ asset('../../assets/lib/ionicons/ionicons/ionicons.esm.js') }}" type="module"></script>
    <script src="{{ asset('../../assets/lib/ionicons/ionicons/ionicons.esm.js') }}" type="module"></script>
    <link href="{{ asset('../../assets/lib/fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../../assets/lib/typicons.font/src/font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('../../assets/lib/remixicon/fonts/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('../../assets/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../../assets/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}"
        rel="stylesheet">
<!-- jQuery (Required for Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('../../assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://themepixels.me/demo/dashforge2/assets/css/dashforge.css">
    <link rel="stylesheet" href="https://themepixels.me/demo/dashforge2/assets/css/dashforge.demo.css">
    <link rel="stylesheet" href="https://themepixels.me/demo/dashforge2/lib/prismjs/themes/prism-vs.css">
    <script src="{{ asset('../../assets/lib/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
   
    <!-- Include CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>

    <!-- MDBootstrap CSS -->
 

    <link rel="stylesheet" href="{{ asset('../../assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/dashforge.profile.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/dashforge.demo.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/dashforge.auth.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/css/bootstrap-multiselect.css') }}">
    <link href="{{asset('../../alertify/alertify.css')}}" rel="stylesheet">
<link href="{{asset('../../alertify/alerti.css')}}" rel="stylesheet">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/themes/material_green.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>



<style>
    @keyframes rotateBottom {
  from {
    opacity: 0;
    transform: rotateX(90deg);
  }
  to {
    opacity: 1;
    transform: rotateX(0deg);
  }
}

.modal.effect-rotate-bottom .modal-dialog {
  transform: rotateX(90deg);
  opacity: 0;
  transition: all 0.5s ease-in-out;
}

.modal.effect-rotate-bottom.show .modal-dialog {
  animation: rotateBottom 0.5s ease forwards;
  opacity: 1;
}


@keyframes superScaled {
  from {
    opacity: 0;
    transform: scale(0.7);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.modal.effect-super-scaled .modal-dialog {
  transform: scale(0.7);
  opacity: 0;
  transition: all 0.4s ease-in-out;
}

.modal.effect-super-scaled.show .modal-dialog {
  animation: superScaled 0.4s ease forwards;
}

@keyframes slideInBottom {
  from {
    opacity: 0;
    transform: translateY(100px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.modal.effect-slide-in-bottom .modal-dialog {
  transform: translateY(100px);
  opacity: 0;
  transition: all 0.4s ease-in-out;
}

.modal.effect-slide-in-bottom.show .modal-dialog {
  animation: slideInBottom 0.4s ease forwards;
}


</style>
</head>

<body>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    // Initialize Flatpickr
    flatpickr(".datepicker", {
        dateFormat: "d-m-Y",   // backend format
        altInput: true,        // nice formatted display
        altFormat: "d-m-Y",   // e.g., October 7, 2025
        allowInput: true,      // user can type manually
        defaultDate: "today",  // ✅ auto-select today's date
        clickOpens: true       // ✅ opens picker when clicked
    });
});
</script>
