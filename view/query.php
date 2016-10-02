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
    <script type="text/javascript">
        function updateHref(){
            var value = document.getElementById('search_value').value;
            var a = document.getElementById('search_a');
            a.href.value= a.href.value+'/'+value;
        }
    </script>
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
        <form class="inline-form" id="search_form" role="form">
            <div class="input-group">
                <input type="text" id="search_value" class="form-control" placeholder="请输入搜索关键词">
                <span class="input-group-btn">
                    <a class="btn btn-default" id="search_a" href="/search" onclick="updateHref()">
                        Go
                    </a>
                </span>
            </div>
        </form>
        <br/>
        <div class="panel panel-default panel-content">
            <div class="panel-heading">
                <h2><?=$keyword?></h2>
            </div>
            <div class="panel-body">
                <?=$htmlContent?>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</body>

</html>
