<?php if (!defined('THINK_PATH')) exit();?><html>

<title>在读博士</title>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="/309/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/309/public/js/jquery-2.1.1.min.js"></script>
    <script src="/309/public/js/bootstrap.min.js"></script>
    <script src="/309/public/js/public.js"></script>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/309/public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/309/public/css/public.css">
</head>

<body class="body-home">

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10">
            <header><img src="/309/public/images/官网header.jpg" class="img-responsive" style="width: 100%"></header>

            <div style="background-color:rgba(36, 139, 210, 0.9);">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/309/index.php/Index/index">首页</a></li>
                <li><a href="/309/index.php/Lab/index">实验室概况</a></li>
                <li><a href="/309/index.php/Teachers/index">师资力量</a></li>
                <li><a href="/309/index.php/Students/index">研究生培养</a></li>
                <li><a href="/309/index.php/SciFruits/index">科研成果</a></li>
                <li><a href="/309/index.php/Writings/index">论著专利</a></li>
                <li><a href="/309/index.php/Academic/index">学术交流</a></li>
                <li><a href="/309/index.php/Affairs/index">通知公告</a></li>
                <li><a href="/309/index.php/Contribute/index">在线留言</a></li>
            </ul>
        </div>
    </nav>
</div>

            <div class="col-md-3" id="left-list">
                <div class="list-group" style="text-align: center">
                    <a href="/309/index.php/Students/index" class="list-group-item" >毕业博士</a>
                    <a href="/309/index.php/Students/readdoctor" class="list-group-item active" >在读博士</a>
                    <a href="/309/index.php/Students/master" class="list-group-item" >毕业硕士</a>
                    <a href="/309/index.php/Students/readmaster" class="list-group-item" >在读硕士</a>
                </div>
            </div>

            <!--右侧-->
            <div class="col-md-9">
                <ul class="breadcrumb" style="background: url('/309/public/images/小导航.jpg');">
                    <li>309</li>
                    <li>研究生培养</li>
                    <li>在读博士</li>
                </ul>
                <?php if(is_array($readdoctor)): foreach($readdoctor as $key=>$v): ?><div class="col-md-4" style="text-align: center">
                    <img src="/309/<?php echo ($v["imgpath"]); ?>" class="img-thumbnail" style="width: 80%">
                    <h5><a href="/309/index.php/Teachers/details/cid/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a></h5>
                </div><?php endforeach; endif; ?>
            </div>
            <!--end-->

            <footer id="footer" class="col-md-12">
    <div class="footer">
        <div class="col-md-5">
            <p style="color: #fff">联系我们</p>
            <ul class="list-unstyled">
                <li>地址：<?php echo ($contact["address"]); ?></li>
                <li>邮编：<?php echo ($contact["code"]); ?></li>
                <li>电话：<?php echo ($contact["phone"]); ?></li>
                <li>传真：<?php echo ($contact["fax"]); ?></li>
                <li>邮箱：<?php echo ($contact["email"]); ?></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <p style="color: #fff">友情链接</p>
            <ul class="list-unstyled">
                <li><a href="http://www.csu.edu.cn/" target="_blank">中南大学</a></li>
                <li><a href="http://mpb.csu.edu.cn/" target="_blank">中南大学资生院</a></li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <p style="color: #fff">官方微信公众号</p>
            <img src="/309/<?php echo ($erweima["imgpath"]); ?>" class="img-responsive">
        </div>
    </div>
</footer>

        </div>

        <div class="col-md-1"></div>
    </div>
</div>

<div id="置顶键" style="display: none;">
    <img src="/309/public/images/返回顶部.jpg" class="小图标">
</div>

</body>
</html>