
<div class="users form large-9 medium-8 columns content">
<?= $this->Form->create() ?>
    <fieldset>
    <legend><?= __('ログイン') ?></legend>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button('ログイン') ?>
<?= $this->Form->end() ?>
</div>