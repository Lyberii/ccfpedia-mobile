<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--极速模式-->
<meta name="renderer" content="webkit"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CCFpedia</title>
<!--common-css-->
<link rel="stylesheet" href="lib/bootstrap-3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css"/>
<!--jquery-->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery.inputmask.bundle.min.js"></script>
<!-- load angular-->
<script src="lib/angular-1.5.5/angular.min.js"></script>
<script src="lib/angular-1.5.5/angular-animate.min.js"></script>
<script src="lib/angular-1.5.5/angular-resource.min.js"></script>
<script src="lib/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script src="js/ccfmobile.js"></script>
</head>
<body ng-app="main" ng-controller="mainCtrl">
	<div class="container">
		<div ng-model="test">{{content}}</div>
	</div>
</body>
</html>