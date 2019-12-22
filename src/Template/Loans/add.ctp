<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenavToggleable" aria-controls="sidenavToggleable" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button-->
    <ul class="side-nav" id="sidenavToggleable">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['action' => 'index']) ?></li>
        <?php if( $this->Session->read('Auth.User.permission_level')>1 ): ?>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <?php endif ?>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Collectors'), ['controller' => 'Collectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Collector'), ['controller' => 'Collectors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loans form large-9 medium-8 columns content">
    <?= $this->Form->create($loan) ?>
    <fieldset>
        <legend><?= __('Add Loan') ?></legend>
        <?php
            echo $this->Form->control('interest');
            echo $this->Form->control('amount');
            echo $this->Form->control('amount_due');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('collectors._ids', ['options' => $collectors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
