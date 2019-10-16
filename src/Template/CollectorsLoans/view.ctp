<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectorsLoan $collectorsLoan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Collectors Loan'), ['action' => 'edit', $collectorsLoan->loan_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Collectors Loan'), ['action' => 'delete', $collectorsLoan->loan_id], ['confirm' => __('Are you sure you want to delete # {0}?', $collectorsLoan->loan_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Collectors Loans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collectors Loan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Collectors'), ['controller' => 'Collectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Collector'), ['controller' => 'Collectors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="collectorsLoans view large-9 medium-8 columns content">
    <h3><?= h($collectorsLoan->loan_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Loan') ?></th>
            <td><?= $collectorsLoan->has('loan') ? $this->Html->link($collectorsLoan->loan->id, ['controller' => 'Loans', 'action' => 'view', $collectorsLoan->loan->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collector') ?></th>
            <td><?= $collectorsLoan->has('collector') ? $this->Html->link($collectorsLoan->collector->name, ['controller' => 'Collectors', 'action' => 'view', $collectorsLoan->collector->id]) : '' ?></td>
        </tr>
    </table>
</div>
