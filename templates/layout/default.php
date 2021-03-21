<?php

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
        <?php if($this->request->getSession()->read('Auth.User.id')):?>
         ログイン中
         <?= $this->Html->link(__('logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
         <?= $this->Html->link(__('moneys'), ['controller' => 'moneys', 'action' => 'index']) ?>
        <?php else:?>
         未ログイン
         <?= $this->Html->link(__('login'), ['controller' => 'Users', 'action' => 'login']) ?>
         <?= $this->Html->link(__('moneys'), ['controller' => 'moneys', 'action' => 'index']) ?>

        <?php endif;?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
