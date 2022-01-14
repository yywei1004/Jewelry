<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0;
        }
        .msg{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="msg">
        <div>
            <h1>畫面自動轉跳中...</h1>
            <h2>請勿關閉畫面</h2>
        </div>
    </div>
    <form name='Newebpay' method='post' action='https://ccore.newebpay.com/MPG/mpg_gateway' id="tradeform" hidden>
        MerchantID：<input type='text' name='MerchantID' value='MS130041437'><br>
        TradeInfo：<input type='text' name='TradeInfo' value='{{ $TradeInfo }}'><br>
        TradeSha：<input type='text' name='TradeSha' value='{{ $TradeSha }}'><br>
        Version：<input type='text' name='Version' value='2.0'><br>
        <input type='submit' value='Submit'>
    </form>

    <script>
        document.querySelector('#tradeform').submit()
    </script>
</body>

</html>
