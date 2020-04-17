<?php

unset($_SESSION["cl_login"]);
unset($_SESSION["cl_id"]);
unset($_SESSION["cl_password"]);
?>
<script>
    window.location = "<?= PORTAL ?>";
</script>