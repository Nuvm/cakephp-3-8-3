<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\File $file
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Methods'), ['controller' => 'PaymentMethods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment Method'), ['controller' => 'PaymentMethods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="files view large-9 medium-8 columns content">
    <h3><span style="float:right"><?php
        echo $this->Html->image($file->path . $file->name, [
            "alt" => $file->name,
            "width" => "220px",
            "height" => "150px",
            'url' => ['action' => 'view', $file->id]
        ]);
            ?></span><?= h($file->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($file->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method Id') ?></th>
            <td><?= $this->Number->format($file->payment_method_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($file->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $file->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payment Methods') ?></h4>
        <?php if (!empty($file->paymentMethod)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($file->paymentMethod as $paymentMethod): ?>
                    <tr>
                        <td><?= h($paymentMethod->name) ?></td>
                        <td><?= h($paymentMethod->description) ?></td>
                        <td><?= h($paymentMethod->id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'paymentMethod', 'action' => 'view', $paymentMethod->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'paymentMethod', 'action' => 'edit', $paymentMethod->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'paymentMethod', 'action' => 'delete', $paymentMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentMethod->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
