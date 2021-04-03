
<div class="login_box">
<?= $this->Form->create() ?>
    <legend class=""><h2>ログイン</h2></legend>
    <?= $this->Form->control('email',array( 'class' => "form-control")) ?>
    <?= $this->Form->control('password',array( 'class' => "form-control")) ?>
    <div class="login_button">
      <?= $this->Form->button('ログイン', ['class' => 'btn btn-primary'] ) ?>
    </div>
<?= $this->Form->end() ?>
</div>

