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
        <h2 style="line-height: 1em;">创建试卷
          <small>(第二步：添加问题)</small>
        </h2>
        <hr />
        <h3>试卷： <?php echo safeHtml($tpl_papername); ?></h3>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">问题</h3>
          </div>
          <div class="panel-body" style="line-height: 2em;">
            <p class="text-center">还没有添加问题，从下面列表中选择问题。</p>
            <table class="table table-hover table-striped" id="paper-qlist">
              <thead>
                <tr>
                  <th style="width: 2em;">#</th><th>标题</th><th>难度</th><th class="col-xs-1"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <h4>从下面列表中选择问题</h4>
        <table class="table table-striped table-hover" id="qlist">
          <thead>
            <tr>
              <th style="width: 2em;">#</th><th>标题</th><th>难度</th><th class="col-xs-1"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tpl_questionList as $q) : ?>
            <tr data-qno="<?php echo $q['qno']; ?>">
              <td><?php echo $q['qno']; ?></td>
              <td>
                <a href="/question/<?php echo safeHtml($q['seo_title']); ?>" target="_blank">
                  <?php echo safeHtml($q['title']); ?>
                </a>
              </td>
              <td>
              <?php for ($i = 0; $i < (int)$q['difficulty']; $i++) : ?>
                <span style="color: orange" class="glyphicon glyphicon-star"></span>
              <?php endfor ?>
              </td>
              <td class="text-right">
                <button class="btn btn-success btn-xs" role="btn-add"><span class="glyphicon glyphicon-plus"></span></button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
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
<style type="text/css">
#qlist button[role=btn-add], #paper-qlist button[role=btn-add] {display: none;}
#qlist tr:hover button[role=btn-add], #paper-qlist tr:hover button[role=btn-add] {display: inline;}
</style>
<script type="text/javascript">
$().ready(function() {
  $('#qlist button[role=btn-add]').click(function() {
    var tr = $(this).parents('tr');
    var newtr = tr.clone();
    var btn = $("button[role=btn-add]", newtr);
    btn.toggleClass("btn-danger", "btn-success");
    $("span", btn).toggleClass("glyphicon-minus", "glyphicon-plus");
    newtr.appendTo($('#paper-qlist tbody'));
    tr.hide();
    btn.on('click', function() {
      var tr = $(this).parents('tr');
      var qno = tr.attr("data-qno");
      $("#qlist tr[data-qno=" + qno + "]").show();
      tr.remove();
    });
  });
});
</script>