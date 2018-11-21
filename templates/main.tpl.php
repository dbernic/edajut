<?php global $module;
$block = array();
if (Userdata::get()->getId() !== null) {
    $block[0]='style="display: none;"';
    $block[1]='';
} else {
    $block[0]='';
    $block[1]='style="display: none;"';
}
?>
<html>
    <header>
        <title>EdAjut</title>
        <meta charset="utf-8">
        <script src="/js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
        <link href="/css/toastr.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/main.css">
    </header>
    <body>
        <div id="login" <?=$block[0]?> >
            <?php include __DIR__.'/common/loginform.tpl.php';?>
        </div>
        <div id="main" <?=$block[1]?> >
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header" style="padding-left: 24px">
                    <a class="navbar-brand" href="/">
                        <b style="color:#EF3945;">Ed</b><span style="color:#EF8739;">Ajut</span>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span id="username"><?=$_SESSION['user']['name']?></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" onclick="logout();">Ieșire</a></li>
                            </ul>
                        </li>
                    <?php  } else { ?>
                        <li><a href="#"  onclick="showLogin();">Logare</a></li>
                    <?php  }?>
                </ul>
            </div>
        </nav>
            <?php 
                $file1 = __DIR__.'/'.$module.'/'.$_SESSION['user']['group'].'.tpl.php';
                $file2 = __DIR__.'/'.$module.'/'.$module.'.tpl.php';
                                        
                if (file_exists($file1)){
                    include $file1;
                } else if (file_exists($file2)) {
                    include $file2;
                } else {
                    include __DIR__.'/login/login.tpl.php';
                }               
            ?>
        </div>
    <script src="/js/main.js"></script>
    <script src="/js/toastr.min.js"></script>
    </body>
</html>