
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo safeHtml($tpl_question['title'])?> | Leapcode</title>

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
      <div class="row">
        <div class="col-xs-12">
          <h2>
            <?php echo safeHtml($tpl_qno.'. '.$tpl_question['title'])?>
            <a href="/question/pick-one" class="btn btn-primary pull-right">换一个</a>
          </h2>

          <hr />
        </div>
      </div>
      <div class="row"> <!-- row brief -->
        <div class="col-xs-9">
          <div>
            <?php echo $tpl_brief;?>
          </div>
        </div>
        <div class="col-xs-3">
        </div>
      </div> <!-- / row brief -->
      <div class="row">
        <div class="col-xs-12">
          <hr />
        </div>
      </div>
      <?php
          $arrLang = array(
            'php' => 'PHP',
            'java' => 'Java',
            );
      ?>
      <div class="row" style="margin-bottom:1em;">
        <div class="col-xs-3">
          <select class="form-control">
            <?php foreach ($arrLang as $key => $lang) :
                    if (in_array($key, $tpl_lang_list)) :
            ?>
            <option value="<?php echo $lang; ?>"><?php echo safeHtml($lang); ?></option>
            <?php   endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="row"> <!-- row code -->
        <div class="col-xs-12">
          <div id="container" style="height:400px; border: solid 1px grey; margin-bottom:1em;"></div>
          <div class="clearfix">
            <?php if ($tpl_is_signin) : ?>
            <button id="run" class="btn btn-primary pull-right">运行</button>
            <?php else : ?>
            <button class="btn btn-primary pull-left" disabled="disabled">运行</button>
            <a class="btn btn-link" href="/signin">&raquo; 登录后提交代码</a>
            <?php endif ?>
          </div>
          <div id="run-result" style="display:none;">
            <hr />
            <div class="panel panel-default" role="panel">
              <div class="panel-heading" id="result-title">运行结果</div>
              <div class="panel-body" style="display:none;" role="compile-error">
                <div class="col-xs-12">
                  <div class="well" role="error">
                  </div>
                </div>
              </div>
              <div class="panel-body" style="display:none;" role="result">
                <div class="col-xs-12">
                  <p>输入</p>
                  <div class="well" role="input">
                    1,2,3
                  </div>
                </div>
                <div class="col-xs-6">
                  <p>你的结果</p>
                  <div class="well" role="output">
                    [1,2]
                  </div>
                </div>
                <div class="col-xs-6">
                  <p>正确结果</p>
                  <div class="well" role="expect">
                    [1,2]
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- / row code -->
      <?php include TEMPLATE.'mod/tail.tpl.php'; ?>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/jquery/jquery-3.1.1.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<script src="/static/monaco-editor/min/vs/loader.js"></script>
<script type="text/javascript">
$().ready(function() {
  require.config({ paths: { 'vs': '/static/monaco-editor/min/vs' }});
  require(['vs/editor/editor.main'], function() {
      window.editor = monaco.editor.create(document.getElementById('container'), {
          value: [
<?php
$lines = explode("\r\n", $tpl_code);
array_walk($lines, function(&$item) {
  $item = sprintf("'%s'", $item);
});
print join(',', $lines);
?>
          ].join('\n'),
          language: 'php'
      });
  });

  $('#run').click(function() {
    var code = window.editor.getValue();

    var data = new FormData();
    data.append('code', code);
    data.append('qno', <?=safeHtml($tpl_qno)?>);
    data.append('lang', 'php');
    $.ajax({
      url: "/ajax/run",
      type: 'POST',
      data: data,
      mimeType: "multipart/form-data",
      cache: false,
      contentType: false,
      processData: false,
      context: null,
      success: function (data, textStatus, jqXHR) {
        try {
          var result = JSON.parse(data);
          if (result.errno === 0) {
            var data = result.data;
            console.log(data);
            run_result(data);
          } else {
            console.warn(result);
          }
        } catch (e) {
          alert('八阿哥驾到，请联系研发\n' + data);
          console.log(e);
        }
      },
      complete: function (jqXHR, textStatus) {
      }
    });

  });
});

function run_result(data) {
  var result = data.result;
  $('#run-result div[role=panel]').removeClass('panel-success panel-danger');
  $('#run-result div[role=compile-error]').hide();
  $('#run-result div[role=result]').hide();
  $('#result-title').html(data.msg);
  if ('success' == result) {
    $('#run-result div[role=result]').show();
    $('#run-result div[role=panel]').addClass('panel-success');
    run_success(data.input_desc, data.output, data.expect_desc, data.runtime);
  } else if ('fail' == result) {
    $('#run-result div[role=result]').show();
    $('#run-result div[role=panel]').addClass('panel-danger');
    run_fail(data.input_desc, data.output, data.expect_desc, data.runtime);
  } else if ('error' == data.result) {
    $('#run-result div[role=compile-error]').show();
    $('#run-result div[role=panel]').addClass('panel-danger');
    run_error(data.error);
  }
  $('#run-result').show('slow');
}

function run_success(input, output, expect, runtime) {
  $('#run-result div[role=input]').html(input);
  $('#run-result div[role=output]').html(output);
  $('#run-result div[role=expect]').html(expect);
}

function run_fail(input, output, expect, runtime) {
  $('#run-result div[role=input]').html(input);
  $('#run-result div[role=output]').html(output);
  $('#run-result div[role=expect]').html(expect);
}

function run_error(error) {
  $('#run-result div[role=error]').html(error);
}

</script>
