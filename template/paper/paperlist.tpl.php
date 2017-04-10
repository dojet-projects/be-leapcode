<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>试卷 | Leapcode</title>

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
      <div class="col-md-9">
        <div class="row">
          <div class="col-xs-12">
            <form class="form-group-lg">
              <label for="paper-code">试卷码</label>
              <div class="form-group form-inline">
                <input type="text" class="form-control" id="paper-code" placeholder="">
                <button type="submit" class="btn btn-success btn-lg">进入</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
        </div>
      </div>
      <div class="col-md-3">
        <div class="row">
          <div class="col-xs-12">
            <a href="/papers/new" class="btn btn-primary">+ 申请创建试卷</a>
          </div>
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
