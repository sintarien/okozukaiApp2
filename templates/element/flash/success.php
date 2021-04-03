<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success alert alert-success" onclick="this.classList.add('hidden')"><?= $message ?></div>
<script>
    $('.alert').fadeOut(3000);
</script>