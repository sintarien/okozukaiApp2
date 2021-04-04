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

    <?= $this->Html->css(['style.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>
<body>
    <div id="wrapper">
        <div class="main_box">
            <nav class="navbar navbar-dark bg-dark top-nav header_box">
                <div class="top-nav-title">
                <?= $this->Html->link(__('おこづかいApp'), ['controller' => 'Moneys', 'action' => 'index'],['class' => 'title']) ?>
                </div>
                <div class="top-nav-links">
                <?php if($this->request->getSession()->read('Auth.User.id')):?>
                    <div class="dropdown dropdown_name">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?= $username ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown_box">
                        <?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?>
                        </ul>
                    </div>
                <?php else:?>
                    <ul class="list_box">
                        <li><?= $this->Html->link(__('アカウント作成'), ['controller' => 'Users', 'action' => 'add'],['class' => 'btn btn-success box']) ?></li>
                        <li><?= $this->Html->link(__('ログイン'), ['controller' => 'Users', 'action' => 'login'],['class' => 'btn btn-primary box']) ?></li>
                    </ul>
                <?php endif;?>
                </div>
            </nav>
        </div>

        <!-- レスポンシブ用のヘッダー -->
        <div class="res_box">
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top ">
                <div class="top-nav-title">
                <?= $this->Html->link(__('おこづかいApp'), ['controller' => 'Moneys', 'action' => 'index'],['class' => 'title']) ?>
                </div>
                <div class="button">
                    <button class="navbar-toggler a" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <?php if($this->request->getSession()->read('Auth.User.id')):?>
                    <li class="nav-item active">
                    <?= $this->Html->link(__('ログアウト'), ['controller' => 'Users', 'action' => 'logout']) ?>
                    </li>
                <?php else:?>
                    <li class="nav-item active">
                    <?= $this->Html->link(__('アカウント作成'), ['controller' => 'Users', 'action' => 'add']) ?>
                    </li>
                    <li class="nav-item active">
                    <?= $this->Html->link(__('ログイン'), ['controller' => 'Users', 'action' => 'login']) ?>
                    </li>
                <?php endif;?>
                </ul>
                </div>
            </nav>
        </div>


        <main class="main">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer class="navbar navbar-dark bg-dark ">
            <div class="footer_box">©OkozukaiApp</div>
        </footer>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


