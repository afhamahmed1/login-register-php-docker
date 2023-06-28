
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
<?php
if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    ?>

    <script>
        $(document).ready(function() {
            alertify.success("<?php echo addslashes($message); ?>");
           
        });
    </script>

    <?php
    unset($_SESSION['success']);
}else if(isset($_SESSION['error'])){

    $message = $_SESSION['error'];
    ?>
    <script>
        $(document).ready(function() {
            alertify.error("<?php echo addslashes($message); ?>");
        });

    </script>
<?php
}
?>


