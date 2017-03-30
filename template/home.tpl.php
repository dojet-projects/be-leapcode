<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="Leapcode在线编程 | 这里汇集了一些算法编程的挑战试题。一些公司面试的编程问题。以及一些可能用到的算法技巧。">
    <meta name="keywords" content="编程, 面试题, 在线评测, 算法, 数据结构, 面试, 代码">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Leapcode</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/sticky-footer.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php include TEMPLATE.'mod/nav.tpl.php'; ?>

    <div class="container">
      <div class="row jumbotron">
        <div class="col-xs-12 ">
          <h2>Leapcode在线编程</h2>
          <p>这里汇集了一些算法编程的挑战试题。</p>
          <p>一些公司面试的编程问题。</p>
          <p>以及一些可能用到的算法技巧。</p>
<?php if ($tpl_is_signin) : ?>
          <p class="text-muted">点击下方按钮开始吧！</p>
          <a href="/question-list" class="btn btn-primary btn-lg">开始挑战！</a>
<?php else : ?>
          <div class="row">
            <form class="form signup-form" method="POST" action="/signup-commit">
              <div class="col-md-3 no-padding-left-md">
                <div class="form-group"><input autofocus="autofocus" id="id_username" maxlength="150" minlength="1" name="nickname" placeholder="昵称" type="text" required="" class="form-control input-lg"></div>
              </div>
              <div class="col-md-3 no-padding-left-md">
                <div class="form-group"><input id="id_email" name="email" placeholder="邮箱" type="email" required="" class="form-control input-lg"></div>
              </div>
              <div class="col-md-3 no-padding-left-md">
                <div class="form-group"><input id="id_password1" name="password" placeholder="密码" type="password" required="" class="form-control input-lg"></div>
              </div>
              <div class="col-md-3 no-padding-left-md">
                <button class="btn btn-primary btn-lg" type="submit">注册<span class="hidden-md"> Leapcode</span></button>
              </div>
            </form>
          </div>
<?php endif ?>
        </div>
      </div>
    </div><!-- /.container -->

    <?php include TEMPLATE.'mod/footer.tpl.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/jquery/jquery-3.1.1.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
