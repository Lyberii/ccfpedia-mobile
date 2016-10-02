<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--极速模式-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>CCFpedia</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-nav-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="width:80px;padding: 0">
                    <img class="img-brand" alt="Brand" src="../images/ccflogo.png">
                </a>
                <div class="collapse navbar-collapse" id="example-nav-collapse">
                    <ul class="nav navbar-nav nav-menu">
                    </ul>
                </div>
            </div>
         </div>
    </nav>
    <div class="container main-content">
        <h4>本wiki上有/无名为“XXXX”的页面</h4>
        <div class="panel panel-default panel-content" <?php if (false) {print "hidden='hidden'";}?>>
            <div class="panel-heading">
                <h5>页面标题匹配</h5>
            </div>
            <div class="panel-body">
                <h5>内容</h5>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6" style="text-align: center">
                        <a href="" style="margin: 0 auto;"><h4>上一页</h4></a>
                    </div>
                    <div class="col-xs-6" style="text-align:center">
                        <a href=""><h4>下一页</h4></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default panel-content" <?php if (false) {print "hidden='hidden'";}?>>
            <div class="panel-heading">
                <h5>页面内容匹配</h5>
            </div>
            <div class="panel-body">
                <h5>内容</h5>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6" style="text-align: center">
                        <a href=""><h4>上一页</h4></a>
                    </div>
                    <div class="col-xs-6" style="text-align: center">
                        <a href=""><h4>下一页</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>

</script>
</html>