<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--极速模式-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>CCFpedia</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="/mobile/css/main.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .navbar-brand {
            width: 80px;
            padding: 0;
        }
        .img-brand {
            width: 50px;
            height: 50px;
            margin: 0 auto;
        }
        li {
            list-style-type: none;
        }
        .search-results {
            padding-left: 0;
            font-size: 16px;
        }
        .search-results li{
            margin-bottom: 15px;
        }
        .search-result-data {
            color: green;
        }
    </style>
    <script type="text/javascript">
        function goSearch(){
            var searchText = document.getElementById('search_value').value;
            var searchForm = document.getElementById('search_form');
            searchForm.action = '/mobile/search/' + searchText + '/';
            searchForm.submit();
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
                <a class="navbar-brand" href="/mobile/首页">
                    <img class="img-brand" alt="Brand" src="/mobile/images/ccflogo.png">
                </a>
                <div class="collapse navbar-collapse" id="example-nav-collapse">
                    <ul class="nav navbar-nav nav-menu">
                    </ul>
                </div>
            </div>
         </div>
    </nav>
    <div class="container main-content">
        <form class="inline-form" id="search_form" onsubmit="goSearch()" role="form" method="post">
            <div class="input-group">
                <input type="text" id="search_value" class="form-control" placeholder="请输入搜索关键词">
                <span class="input-group-btn">
                    <a class="btn btn-default" id="search_btn" onclick="goSearch()">
                        Go
                    </a>
                </span>
            </div>
        </form>
        <br/>
        <? if ( (isset($searchResult['title']) && $searchResult['title']) || (isset($searchResult['text']) && $searchResult['text'])) { ?>
            <h4>本wiki上有名为"<?=$keyword?>"的相关页面</h4>
            <div class="panel panel-default panel-content">
                <div class="panel-heading">
                    <h4>按页面标题匹配</h4>
                </div>
                <div class="panel-body">
                    <ul class="search-results">
                        <? foreach ($searchResult['title'] as $item) { ?>
                            <li>
                                <div class="search-result-heading">
                                    <a href="/mobile/<?=$item['title']?>" title="<?=$item['title']?>"><?=$item['title']?></a>
                                </div>
                                <div class="search-results"><?=$item['snippet']?></div>
                                <div class="search-result-data"><?=CCFApi::sizeInterpret($item['size'])?>（<?=$item['wordcount']?>个字）- <?=CCFApi::timeInterpret($item['timestamp'])?></div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default panel-content">
                <div class="panel-heading">
                    <h4>按页面内容匹配</h4>
                </div>
                <div class="panel-body">
                    <ul class="search-results">
                        <? foreach ($searchResult['text'] as $item) { ?>
                            <li>
                                <div class="search-result-heading">
                                    <a href="/mobile/<?=$item['title']?>" title="<?=$item['title']?>"><?=$item['title']?></a>
                                </div>
                                <div class="search-results"><?=$item['snippet']?></div>
                                <div class="search-result-data"><?=CCFApi::sizeInterpret($item['size'])?>（<?=$item['wordcount']?>个字）- <?=CCFApi::timeInterpret($item['timestamp'])?></div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6" style="text-align: center">
                            <a href="/mobile/search/<?=$keyword?>?offset=<?=$offset - $limit > 0 ?: 0?>&limit=<?=$limit?>"><h4>上一页</h4></a>
                        </div>
                        <div class="col-xs-6" style="text-align: center">
                            <a href="/mobile/search/<?=$keyword?>?offset=<?=$offset + $limit?>&limit=<?=$limit?>"><h4>下一页</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        <? } else { ?>
            <h4>本wiki上无名为"<?=$keyword?>"的相关页面</h4>
        <? } ?>
    </div>
</body>
<script>

</script>
</html>