<?php
if (!function_exists('autoAlert')) {
    function autoAlert()
    {
        $output = '';
        if (session()->has('success')) {
            $message = session('success');
            $output = "<script>
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 3); // Alert auto-dismiss after 3 seconds
                alertify.success('{$message}');
            </script>";
        }

        if (session()->has('error')) {
            $message = session('error');
            $output = "<script>
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 3); // Alert auto-dismiss after 3 seconds
                alertify.error('{$message}');
            </script>";
        }

        echo $output;
    }
}
