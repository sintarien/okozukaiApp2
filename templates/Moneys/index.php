<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>jQuery・Ajax・Cake</title>
    <?php
    // Ajax 送信用の JavaScript を読み込み
    echo $this->Html->script('http://code.jquery.com/jquery-1.11.3.min.js');
    //echo $this->Html->script('send_data');
    echo $this->Html->script($ajax_name);
    ?> 
</head>
<body>
    <?php echo $this->Form->create (); ?>
    <h3>deposit 入金、収入</h3>
    <!-- 入金、収入	 -->
    <?php echo $this->Form->textarea("deposit",['cols'=> 20, 'rows' => 4,'id' => 'deposit']); ?>
    <!-- 出金、支出	 -->
    <h3>withdrawal 出金、支出</h3>
    <?php echo $this->Form->textarea("withdrawal",['cols'=> 20, 'rows' => 4,'id' => 'withdrawal']); ?>
    <!-- 使用用途 -->
    <h3>purpose 使用用途</h3>
    <?php echo $this->Form->textarea("purpose",['cols'=> 20, 'rows' => 4,'id' => 'purpose']); ?>
    <!-- 収入理由 -->
    <h3>reason 収入理由</h3>
    <?php echo $this->Form->textarea("reason",['cols'=> 20, 'rows' => 4,'id' => 'reason']); ?>

    <?php echo $this->Form->submit('送信',['id' => 'send']); ?>
    <?php echo $this->Form->end (); ?>
</body>
</html>