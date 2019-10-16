<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Loan'), ['action' => 'edit', $loan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Loan'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['action' => 'add']) ?> </li>
        <?php if( $this->Session->read('Auth.User.permission_level')>1 ): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif ?>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Collectors'), ['controller' => 'Collectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collector'), ['controller' => 'Collectors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loans view large-9 medium-8 columns content">
    <h3><?= h($loan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $loan->has('user') ? $this->Html->link($loan->user->id, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest') ?></th>
            <td><?= $this->Number->format($loan->interest) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($loan->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Due') ?></th>
            <td><?= $this->Number->format($loan->amount_due) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($loan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($loan->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Collectors') ?></h4>
        <?php if (!empty($loan->collectors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loan->collectors as $collectors): ?>
            <tr>
                <td><?= h($collectors->id) ?></td>
                <td><?= h($collectors->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Collectors', 'action' => 'view', $collectors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Collectors', 'action' => 'edit', $collectors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Collectors', 'action' => 'delete', $collectors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($loan->payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Payment Method Id') ?></th>
                <th scope="col"><?= __('Loan Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($loan->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->notes) ?></td>
                <td><?= h($payments->created) ?></td>
                <td><?= h($payments->user_id) ?></td>
                <td><?= h($payments->payment_method_id) ?></td>
                <td><?= h($payments->loan_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
