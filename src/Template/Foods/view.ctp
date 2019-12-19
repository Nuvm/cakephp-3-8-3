<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food $food
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food'), ['action' => 'edit', $food->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food'), ['action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Foods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Food Types'), ['controller' => 'FoodTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Type'), ['controller' => 'FoodTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foods view large-9 medium-8 columns content">
    <h3><?= h($food->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Food Type') ?></th>
            <td><?= $food->has('food_type') ? $this->Html->link($food->food_type->name, ['controller' => 'FoodTypes', 'action' => 'view', $food->food_type->id]) : '' ?></td>
        </tr>
    </table>
</div>
