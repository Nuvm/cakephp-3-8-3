<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use Cake\Utility\Text; ?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            if( $this->Session->read('Auth.User.permission_level')>1 ){
               echo $this->Form->radio('permission_level', ['User','Employee','Admin']);
            }
            echo $this->Form->hidden('uuid',['value'=>Text::uuid()]);
            ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
