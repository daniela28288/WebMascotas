<?php
session_start();
session_unset();
session_destroy();

echo "<script>
alert('SESIÓN CERRADA');
window.location.href = 'index.php';
</script>";