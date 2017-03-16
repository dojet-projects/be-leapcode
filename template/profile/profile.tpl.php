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
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    基本信息
                </h3>
            </div>
            <div class="panel-body">
              <?php echo safeHtml($tpl_leapUser->nickname()) ?>
            </div>
          </div>
        </div>
        <div class="col-xs-8">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                最近完成的问题
              </h3>
            </div>
            <ul class="list-group">
            <?php foreach ($tpl_latestAccepted as $accepted) : ?>
              <?php
                    $qno = $accepted['qno'];
                    $question = $tpl_questions[$qno];
              ?>
                <a href="/question/<?php echo safeHtml($question['seo_title'])?>" class="list-group-item">
                  <!-- <span class="badge progress-bar-success">
                    Accepted
                  </span> -->
                  <?php foreach ($accepted['lang'] as $lang) : ?>
                  <span class="badge progress-bar-info">
                    <?php echo safeHtml($lang)?>
                  </span>
                  <?php endforeach ?>
                  <b><?php echo safeHtml($question['title'])?></b> &nbsp;
                  <span class="text-muted">
                    <?php echo safeHtml($accepted['updatetime'])?>
                  </span>
                </a>
            <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div> <!-- /.row -->
    </div><!-- /.container -->

    <?php include TEMPLATE.'mod/footer.tpl.php'; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/jquery/jquery-3.1.1.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
