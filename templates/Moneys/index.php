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
    <h3>入金額</h3>
    <!-- 入金、収入	 -->
    <?php echo $this->Form->control('deposit',array('id' => 'deposit','label' => false,"class" => "form-control")); ?>
    <!-- 収入理由 -->
    <h3 class="under_box">収入理由</h3>
    <?php echo $this->Form->control('reason',array('id' => 'reason','label' => false,'options' => $reason,"class" => "form-control")); ?>
    <?php echo $this->Form->submit('送信',array('id' => 'deposit_send',"class" => "btn btn-primary submit_box")); ?>
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
    <h3>出金額</h3>
    <?php echo $this->Form->control('withdrawal',array('id' => 'withdrawal','label' => false,"class" => "form-control")); ?>
    <!-- 使用用途 -->
    <h3 class="under_box"> 使用用途</h3>
    <?php echo $this->Form->textarea("purpose",['cols'=> 20, 'rows' => 4,'id' => 'purpose','label' => false,"class" => "form-control"]); ?>

    <?php echo $this->Form->submit('送信',array('id' => 'withdrawal_send',"class" => "btn btn-primary submit_box")); ?>
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

    <div class="main_table">
    <h3><?= __('取引履歴') ?></h3>
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
        <tbody id="main_data">
        </tbody>
      </table>
    </div>
</div>



<!-- スマートフォン用のテーブルタグ -->
<div class="responsive_table">
  <table class="row_table">
    <thead id="responsive_data">
    </thead>
  </table>
</div>

</body>
</html>

<script>
const income_reason_js = ['','給料','その他']

//残高と出金額を比べる為の変数
var total = 0;

$(function() {
    get();
});


function get(){
    $.getJSON("http://localhost/okozukai_app_2/moneys/get.json", function(data){
        $("#main_data").empty();
        $("#responsive_data").empty();
        var money_data = '';
        var withdrawal;
        var deposit;
        var reason;
        /* メインサイズの要素を返す */
        for(var i in data.data){
          if(data.data[i].withdrawal === 0){
            withdrawal = "&nbsp";
          }else{
            withdrawal = data.data[i].withdrawal;
          }
          if(data.data[i].deposit === 0){
            deposit = "&nbsp";
          }else{
            deposit = data.data[i].deposit;
          }
          //data.data[i].purpose空文字だったら"&nbsp"で空白を表示する
          if(data.data[i].purpose === ""){
            purpose = "&nbsp";
          }else{
            purpose = data.data[i].purpose;
          }
            var money_data = '<tr><td>'+ formatDate(data.data[i].created_at)
                            + '</td><td>'+ deposit
                            + '</td><td>'+ income_reason_js[data.data[i].reason]
                            + '</td><td>'+ withdrawal
                            + '</td><td>'+ purpose
                            + '</td><td>'+ data.data[i].total
                            +'</td></tr>';
            $("#main_data").append(money_data);
            total = data.data[i].total;
        }
        /* スマートフォン用の要素を返す */
        for(var i in data.data){
          if(data.data[i].withdrawal === 0){
            withdrawal = "&nbsp";
          }else{
            withdrawal = data.data[i].withdrawal;
          }
          if(data.data[i].deposit === 0){
            deposit = "&nbsp";
          }else{
            deposit = data.data[i].deposit;
          }
          //data.data[i].purpose空文字だったら"&nbsp"で空白を表示する
          if(data.data[i].purpose === ""){
            purpose = "&nbsp";
          }else{
            purpose = data.data[i].purpose;
          }
          if(income_reason_js[data.data[i].reason] === ""){
            reason = "&nbsp";
          }else{
            reason = income_reason_js[data.data[i].reason];
          }
            var money_data =
                              '<tr><th class = "hedaer_date">取引日付</th><td>'
                            + formatDate(data.data[i].created_at)
                            + '<tr><th>入金履歴</th><td>'
                            + deposit
                            + '<tr><th>入金理由</th><td>'
                            + reason
                            + '<tr><th>出金履歴</th><td>'
                            + withdrawal
                            + '<tr><th>出金理由</th><td>'
                            + purpose
                            + '<tr><th>残高履歴</th><td>'
                            + data.data[i].total
                            +'</td></tr>';
            $("#responsive_data").append(money_data);
            total = data.data[i].total;
        }
        //ループを抜けた後にフォームを初期化
        $('#textdata').val('');
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
        if (data.withdrawal == 0) {
          alert('1円以上の金額を入力してください');
          return false;
        }
        if (data.withdrawal > total ) {
          alert('残高が足りません');
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
