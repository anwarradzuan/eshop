<?php

unset($_SESSION["user_login"]);
unset($_SESSION["user_id"]);
unset($_SESSION["user_password"]);
?>
<script>
    window.location = "<?= PORTAL ?>";
</script>