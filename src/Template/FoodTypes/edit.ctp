<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodType $foodType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foodType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foodType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Food Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Foods'), ['controller' => 'Foods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food'), ['controller' => 'Foods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($foodType) ?>
    <fieldset>
        <legend><?= __('Edit Food Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
