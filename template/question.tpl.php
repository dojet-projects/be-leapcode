
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div id="container" style="width:800px;height:400px; border:1px solid grey"></div>
      <button id="run" class="btn btn-primary">运行</button>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/static/jquery/jquery-3.1.1.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<script src="/static/monaco-editor/min/vs/loader.js"></script>
<script>
</script>
<script type="text/javascript">
$().ready(function() {
  require.config({ paths: { 'vs': '/static/monaco-editor/min/vs' }});
  require(['vs/editor/editor.main'], function() {
      window.editor = monaco.editor.create(document.getElementById('container'), {
          value: [
              '<' + '?php',
              'echo "ok";'
          ].join('\n'),
          language: 'php'
      });
  });

  $('#run').click(function() {
    var code = window.editor.getValue();

    var data = new FormData();
    data.append('code', code);
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
            var code = result.data;
            console.log(code);
          } else {
            console.warn(result);
          }
        } catch (e) {
          alert('八阿哥驾到，请联系研发\n' + data);
        }
      },
      complete: function (jqXHR, textStatus) {
      }
    });

  });
});
</script>
