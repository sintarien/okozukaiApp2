// $(function() {
//     get();
// });

// function get(){
//     $.getJSON("http://localhost/okozukai_app_2/moneys/get.json", function(data){
//         $("#data").empty();
//         for(var i in data.data){
//             // alert(data.data[i].text);
//             var h = '<dt>'
//                     + data.data[i].text
//                     + '</dt>'
//             $("#data").append(h);
//             $('#textdata').val('');

//         }
//     })
// }

// $(document).ready(function()
// {
//     /**
//      * 送信ボタンクリック
//      */
//     $('#deposit_send').click(function()
//     {
//         var data = { 
//                     deposit : $('#deposit').val(),
//                     withdrawal : $('#withdrawal').val(),
//                     purpose : $('#purpose').val(),
//                     reason : $('#reason').val(),
//                     };
//         $.ajax({
//             type: 'POST',
//             datatype:'json',
//             url: "http://localhost/okozukai_app_2/moneys/add",
//             data: data,
//             success: function(data,dataType)
//             {
//                 get();
//                 alert('Success');
//                 //モーダルを消す
//                 $('#deposit_modal').modal('hide');
//                 //フォームの中身を初期化
//                 $('#deposit').val("");
//                 $('#reason').val("");
//                 $('#withdrawal').val("");
//                 $('#purpose').val("");
//             },
//             /**
//              * Ajax通信が失敗した場合に呼び出されるメソッド
//              */
//             error: function(XMLHttpRequest, textStatus, errorThrown)
//             {
//                 alert('Error : ' + errorThrown);
//             }
//         });
//         return false;
//     });
// });

// $(document).ready(function()
// {
//     /**
//      * 送信ボタンクリック
//      */
//     $('#withdrawal_send').click(function()
//     {
//         var data = { 
//                     deposit : $('#deposit').val(),
//                     withdrawal : $('#withdrawal').val(),
//                     purpose : $('#purpose').val(),
//                     reason : $('#reason').val(),
//                     };
//         $.ajax({
//             type: 'POST',
//             datatype:'json',
//             url: "http://localhost/okozukai_app_2/moneys/add",
//             data: data,
//             success: function(data,dataType)
//             {
//                 get();
//                 alert('Success');
//                 //モーダルを消す
//                 $('#withdrawal_modal').modal('hide');
//                 //フォームの中身を初期化
//                 $('#deposit').val("");
//                 $('#reason').val("");
//                 $('#withdrawal').val("");
//                 $('#purpose').val("");
//             },
//             /**
//              * Ajax通信が失敗した場合に呼び出されるメソッド
//              */
//             error: function(XMLHttpRequest, textStatus, errorThrown)
//             {
//                 alert('Error : ' + errorThrown);
//             }
//         });
//         return false;
//     });
// });

