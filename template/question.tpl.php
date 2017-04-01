<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="<?php echo sprintf("%s 难度：%d颗星", safeHtml($tpl_question['title']), $tpl_question['difficulty']); ?>">
    <meta name="keywords" content="<?php echo sprintf("%s", safeHtml($tpl_question['title'])); ?>">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo safeHtml($tpl_question['title'])?> | Leapcode</title>

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
        <div class="col-xs-12">
          <h2>
            <?php echo safeHtml($tpl_qno.'. '.$tpl_question['title'])?>
            <a href="/question/pick-one" class="btn btn-default pull-right">
              <i class="glyphicon glyphicon-random" style="margin-right: .7em;"></i>换一个
            </a>
          </h2>

          <hr />
        </div>
      </div>
      <div class="row"> <!-- row brief -->
        <div class="col-sm-9 col-xs-12">
          <div>
            <?php echo $tpl_brief;?>
          </div>
        </div>
        <div class="col-sm-3">
          <p>难度：
              <?php for ($i = 0; $i < (int)$tpl_question['difficulty']; $i++) : ?>
                <span style="color: orange" class="glyphicon glyphicon-star"></span>
              <?php endfor ?>
          </p>
          <?php if (count($tpl_tags) > 0) : ?>
          <p>标签：
            <?php foreach ($tpl_tags as $tag) : ?>
              <span style="display: inline-block;">
                <a href="/tag/<?php echo $tag['seo_tagname']?>" class="label label-info">
                  <?php echo safeHtml($tag['tagname']); ?>
                </a>
              </span>
            <?php endforeach ?>
          </p>
          <?php endif ?>
        </div>
      </div> <!-- / row brief -->
      <div class="row">
        <div class="col-xs-12">
          <hr />
        </div>
      </div>
    </div>

    <div class="container hidden" id="container-coding">
      <?php
          $arrLang = array(
            'php' => 'PHP',
            'java' => 'Java',
            );
      ?>
      <div class="row" style="margin-bottom:1em;">
        <div class="col-sm-4 col-lg-3 col-xs-6">
          <select id="sel-lang" class="form-control">
            <?php foreach ($arrLang as $key => $lang) :
                    if (in_array($key, $tpl_lang_list)) :
            ?>
            <option value="<?php echo $key; ?>"><?php echo safeHtml($lang); ?></option>
            <?php   endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="row"> <!-- row code -->
        <div class="col-md-12">
          <div id="container" style="height:30em; border: solid 1px lightgrey; margin-bottom:1em;"></div>
          <div class="clearfix">
            <?php if ($tpl_is_signin) : ?>
            <button id="run" data-loading-text="正在编译..." class="btn btn-primary pull-right">运行</button>
            <?php else : ?>
            <button class="btn btn-primary pull-left" disabled="disabled">运行</button>
            <a class="btn btn-link" href="/signin">&raquo; 登录后提交代码</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>

    <!-- 运行结果 -->
    <div class="container" id="run-result" style="display:none;">
      <div class="row">
        <div class="col-md-12">
          <hr />
          <div class="panel panel-default" role="panel">
            <div class="panel-heading" id="result-title">运行结果</div>
            <div class="panel-body" style="display:none;" role="compile-error">
              <div class="col-xs-12">
                <pre role="error">
                </pre>
              </div>
            </div>
            <div class="panel-body" style="display:none;" role="result">
              <div class="row">
                <div class="col-xs-12">
                  <p>输入</p>
                  <pre class="well" role="input">
                    1,2,3
                  </pre>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <p>你的结果</p>
                  <pre class="well" role="output">
                    [1,2]
                  </pre>
                </div>
                <div class="col-xs-6">
                  <p>正确结果</p>
                  <pre class="well" role="expect">
                    [1,2]
                  </pre>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <p>运行耗时: <span id="runtime"></span></p>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- -->
      </div> <!-- / row code -->
    </div><!-- /.container -->

    <?php include TEMPLATE.'mod/footer.tpl.php'; ?>

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

  $('<p class="lead text-muted text-center" id="loading">载入中...</p>').insertBefore("#container-coding");

  function changeLang(lang) {
    var data = new FormData();
    data.append('qno', <?=safeHtml($tpl_qno)?>);
    data.append('lang', lang);
    $.ajax({
      url: "/ajax/get-lang-code",
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
            change_code(data.code, data.lang);
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
  }

  $('#sel-lang').val('<?php echo $tpl_lang?>');

  require.config({ paths: { 'vs': '/static/monaco-editor/min/vs' }});

  require(['vs/editor/editor.main'], function() {
    $('#loading').remove();
    $('#container-coding').removeClass("hidden");
    change_code('<?php echo str_replace("\r\n", '\r\n', $tpl_code) ?>', '<?php echo $tpl_lang ?>');
  });

  $('#sel-lang').change(function() {
    var lang = $(this).val();
    changeLang(lang);
  });

  $('#run').click(function() {
    var button = $(this);
    button.button('loading');
    var code = window.editor.getValue();

    var data = new FormData();
    data.append('code', code);
    data.append('qno', <?=safeHtml($tpl_qno)?>);
    data.append('lang', $('#sel-lang').val());
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
        $('html,body').animate({scrollTop: $('#run-result').offset().top}, 350);
      },
      complete: function (jqXHR, textStatus) {
        button.button('reset');
      }
    });

  });
});

function reset_run_result() {
  $('#run-result').hide();
  $('#run-result div[role=panel]').removeClass('panel-success panel-danger');
  $('#run-result div[role=compile-error]').hide();
  $('#run-result div[role=result]').hide();
}

function run_result(data) {
  reset_run_result();
  var result = data.result;
  $('#result-title').html(data.msg);
  if ('success' == result) {
    $('#run-result div[role=result]').show();
    $('#run-result div[role=panel]').addClass('panel-success');
    run_success(data.input_desc, data.output, data.expect_desc, data.nice_runtime);
  } else if ('fail' == result) {
    $('#run-result div[role=result]').show();
    $('#run-result div[role=panel]').addClass('panel-danger');
    run_fail(data.input_desc, data.output, data.expect_desc, data.nice_runtime);
  } else if ('error' == data.result) {
    $('#run-result div[role=compile-error]').show();
    $('#run-result div[role=panel]').addClass('panel-danger');
    run_error(data.error);
  }
  $('#run-result').show();
}

function run_success(input, output, expect, runtime) {
  // input = pre_str(input);
  $('#run-result pre[role=input]').html(input);
  $('#run-result pre[role=output]').html(output);
  $('#run-result pre[role=expect]').html(expect);
  $('#runtime').html(runtime);
}

function run_fail(input, output, expect, runtime) {
  // input = pre_str(input);
  $('#run-result pre[role=input]').html(input);
  $('#run-result pre[role=output]').html(output);
  $('#run-result pre[role=expect]').html(expect);
  $('#runtime').html(runtime);
}

function run_error(error) {
  $('#run-result pre[role=error]').html(error);
}

function pre_str(input) {
  return input.replace(/ /g, '&nbsp;').replace(/\n/g, "<br />");
}

function change_code(code, lang) {
  $('#container').html('');
  reset_run_result();
  if (null == code) {
    return;
  }

  window.editor = monaco.editor.create(document.getElementById('container'), {
      value: code.split("\\r\\n").join("\n"),
      language: lang,
      scrollBeyondLastLine: false
  });
}
</script>
