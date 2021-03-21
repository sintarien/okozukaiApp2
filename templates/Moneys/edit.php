<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Money $money
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $money->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $money->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Moneys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneys form content">
            <?= $this->Form->create($money) ?>
            <fieldset>
                <legend><?= __('Edit Money') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('deposit');
                    echo $this->Form->control('withdrawal');
                    echo $this->Form->control('purpose');
                    echo $this->Form->control('reason');
                    echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
