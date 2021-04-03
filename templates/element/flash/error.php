<?php
echo $this->Html->script('alert');

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error alert alert-danger " onclick="this.classList.add('hidden');"><?= $message ?></div>


<script>
    $('.alert').fadeOut(3000);
</script>