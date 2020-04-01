<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>309CMS</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/309/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/309/public/css/Admin/index.css">
    <script src="/309/public/js/jquery-2.1.1.min.js"></script>
    <script src="/309/public/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1 style="text-align: center">309管理后台</h1>
            <div id="login">
                <form action="/309/admin.php/Index/checkLogin" method="post">
                    <div class="form-group">
                        <label style="font-family: 'arial', '微软雅黑'">用户名</label>
                        <input class="form-control" placeholder="请输入用户名" style="font-family: '微软雅黑', '黑体'" name="username">
                    </div>
                    <div class="form-group">
                        <label style="font-family: 'arial', '微软雅黑'">密码</label>
                        <input class="form-control" placeholder="请输入密码" style="font-family: '微软雅黑', '黑体'" name="password">
                    </div>
                    <div class="form-group">
                        <label style="font-family: 'arial', '微软雅黑'">验证码</label>
                        <input class="form-control" placeholder="请输入验证码" style="font-family: '微软雅黑', '黑体'" name="checkcode"/>
                        <div style="margin-top: 10px">
                            <img id="myImg" src="/309/admin.php/Index/showcode" onclick="changeImage()" style="cursor:pointer;"title="看不清换一张" alt="看不清换一张"  align="middle"/>
                            <a onclick="changeImage()" style="cursor: pointer">看不清，换一张</a></div>
                    </div>
                    <button type="submit" class="btn btn-info" style="width: 100%;font-family: 'arial', '微软雅黑'">登录</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<script>
    function changeImage(){
        document.getElementById("myImg").src="/309/admin.php/Index/showcode?id="+new Date();
    }
</script>

</body>
</html>