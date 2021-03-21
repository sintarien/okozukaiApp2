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
            <?= $this->Html->link(__('Edit Money'), ['action' => 'edit', $money->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Money'), ['action' => 'delete', $money->id], ['confirm' => __('Are you sure you want to delete # {0}?', $money->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Moneys'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Money'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="moneys view content">
            <h3><?= h($money->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $money->has('user') ? $this->Html->link($money->user->id, ['controller' => 'Users', 'action' => 'view', $money->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Purpose') ?></th>
                    <td><?= h($money->purpose) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($money->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deposit') ?></th>
                    <td><?= $this->Number->format($money->deposit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Withdrawal') ?></th>
                    <td><?= $this->Number->format($money->withdrawal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reason') ?></th>
                    <td><?= $this->Number->format($money->reason) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($money->created_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
