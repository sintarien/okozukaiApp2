<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>おこづかいApp</title>
    <?php
    // Ajax 送信用の JavaScript を読み込み
    echo $this->Html->script('http://code.jquery.com/jquery-1.11.3.min.js');
    //echo $this->Html->script('send_data');
    echo $this->Html->script('send_data.js');
    ?>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="deposit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
    <?php echo $this->Form->create (); ?>
    <h3>deposit 入金、収入</h3>
    <!-- 入金、収入	 -->
    <?php echo $this->Form->control('deposit',array('id' => 'deposit','label' => '入金額')); ?>
    <!-- 収入理由 -->
    <h3>reason 収入理由</h3>
    <?php echo $this->Form->control('reason',array('id' => 'reason','label' => '入金理由','options' => $reason)); ?>
    <?php echo $this->Form->submit('送信',['id' => 'deposit_send']); ?>
    <?php echo $this->Form->end (); ?>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="withdrawal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
    <?php echo $this->Form->create (); ?>
    <!-- 出金、支出	 -->
    <?php echo $this->Form->control('withdrawal',array('id' => 'withdrawal','label' => '入金額')); ?>
    <!-- 使用用途 -->
    <h3>purpose 使用用途</h3>
    <?php echo $this->Form->textarea("purpose",['cols'=> 20, 'rows' => 4,'id' => 'purpose']); ?>

    <?php echo $this->Form->submit('送信',['id' => 'withdrawal_send']); ?>
    <?php echo $this->Form->end (); ?>
      </div>

    </div>
  </div>
</div>


<div class="moneys_box index content">
  <div class="button_box">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deposit_modal">
    入金
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#withdrawal_modal">
    出金
    </button>
  </div>
    <h3><?= __('取引履歴') ?></h3>
    <div class="table-responsive">
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">取引日付</th>
            <th scope="col">入金履歴</th>
            <th scope="col">入金理由</th>
            <th scope="col">出金履歴</th>
            <th scope="col">出金理由</th>
            <th scope="col">残高履歴</th>
          </tr>
        </thead>
        <tbody id="data">
        </tbody>
      </table>
    </div>
</div>
</body>
</html>

<script>
const income_reason_js = ['','給料','その他']

$(function() {
    get();
});

function get(){
    $.getJSON("http://localhost/okozukai_app_2/moneys/get.json", function(data){
        $("#data").empty();
        var money_data = '';
        for(var i in data.data){
            var money_data = '<tr><td>'+ formatDate(data.data[i].created_at)
                            + '</td><td>'+ data.data[i].deposit
                            + '</td><td>'+ income_reason_js[data.data[i].reason]
                            + '</td><td>'+ data.data[i].withdrawal
                            + '</td><td>'+ data.data[i].purpose
                            + '</td><td>'+ data.data[i].total
                            +'</td></tr>';
            $("#data").append(money_data);
            $('#textdata').val('');

        }
    })
}

$(document).ready(function()
{
    $('#deposit_send').click(function()
    {
        $('#withdrawal').val("");
        $('#purpose').val("");
        var data = {
                    deposit : $('#deposit').val(),
                    withdrawal : $('#withdrawal').val(),
                    purpose : $('#purpose').val(),
                    reason : $('#reason').val(),
                    type : 0
                    };
        //入金額が空かをチェック
        if (!data.deposit) {
          alert('金額を入力してください');
          return false;
        }
        if (!data.reason) {
          alert('収入理由を選択してください');
          return false;
        }
        //入金額が数値かをチェック
        if ($.isNumeric(data.deposit)) {
          alert(data.deposit + '円入金しました');
        } else {
          alert('入力は半角数値でお願いします');
          return false;
        }

        $.ajax({
            type: 'POST',
            datatype:'json',
            url: "http://localhost/okozukai_app_2/moneys/add",
            data: data,
            success: function(data,dataType)
            {
                get();
                // alert('Success');
                //モーダルを消す
                $('#deposit_modal').modal('hide');
                //フォームの中身を初期化
                $('#deposit').val("");
                $('#reason').val("");
                $('#withdrawal').val("");
                $('#purpose').val("");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error : ' + errorThrown);
            }
        });
        return false;
    });
});

$(document).ready(function()
{
    $('#withdrawal_send').click(function()
    {
        $('#deposit').val("");
        $('#reason').val("");
        var data = {
                    deposit : $('#deposit').val(),
                    withdrawal : $('#withdrawal').val(),
                    purpose : $('#purpose').val(),
                    reason : $('#reason').val(),
                    type : 1
                    };

        //出金額が空かをチェック
        if (!data.withdrawal) {
          alert('金額を入力してください');
          return false;
        }
        if (!data.purpose) {
          alert('出金理由を入力してください');
          return false;
        }

        if ($.isNumeric(data.withdrawal)) {
          alert(data.withdrawal+'円出金しました');
        } else {
          alert('入力は半角数値でお願いします');
          return false;
        }
        $.ajax({
            type: 'POST',
            datatype:'json',
            url: "http://localhost/okozukai_app_2/moneys/add",
            data: data,
            success: function(data,dataType)
            {
                get();
                //モーダルを消す
                $('#withdrawal_modal').modal('hide');
                //フォームの中身を初期化
                $('#deposit').val("");
                $('#reason').val("");
                $('#withdrawal').val("");
                $('#purpose').val("");
                type : 0
            },
            /**
             * Ajax通信が失敗した場合に呼び出されるメソッド
             */
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error : ' + errorThrown);
            }
        });
        return false;
    });
});

  //時間フォーマット
  function formatDate(datetime){
  var date = new Date(datetime);
  var yyyymmddhhmmss = date.getFullYear() + "/" ;
  yyyymmddhhmmss += ('0' + (date.getMonth() + 1)).slice(-2) + "/";
  yyyymmddhhmmss += ('0' + date.getDate()).slice(-2) + " ";
  yyyymmddhhmmss += ('0' + date.getHours()).slice(-2) + ":";
  yyyymmddhhmmss += ('0' + date.getMinutes()).slice(-2) + ":";
  yyyymmddhhmmss += ('0' + date.getSeconds()).slice(-2);
  return yyyymmddhhmmss;
}
  function clear(){
    //フォームの中身を初期化
    $('#deposit').val("");
    $('#reason').val("");
    $('#withdrawal').val("");
    $('#purpose').val("");
  }
</script>