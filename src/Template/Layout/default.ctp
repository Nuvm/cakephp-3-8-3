<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$webtitle = "Loans System";
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $webtitle ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?php
    echo $this->Html->css([

        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'Collectors/basic.css',
        'bootstrap.min.css',
        'base.css',
        'style.css'

    ]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?php
    echo $this->Html->script([
        'https://code.jquery.com/jquery-1.12.4.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
        'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'https://cdn.jsdelivr.net/npm/vue/dist/vue.js'
    ]);
    ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?php echo $this->Html->link($webtitle, ['controller' => 'Loans', 'action' => 'index']) ?>
                    </a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
                <li><a href=""><?php echo $this->Html->link('Listes liées', ['controller'=>'FoodTypes','action'=>'index']); ?></a></li>
            </ul>
            <ul class="right"><li><a href=""><?php if($this->Session->read('Config.language')!="pt_PT") echo $this->Html->link('Portugues', ['action' => 'changeLang', 'pt_PT'], ['escape' => false]); ?></a></li>
                <li><a href=""><?php if($this->Session->read('Config.language')!="fr_CA") echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]); ?></a></li>
                <li><a href=""><?php
                        if($this->Session->read('Config.language')!="en_CA") echo $this->Html->link('English', ['action' => 'changeLang', 'en_CA'], ['escape' => false]); ?></a></li>
                <li><a href="">
                <?php
                $loguser = $this->Session->read('Auth.User');
                if ($loguser) {
                    $user = $loguser['email'];
                    echo $this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']);
                } else {
                    echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                }
                ?></a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div id="app" class="container clearfix" style="margin:0;padding:0;font-size:small;">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
