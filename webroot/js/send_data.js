$(document).ready(function()
{
    /**
     * 送信ボタンクリック
     */
    $('#send').click(function()
    {
        var data = { 
                    deposit : $('#deposit').val(),
                    withdrawal : $('#withdrawal').val(),
                    purpose : $('#purpose').val(),
                    reason : $('#reason').val(),
                    };
        $.ajax({
            type: 'POST',
            datatype:'json',
            url: "http://localhost/okozukai_app_2/moneys/add",
            data: data,
            success: function(data,dataType)
            {
                alert('Success');
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