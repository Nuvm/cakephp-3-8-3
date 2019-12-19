<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodType $foodType
 */
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Foods",
    "action" => "getByCategory",
    "_ext" => "json"
]);
?>
<script><?= 'var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";' ?></script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Food Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Foods'), ['controller' => 'Foods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food'), ['controller' => 'Foods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($foodType) ?>
    <fieldset>
        <legend><?= __('Add Food Type') ?></legend>
        <?php
        echo $this->Form->control('foodType_id', ['options' => $foodTypes]);
        echo $this->Form->control('food_id', ['options' => $foods]);
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
<?php echo $this->Html->script('FoodTypes/add'); ?>
