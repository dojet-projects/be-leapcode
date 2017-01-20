<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Leapcode</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php include TEMPLATE.'mod/nav.tpl.php'; ?>

    <div class="container">
      <div class="col-xs-9">

        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th><th>标题</th><th>难度</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tpl_questionList as $q) : ?>
            <tr>
              <td><?php echo $q['qno']; ?></td>
              <td>
                <a href="/question/<?php echo $q['qno']; ?>">
                  <?php echo safeHtml($q['title']); ?>
                </a>
              </td>
              <td><?php echo $q['difficulty']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/jquery/jquery-3.1.1.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>