<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CollectorsLoan $collectorsLoan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Collectors Loans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collectors'), ['controller' => 'Collectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collector'), ['controller' => 'Collectors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="collectorsLoans form large-9 medium-8 columns content">
    <?= $this->Form->create($collectorsLoan) ?>
    <fieldset>
        <legend><?= __('Add Collectors Loan') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
