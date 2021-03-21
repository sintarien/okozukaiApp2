<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Moneys') ?></h4>
                <?php if (!empty($user->moneys)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Deposit') ?></th>
                            <th><?= __('Withdrawal') ?></th>
                            <th><?= __('Purpose') ?></th>
                            <th><?= __('Reason') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->moneys as $moneys) : ?>
                        <tr>
                            <td><?= h($moneys->id) ?></td>
                            <td><?= h($moneys->user_id) ?></td>
                            <td><?= h($moneys->deposit) ?></td>
                            <td><?= h($moneys->withdrawal) ?></td>
                            <td><?= h($moneys->purpose) ?></td>
                            <td><?= h($moneys->reason) ?></td>
                            <td><?= h($moneys->created_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Moneys', 'action' => 'view', $moneys->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Moneys', 'action' => 'edit', $moneys->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Moneys', 'action' => 'delete', $moneys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moneys->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
