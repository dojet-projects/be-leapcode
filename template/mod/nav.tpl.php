<?php
$menu = array(
  'question' => array(
    'title' => '问题',
    'link' => '#',
    ),
  );
?>
    <nav class="navbar navbar-inverse" role="navigation" style="border-radius:0;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Leapcode</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php foreach ($menu as $key => $info) : ?>
            <li<? echo $tpl_topmenu == $key ? ' class="active"' : '' ?>>
              <a href="<?php echo $info['link']?>">
                <?php echo safeHtml($info['title']) ?>
              </a>
            </li>
            <?php endforeach ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if ($tpl_is_signin) : ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php echo safeHtml($tpl_me->username()); ?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <!-- <li><a href="#">Action</a></li>
                  <li class="divider"></li> -->
                  <li><a href="/signout">登出</a></li>
                </ul>
              </li>
            <?php else : ?>
              <li><a href="/signin">登入</a></li>
              <li><a href="/signup">注册</a></li>
            <?php endif ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
