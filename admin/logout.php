<?php
session_start();
session_unset();
//session_destroy();
$_SESSION['errmsg']="Vous vous êtes déconnecté avec succès";
?>
<script language="javascript">
document.location="index.php";
</script>
