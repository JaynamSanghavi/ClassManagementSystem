<script>

    <?php
        if(isset($_GET['op'])){
    $op = $_GET['op'];
    $page = $_GET['page'];
    $p = $_GET['p'];
    switch ($page) {
        case "student":
            $notification_for = "Student";
            break;
        case "branch":
            $notification_for = "Branch";
            break;
        case "subjects":
            $notification_for = "Subject";
            break;
    }
    if ($op == "add" && $p == "success"){

    ?>
    toastr["success"]("<?php echo $notification_for;?> Successfully Added", "<?php echo $notification_for;?> Added")
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    <?php
        } else if($op == "update" && $p == "success"){
    ?>
    toastr["info"]("<?php echo $notification_for;?> Successfully Updated", "<?php echo $notification_for;?> Updated")
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    <?php
        }
    }
    ?>
</script>