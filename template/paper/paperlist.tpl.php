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
            <table class="table table-striped ">
              <thead>
                <tr>
                  <th style="width: 2em;">#</th><th>标题</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tpl_recommend_papers as $pid => $p) : ?>
                <tr>
                  <td><?php echo $pid; ?></td>
                  <td>
                    <a href="/paper/<?php echo $pid; ?>">
                      <?php echo safeHtml($p['papername']); ?>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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
