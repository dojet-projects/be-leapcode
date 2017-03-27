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
      <div class="col-md-12">
        <h3><span class="glyphicon glyphicon-tag"></span> <?php echo safeHtml($tpl_tag['tagname']); ?></h3>
        <table class="table table-striped ">
          <thead>
            <tr>
              <th style="width: 3em;"></th><th style="width: 2em;">#</th><th>标题</th><th>难度</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tpl_questionList as $q) : ?>
            <tr>
              <td>
                <?php
                if ($tpl_is_signin) :
                  if (key_exists($q['qno'], $tpl_accepted)) :
                ?>
                  <span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>
                <?php
                  endif;
                endif;
                ?>
              </td>
              <td><?php echo $q['qno']; ?></td>
              <td>
                <a href="/question/<?php echo safeHtml($q['seo_title']); ?>">
                  <?php echo safeHtml($q['title']); ?>
                </a>
              </td>
              <td>
              <?php for ($i = 0; $i < (int)$q['difficulty']; $i++) : ?>
                <span style="color: orange" class="glyphicon glyphicon-star"></span>
              <?php endfor ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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
