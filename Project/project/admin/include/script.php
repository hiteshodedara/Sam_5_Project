   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    

    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
        @session_start();
        if(isset($_SESSION["status"]) && $_SESSION["status"]!='')
        {
     ?>
     <script>
        swal({
            title:"<?php echo $_SESSION['status'];?>",
            icon:"<?php echo $_SESSION['status_code'];?>",
            button:"Ok"
        });
     </script>
     <?php
     unset($_SESSION['status']);
     unset($_SESSION['status_code']);

        }
     ?>

</body>

</html>