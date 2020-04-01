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
                <a href="/309/admin.php/AdmAca/index" class="list-group-item active" style="font-family: '微软雅黑', '黑体'">国际学术交流</a>
                <a href="/309/admin.php/AdmAca/nationAca" class="list-group-item" style="font-family: '微软雅黑', '黑体'">国内学术交流</a>
            </div>
        </div>
        <!--end-->
        <!--右侧-->
        <div class="col-md-9 col-sm-7">
            <ul class="breadcrumb">
                <li>309CMS</li>
                <li style="font-family: '微软雅黑', '黑体'">学术交流</li>
                <li class="active" style="font-family: '微软雅黑', '黑体'">国际学术交流</li>
            </ul>
            <form action="/309/admin.php/AdmAca/upacaend/aid/<?php echo ($inter["id"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">标题</label>
                    <input class="form-control" value="<?php echo ($inter["title"]); ?>" style="font-family: '微软雅黑', '黑体'" name="title">
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">摘要</label>
                    <textarea class="form-control" rows="3" style="font-family: '微软雅黑', '黑体'" name="header"><?php echo ($inter["header"]); ?></textarea>
                </div>
                <div class="form-group">
                    <label style="font-family: 'arial', '微软雅黑'">图片</label>
                    <input type="file" id="exampleInputFile" name="imgpath">
                </div>
                <div id="main" role="main">
                    <label style="font-family: 'arial', '微软雅黑'">内容</label>
                    <div id="simple-editor" style="font-family: '微软雅黑', '黑体'">
                        <?php echo ($inter["content"]); ?>
                    </div>
                </div>
                <select class="form-control" style="font-family: '微软雅黑', '黑体'" name="type">
                    <?php if($inter["type"] == 0): ?><option selected="selected">国际学术交流</option>
                        <option>国内学术交流</option>
                    <?php else: ?>
                        <option>国际学术交流</option>
                        <option selected="selected">国内学术交流</option><?php endif; ?>
                </select>
                <br>
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

<script src="http://www.jq22.com/jquery/1.8.3/jquery.min.js"></script>
<script src="/309/library/trumbowyg/trumbowyg.js"></script>
<script src="/309/library/trumbowyg/langs/fr.js"></script>
<script src="/309/library/trumbowyg/plugins/upload/trumbowyg.upload.js"></script>
<script src="/309/library/trumbowyg/plugins/base64/trumbowyg.base64.js"></script>
<script>
    /** Default editor configuration **/
    $('#simple-editor').trumbowyg();
    /********************************************************
     * Customized button pane + buttons groups + dropdowns
     * Use upload plugin
     *******************************************************/
    /*
     * Add your own groups of button
     */
    $.trumbowyg.btnsGrps.test = ['bold', 'link'];
    /* Add new words for customs btnsDef just below */
    $.extend(true, $.trumbowyg.langs, {
        fr: {
            align: 'Alignement',
            image: 'Image'
        }
    });
    $('#customized-buttonpane').trumbowyg({
        lang: 'fr',
        closable: true,
        fixedBtnPane: true,
        btnsDef: {
            // Customizables dropdowns
            align: {
                dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ico: 'justifyLeft'
            },
            image: {
                dropdown: ['insertImage', 'upload', 'base64'],
                ico: 'insertImage'
            }
        },
        btns: ['viewHTML',
            '|', 'formatting',
            '|', 'btnGrp-test',
            '|', 'align',
            '|', 'btnGrp-lists',
            '|', 'image']
    });
    /** Simple customization with current options **/
    $('#form-content').trumbowyg({
        lang: 'fr',
        closable: true,
        mobile: true,
        fixedBtnPane: true,
        fixedFullWidth: true,
        semantic: true,
        resetCss: true,
        autoAjustHeight: true,
        autogrow: true
    });
    $('.editor').on('dblclick', function(e){
        $(this).trumbowyg({
            lang: 'fr',
            closable: true,
            fixedBtnPane: true
        });
    });
</script>

</body>
</html>