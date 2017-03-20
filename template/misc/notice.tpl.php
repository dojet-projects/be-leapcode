<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
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
      <div class="row">
        <div class="col-xs-12 ">
          <div class="alert alert-warning text-center" role="alert">
            <p><?php echo ($tpl_notice); ?></p>
            <?php if (isset($tpl_links)) : ?>
              <?php foreach ($tpl_links as $link => $text) : ?>
                <p><a href="<?php echo $link; ?>" class="btn"><?php echo ($text); ?></a></p>
              <?php endforeach ?>
            <?php endif ?>
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
