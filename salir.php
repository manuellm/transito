<?php
session_start();
header("Location:index.php");
session_destroy();
?>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
//    $.ajax({
//        type: "POST",
//        url: "catalogos/ct_selector_movimientos.php",
//        data: {opcion: 2},
//        dataType: "text",
//        async: false,
//        error: function() {
//            alert('PAGINA NO ENCONTRADA');
//        },
//				success: function(data) {
//					location.href = 'index.php';
//        }
//    });
</script>