<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodType[]|\Cake\Collection\CollectionInterface $foodTypes
 */

$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Foods",
    "action" => "getByCategory",
    "_ext" => "json"
]);
?>
<script><?= 'var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";' ?></script>

<!--nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Food Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Foods'), ['controller' => 'Foods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food'), ['controller' => 'Foods', 'action' => 'add']) ?></li>
    </ul>
</nav-->
<script>
    //Vue component that makes options using its data object's id and name parameters.
    Vue.component('voptioncomponent', {
        props: ['voptioncomponentprop'],
        template: '<option :value="voptioncomponentprop.id"> {{ voptioncomponentprop.name }} </option>'
    })
</script>

<div class="foodTypes index large-9 medium-8 columns content" id="vuefoodtypes">
    <h3><?= __('Food Types') ?></h3>

    <?= $this->Form->create($foodType) ?>
    <fieldset>
        <div class="input select">
            <label for="foodtype-id">Food Type</label>
            <select name="foodtype_id" id="foodtype-id"></select>
        </div>
        <div class="input select">
            <label for="food-id">Food</label>
            <select name="food_id" id="food-id"></select>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
<script>
    $('#foodtype-id').append('<voptioncomponent v-for="item in vFoodTypesData" v-bind:voptioncomponentprop="item" v-bind:key="item.id"></voptioncomponent>');
    $('#food-id').append('<voptioncomponent v-for="item in vFoodsData" v-bind:voptioncomponentprop="item" v-bind:key="item.id"></voptioncomponent>');
    var vFoods = new Vue({
        el: '#vuefoodtypes',
        data:{
            vFoodTypesData: <?php echo json_encode($foodTypesTest->toArray()) ?>,
            vFoodsData: [
            ]
        }
    });
    </script>
<?php echo $this->Html->script('FoodTypes/add'); ?>

