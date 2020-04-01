<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>中南大学309课题组</title>
    <!-- Bootstrap -->
    <link href="/309/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="/309/public/js/jquery-2.1.1.min.js"></script>
    <script src="/309/public/js/bootstrap.min.js"></script>
    <script src="/309/public/js/public.js"></script>
    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="/309/public/css/index.css">
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

            <div class="col-md-12">

                <div class="news"><a href="/309/index.php/News/index">新闻动态</a></div>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="<?php echo ($toutu["links"]); ?>"><img src="/309/<?php echo ($toutu["imgpath"]); ?>" alt="..." style="width: 100%;height:auto"></a>
                            <!--<div class="carousel-caption">
                                <p>第一张说明</p>
                            </div>-->
                        </div>
                        <?php if(is_array($lunbo)): foreach($lunbo as $key=>$v): ?><div class="item">
                            <a href="<?php echo ($v["links"]); ?>"><img src="/309/<?php echo ($v["imgpath"]); ?>" alt="..." style="width: 100%;height:auto"></a>
                        </div><?php endforeach; endif; ?>
                    </div>

                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="news"><a href="/309/index.php/Academic/index">更多学术交流</a></div>
                <div style="width: 100%;height: auto;border-top: 1px solid rgba(36, 139, 210, 0.9);">
                    <?php if(is_array($academic)): foreach($academic as $key=>$v): ?><div class="col-md-4" style="text-align: center;background-color:#fff">

                        <a href="/309/index.php/Academic/details/cid/<?php echo ($v["id"]); ?>"><img src="/309/<?php echo ($v["imgpath"]); ?>" style="width: 90%;margin-bottom: 10px;height: 180px"><br></a>
                            <a href="/309/index.php/Academic/details/cid/<?php echo ($v["id"]); ?>"><?php echo (mb($v["title"])); ?>...</a>
                            <p><?php echo (mbtime($v["dateandtime"])); ?></p>

                    </div><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news"><a href="/309/index.php/Writings/chinapaper">中文论文</a></div>
                <div style="width: 100%;height: 235px;background-color:#fff;border-top: 1px solid rgba(36, 139, 210, 0.9);">
                    <ul class="inform">
                        <?php if(is_array($chpaper)): foreach($chpaper as $key=>$v): ?><li><a href="/309/index.php/Writings/details/cid/<?php echo ($v["id"]); ?>"><?php echo (mb($v["title"])); ?>...</a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news"><a href="/309/index.php/Writings/englishpaper">英文论文</a></div>
                <div style="width: 100%;height: 235px;background-color:#fff;border-top: 1px solid rgba(36, 139, 210, 0.9);">
                    <ul class="inform">
                        <?php if(is_array($enpaper)): foreach($enpaper as $key=>$v): ?><li><a href="/309/index.php/Writings/details/cid/<?php echo ($v["id"]); ?>"><?php echo (mbe($v["title"])); ?>...</a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news" style="background: none;background-color: #f8b300"><a style="color: white" href="/309/index.php/Writings/englishpaper">通知公告</a></div>
                <div style="width: 100%;height: 235px;background-color:#f8b300;border-top: 1px solid #f8b300">
                    <!--<ul class="inform">
                        <?php if(is_array($enpaper)): foreach($enpaper as $key=>$v): ?><li><a href="/309/index.php/Writings/details/cid/<?php echo ($v["id"]); ?>"><?php echo (mbe($v["title"])); ?>...</a></li><?php endforeach; endif; ?>
                    </ul>-->
                    <ul class="inform">
                        <?php if(is_array($info)): foreach($info as $key=>$v): ?><li><a style="color: white" href="/309/index.php/Affairs/details/cid/<?php echo ($v["infoid"]); ?>"><?php echo (mb($v["title"])); ?>...</a></li><?php endforeach; endif; ?>
                    </ul>
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