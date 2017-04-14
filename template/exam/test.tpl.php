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
    <link href="/static/CodeMirror/lib/codemirror.css" rel="stylesheet">
    <link href="/static/CodeMirror/theme/eclipse.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <textarea id="mytext" style="height: 200px; display: none; border: solid 1px lightgray">function myScript() {
    return 100;
}</textarea>
        </div>
      </div>
    </div>

  </body>
  <script src="/static/jquery/jquery-3.1.1.min.js"></script>
  <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  <script src="/static/CodeMirror/lib/codemirror.js"></script>
  <script src="/static/CodeMirror/mode/javascript/javascript.js"></script>
  <script src="/static/CodeMirror/addon/selection/active-line.js"></script>
  <script src="/static/CodeMirror/addon/edit/matchbrackets.js"></script>
</html>
<!-- Create a simple CodeMirror instance -->
<style type="text/css">
  .CodeMirror {border: solid 1px lightgray;}
</style>

<script type="text/javascript">

var editor;

$().ready(function() {
  editor = CodeMirror.fromTextArea(document.getElementById('mytext'), {
    value: "",
    lineNumbers: true,
    mode:  "javascript",
    styleActiveLine: true,
    matchBrackets: true,
    theme: "eclipse"
  });

  editor.setSize('auto', 100);

  editor.on("change", function(cm, obj) {
    onchange(obj);
  });

});

var now = new Date().getTime();
var no = 0;

function onchange(obj) {
  no++;
  var ts = new Date().getTime();
  obj.ts = ts - now;
  console.log(no, ts - now, obj);

  var data = new FormData();
  data.append('no', no);
  data.append('change', JSON.parse(obj));
  $.ajax({
    url: "/ajax/exam/record",
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
</script>
