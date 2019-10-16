<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Collector $collector
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $collector->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $collector->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Collectors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="collectors form large-9 medium-8 columns content">
    <?= $this->Form->create($collector) ?>
    <fieldset>
        <legend><?= __('Edit Collector') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('loans._ids', ['options' => $loans]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
