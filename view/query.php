<!DOCTYPE html>
<html  ng-app="app">

<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--极速模式-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>CCFpedia</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/mobile/css/main.css" rel="stylesheet">
    <link href="/mobile/css/angucomplete.css">
    <script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="//cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.bootcss.com/angular.js/1.2.0/angular.min.js"></script>
    <script src="//cdn.bootcss.com/angular.js/1.2.0/angular-touch.min.js"></script>
    <script src="/mobile/js/angucomplete.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('.wikitable').css('width','100%');
            $('.wikitable').addClass('table-bordered');
            var tables = $('.wikitable');
            for(var i=0;i<tables.length;i++){
                var tbody = $("<tbody></tbody>");
                var tds = $(tables[i]).find('td');
                for(var j=0;j<tds.length-1;j=j+2){
                    var tr = $("<tr></tr>");
                    tr.append(tds[j]);
                    tr.append(tds[j+1]);
                    tbody.append(tr);
                }
                $($(tables[i]).children()).remove();
                $(tables[i]).append(tbody);
            }
        })
    </script>
    <script type="text/javascript">
        var app = angular.module('app', ["ngTouch", "angucomplete"]);
        app.controller('MainCtrl',function($scope){
            $scope.goSearch = function goSearch(){
                var keyword = '首页';
                if($scope.selected == null){
                    keyword = $('#search_input_value').val();
                }else {
                    keyword = $scope.selected.title;
                }
                var searchForm = document.getElementById('search_form');
                searchForm.action = '/mobile/search/' +keyword + '/';
                searchForm.submit();
            }
        });
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
                <a class="navbar-brand" href="/mobile/首页" style="width:80px;padding: 0">
                    <img class="img-brand" alt="Brand" src="/mobile/images/ccflogo.png">
                </a>
                <div class="collapse navbar-collapse" id="example-nav-collapse">
                    <ul class="nav navbar-nav nav-menu">
                    </ul>
                </div>
            </div>
         </div>
    </nav>
    <div class="container main-content" ng-controller="MainCtrl">
        <form class="inline-form" id="search_form" onsubmit="goSearch()" role="form" method="post" autocomplete="off">
            <div class="input-group">
                <angucomplete id="search_input" placeholder="请输入搜索关键词" pause="400" selectedObject="selected"
                              url="/mobile/ajax_search?s=" titlefield="name" inputclass="form-control" minlength="1">
                </angucomplete>
                <span class="input-group-btn">
                    <a class="btn btn-default" id="search_btn" ng-click="goSearch()" style="float: right">
                        Go
                    </a>
                </span>
            </div>
        </form>
        <br/>
        <div class="panel panel-default panel-content">
            <div class="panel-heading">
                <h3><?=$keyword?></h3>
            </div>
            <div class="panel-body" style="font-size: 16px;">
                <?=$htmlContent?>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <h4>总词条数:<?=$statistics['articles']?></h4>
                    </div>
                    <div class="col-xs-6">
                        <h4>总编辑数:<?=$statistics['edits']?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h4>访问数:<?=$statistics['views']?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
