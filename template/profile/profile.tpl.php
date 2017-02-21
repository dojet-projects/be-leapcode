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
        <div class="col-xs-12 ">
          <h3 style="margin-bottom: 1em;">我的信息</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    基本信息
                </h3>
            </div>
            <div class="panel-body">
              <form class="form-inline" action="/profile/save-nickname" method="POST">
                <div class="form-group">
                    <label for="input-nickname" style="display: block;">昵称</label>
                    <input type="text" name="nickname" id="input-nickname" value="<?php echo safeHtml($tpl_me->nickname()) ?>" maxlength="30" class="form-control">
                    <button type="submit" id="nickname_save" class="btn btn-primary">保存</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-8">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    个人信息
                </h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                   <label class="col-sm-2 control-label">真实姓名</label>
                   <div class="col-sm-10">
                     <input id="id_realname" maxlength="512" name="realname" type="text" class="form-control input-xxlarge">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="col-sm-2 control-label">职业</label>
                   <div class="col-sm-10" id="occupation">
                     <div class="checkbox-inline"><label for="id_occupation_1"><input id="id_occupation_1" name="occupation" type="radio" value="1" class="input-xxlarge"> 学生</label></div>

                     <div class="checkbox-inline"><label for="id_occupation_2"><input id="id_occupation_2" name="occupation" type="radio" value="2" class="input-xxlarge"> 已工作</label></div>

                   </div>
                 </div>
                 <div class="form-group">
                   <label class="col-sm-2 control-label">
                     自我介绍
                   </label>
                   <div class="col-sm-10">
                     <textarea cols="40" id="id_about_me" name="about_me" rows="10" class="form-control"></textarea>
                   </div>
                 </div>
                 <button class="col-sm-offset-2 col-sm-6 btn btn-primary" type="submit">
                       保存个人信息
                 </button>
              </form>
            </div>
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
