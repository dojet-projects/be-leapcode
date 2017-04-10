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
      <div class="col-md-8">
        <h2 style="">创建试卷</h2>
        <hr />
        <form class="form-horizontal" method="post" action="/papers/new/question">
          <div class="form-group">
            <label for="papername" class="col-sm-2 control-label">试卷名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="papername" name="papername" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="paperintro" class="col-sm-2 control-label">试卷说明</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="8" id="paperintro" name="paperintro" placeholder=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="papertype" class="col-sm-2 control-label">试卷类型</label>
            <div class="col-sm-10">
              <label class="radio-inline col-xs-5">
                <input type="radio" name="papertype" value="public" /> 开放试卷
                <p class="text-muted help-block">任何人都可见。</p>
              </label>
              <label class="radio-inline col-xs-5">
                <input type="radio" name="papertype" value="private" /> 私有试卷
                <p class="text-muted help-block">只有被邀请的人才可打开试卷。</p>
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">下一步</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-4">
        <p></p>
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
