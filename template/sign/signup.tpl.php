
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>注册</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php include TEMPLATE.'mod/nav.tpl.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-offset-4">
          <form action="/signup-commit" id="form-signup" method="post">
            <h2>注册</h2>
            <div class="form-group">
              <label for="email">邮箱</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input type="text" name="nickname" class="form-control" id="nickname" placeholder="你在网站上的称呼">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">注册Leapcode</button>
            <a href="/signin" class="btn pull-right">&raquo; 已注册，登录</a>
          </form>
        </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
