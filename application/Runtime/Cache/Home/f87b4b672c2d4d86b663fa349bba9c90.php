<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <title>在线留言</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/309/public/css/bootstrap.min.css">
    <script src="/309/public/js/jquery-2.1.1.min.js"></script>
    <script src="/309/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/309/public/css/index.css">
    <style type="text/css">
        #login{
            height: auto;
            margin: 30px 7px 0 7px;
            padding: 20px 20px 10px 20px;
            background-color: #ffffff;
            box-shadow: 0 3px 3px rgba(0,0,0,.2);
        }
        @media (max-width: 767px) {
            #login{
                padding: 20px 20px 10px 20px;
            }
        }
    </style>
</head>
<script type="text/javascript">
    var index = 3;
    function changeTime()
    {
        document.getElementById("timeSpan").innerHTML = index;
        index--;
        if(index < 0){
            window.location = "<?php echo ($jumpUrl); ?>";
        }
        else{
            window.setTimeout("changeTime()",1000);
        }
    }
</script>

<body onload="changeTime()">

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="margin-top: 60px">
            <h1 style="text-align: center;color: rgba(36, 139, 210, 0.9);"><?php echo ($message); ?></h1>
            <div id="login">
                <h4 style="text-align: center">页面将在&nbsp;<span id="timeSpan"></span>&nbsp;秒后跳转</h4>
                <h4 style="text-align: center">如果没有请&nbsp;<a href="<?php echo ($jumpUrl); ?>">点击这里</a></h4>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

</body>
</html>