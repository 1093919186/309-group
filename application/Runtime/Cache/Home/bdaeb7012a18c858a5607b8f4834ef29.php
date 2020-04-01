<?php if (!defined('THINK_PATH')) exit();?><html>

<title>实验室概况</title>

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
                <li><a href="/309/index.php?s=Index/index">首页</a></li>
                <li><a href="/309/index.php?s=Lab/index">实验室概况</a></li>
                <li><a href="/309/index.php?s=News/index">新闻动态</a></li>
                <li><a href="/309/index.php?s=Teachers/index">师资力量</a></li>
                <li><a href="/309/index.php?s=Students/index">研究生培养</a></li>
                <li><a href="/309/index.php?s=SciFruits/index">科研成果</a></li>
                <li><a href="/309/index.php?s=Writings/index">论著专利</a></li>
                <li><a href="/309/index.php?s=Academic/index">学术交流</a></li>
                <li><a href="/309/index.php?s=Affairs/index">通知公告</a></li>
            </ul>
        </div>
    </nav>
</div>

            <ul class="nav nav-tabs" id="myTab" style="margin: 10px 0 10px 0;">
                <li class="active"><a href="#hello" data-toggle="tab">实验室介绍</a></li>
                <li><a href="#this" data-toggle="tab">研究条件</a></li>
                <li><a href="#world" data-toggle="tab">联系方式</a></li>
            </ul>

            <div style="padding: 20px;background-color: #fff">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active" id="hello">
                        <p>
                            Follow our 本人性格开朗，善于微笑长于交际，会简单日语及芭蕾舞。我相信，这一切将成为我工作最大的财富。我在很久就注意到贵公司，贵公司无疑是___行业中的姣姣者(将你所了解的公司荣誉或成果填上)。同时我又了解到，这又是一支年轻而又富有活力的队伍。本人十分渴望能够在为其中的一员。
                        </p>
                        <p>
                            Follow our 本人性格开朗，善于微笑长于交际，会简单日语及芭蕾舞。我相信，这一切将成为我工作最大的财富。我在很久就注意到贵公司，贵公司无疑是___行业中的姣姣者(将你所了解的公司荣誉或成果填上)。同时我又了解到，这又是一支年轻而又富有活力的队伍。本人十分渴望能够在为其中的一员。
                        </p>
                        <p>
                            Follow our 本人性格开朗，善于微笑长于交际，会简单日语及芭蕾舞。我相信，这一切将成为我工作最大的财富。我在很久就注意到贵公司，贵公司无疑是___行业中的姣姣者(将你所了解的公司荣誉或成果填上)。同时我又了解到，这又是一支年轻而又富有活力的队伍。本人十分渴望能够在为其中的一员。
                        </p>
                        <p>
                            Follow our 本人性格开朗，善于微笑长于交际，会简单日语及芭蕾舞。我相信，这一切将成为我工作最大的财富。我在很久就注意到贵公司，贵公司无疑是___行业中的姣姣者(将你所了解的公司荣誉或成果填上)。同时我又了解到，这又是一支年轻而又富有活力的队伍。本人十分渴望能够在为其中的一员。
                        </p>
                    </div>
                    <div class="tab-pane fade" id="this">
                        <h3>尚无资料</h3>
                    </div>
                    <div class="tab-pane fade" id="world">
                        <p>地址：长沙市岳麓区麓山南路932号中南大学和平楼</p>
                        <p>邮编：410083</p>
                        <p>电话：0731-88879299</p>
                        <p>传真：0731-88879299</p>
                        <p>邮箱：zhiyong.gao@csu.edu.cn</p>
                    </div>
                </div>
            </div>

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