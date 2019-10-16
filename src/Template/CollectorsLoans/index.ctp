<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectorsLoan[]|\Cake\Collection\CollectionInterface $collectorsLoans
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Collectors Loan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collectors'), ['controller' => 'Collectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collector'), ['controller' => 'Collectors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="collectorsLoans index large-9 medium-8 columns content">
    <h3><?= __('Collectors Loans') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('loan_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collector_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collectorsLoans as $collectorsLoan): ?>
            <tr>
                <td><?= $collectorsLoan->has('loan') ? $this->Html->link($collectorsLoan->loan->id, ['controller' => 'Loans', 'action' => 'view', $collectorsLoan->loan->id]) : '' ?></td>
                <td><?= $collectorsLoan->has('collector') ? $this->Html->link($collectorsLoan->collector->name, ['controller' => 'Collectors', 'action' => 'view', $collectorsLoan->collector->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $collectorsLoan->loan_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $collectorsLoan->loan_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $collectorsLoan->loan_id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectorsLoan->loan_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
