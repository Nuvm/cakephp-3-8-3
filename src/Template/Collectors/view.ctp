<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collector $collector
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collector'), ['action' => 'edit', $collector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collector'), ['action' => 'delete', $collector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $collector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collectors view large-9 medium-8 columns content">
    <h3><?= h($collector->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($collector->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($collector->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Loans') ?></h4>
        <?php if (!empty($collector->loans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Interest') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Amount Due') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($collector->loans as $loans): ?>
            <tr>
                <td><?= h($loans->id) ?></td>
                <td><?= h($loans->interest) ?></td>
                <td><?= h($loans->amount) ?></td>
                <td><?= h($loans->amount_due) ?></td>
                <td><?= h($loans->user_id) ?></td>
                <td><?= h($loans->created) ?></td>
                <td><?= h($loans->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
