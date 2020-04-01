<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>309CMS</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="/309/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/309/public/css/Admin/adminindex.css">
	<link rel="stylesheet" href="/309/library/trumbowyg/design/css/trumbowyg.css">
	<script src="/309/public/js/jquery-2.1.1.min.js"></script>
	<script src="/309/public/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/309/public/css/public.css">
</head>

<body>
<!--导航-->
<div class="myheading">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="/309/admin.php/AdmAffairs/index" class="navbar-brand">309CMS</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mytab" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="mytab" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/309/admin.php/AdmAffairs/index" style="font-family: '微软雅黑', '黑体'">内容管理</a></li>
                    <li><a href="/309/admin.php/AdmFruits/index" style="font-family: '微软雅黑', '黑体'">科研成果</a></li>
                    <li><a href="/309/admin.php/AdmPeople/index" style="font-family: '微软雅黑', '黑体'">人物管理</a></li>
                    <li><a href="/309/admin.php/AdmWritings/index" style="font-family: '微软雅黑', '黑体'">论著专利</a></li>
                    <li><a href="/309/admin.php/AdmAca/index" style="font-family: '微软雅黑', '黑体'">学术交流</a></li>
                    <li><a href="/309/admin.php/AddContent/index" style="font-family: '微软雅黑', '黑体'">发布内容</a></li>
                    <li><a href="/309/admin.php/AdmImg/index" style="font-family: '微软雅黑', '黑体'">图片管理</a></li>
                </ul>

                <a href="/309/admin.php/Index/out" class="btn btn-default navbar-right navbar-btn">Go out</a>
                <form class="navbar-form navbar-right" role="search" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="input please">
                    </div>
                    <button type="submit" class="btn btn-default">search</button>
                </form>
            </div>
        </div>
    </nav>
</div>
<!--end-->

<!--content-->
<div class="container" id="content">
    <div class="row">
        <!--left-->
        <div class="col-md-3 col-sm-5">
            <div class="list-group">
                <a href="/309/admin.php/AdmAffairs/index" class="list-group-item" style="font-family: '微软雅黑', '黑体'">公告管理</a>
                <a href="/309/admin.php/AdmAffairs/news" class="list-group-item" style="font-family: '微软雅黑', '黑体'">新闻管理</a>
                <a href="/309/admin.php/AdmAffairs/message" class="list-group-item" style="font-family: '微软雅黑', '黑体'">留言管理</a>
                <a href="/309/admin.php/AdmAffairs/contact" class="list-group-item active" style="font-family: '微软雅黑', '黑体'">联系方式</a>
            </div>
        </div>
        <!--end-->
        <!--右侧-->
        <div class="col-md-9 col-sm-7">
            <ul class="breadcrumb">
                <li>309CMS</li>
                <li style="font-family: '微软雅黑', '黑体'">内容管理</li>
                <li class="active" style="font-family: '微软雅黑', '黑体'">联系我们</li>
            </ul>
            <form action="/309/admin.php/AdmAffairs/upcontact" method="post">
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">地址</label>
                    <input class="form-control" placeholder="请输入地址" style="font-family: '微软雅黑', '黑体'" value="<?php echo ($contact["address"]); ?>" name="address">
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">邮编</label>
                    <input class="form-control" placeholder="请输入邮编" style="font-family: '微软雅黑', '黑体'" value="<?php echo ($contact["code"]); ?>" name="code">
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">电话</label>
                    <input class="form-control" placeholder="请输入电话" style="font-family: '微软雅黑', '黑体'" value="<?php echo ($contact["phone"]); ?>" name="phone">
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">传真</label>
                    <input class="form-control" placeholder="请输入传真" style="font-family: '微软雅黑', '黑体'" value="<?php echo ($contact["fax"]); ?>" name="fax">
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">邮箱</label>
                    <input class="form-control" placeholder="请输入邮箱" style="font-family: '微软雅黑', '黑体'" value="<?php echo ($contact["email"]); ?>" name="email">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
<!--end-->

<!--footer-->
<div class="footer">
    <a style="font-family: '微软雅黑', '黑体'" href="#">309官网：http：//www.baidu.com</a>
</div>

<script>
    $("#mytab a").click(function(e){
        //       e.preventDefault();
        $(this).tab("show");
    });
</script>
<!--end-->

</body>
</html>