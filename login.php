<?php 
  $error = isset($_GET['error']) ? $_GET['error'] : "";
  $errorMsg = "";
  if($error == 1){
    $errorMsg = "密码错误";
  }else if($error == 2){
    $errorMsg = "用户名不存在";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
  <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.tbcdn.cn/??kissy/k/1.3.1/kissy-min.js"></script>
  <title>用户登录-KCharts数据画报生成器</title>
  <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<style type="text/css">
.container{
  width: 320px; height: 280px; margin: 100px auto;padding: 10px 20px;
   box-shadow:0px 0px 24px #ccc;
   border-radius:4px;position: relative;
}

.form-signin-heading{
  font-family: 'Microsoft YaHei';
}

.form-control{
  margin-bottom: 10px;
}

.radio{
  vertical-align: bottom;
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 15px;
  cursor: pointer;
}

#hony,#pwd2{
  display: none;opacity: 0; filter:alpha(opacity:0);
}

a{
  display: inline-block;margin-bottom: 10px;
}
a:hover{
  text-decoration: none;
}

.alert{
  position: absolute;left: 300px; top: 203px;height: 38px;line-height: 38px;padding: 0 15px;
  margin-bottom: 0;width: 138px;opacity: 0; filter:alpha(opacity:0);
}
</style>

<body>
  <div class="container">
<form action="service/user.php">
   <h2 class="form-signin-heading">欢迎登陆到kcharts</h2>
    <input type="email" class="form-control" name="email" placeholder="请输入邮箱" id="userName" required autofocus value="">
    <input type="text" class="form-control" name="nick" placeholder="昵称" id="hony" value="">
    <input type="password" class="form-control" name="pwd" placeholder="密码" id="pwd" required value="">
    <input type="password" class="form-control" placeholder="重复密码" id="pwd2"  value="">
    <div class="alert alert-danger">
        两次<strong> 密码 </strong>不一致 
      </div>
    <label class="radio">
      <input type="radio" value="lgn" name="act" checked> 登陆
    </label>
    <label class="radio">
      <input type="radio" value="reg" name="act"> 注册
    </label>
    <label><a href="index.php?type=1">使用域账号登陆</a></label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Go</button>
    <input type="hidden" name="type" id="H_Type" value="">
</form>
</div>
</body>
<script type="text/javascript">
   (function(S){
    var $=S.all;

    

    var userName=$('#userName');
    var pwd=$('#pwd');
    var hony=$('#hony');
    var pwd2=$('#pwd2');
    var oBtn=$('.btn-lg');
    var oDiv=$('.container');
    var $H_Type = $("#H_Type");
    if(window.localStorage){
      userName.val(localStorage.name);
    }
    var aRadio=document.getElementsByName('act');

    var act=aRadio[0].value;

    aRadio[0].onclick=function(){
      $H_Type.val("");
      $('.form-signin-heading').html('欢迎登陆到kcharts');
      act=aRadio[0].value;
      hony.css({'display':'none','opacity':0});
      pwd2.css({'display':'none','opacity':0});
      pwd2.removeAttr('required');
      oDiv.stop().animate({height:'280px'},0.4,'easeOutStrong');
    }

    aRadio[1].onclick=function(){
      $('.form-signin-heading').html('欢迎注册');
      act=aRadio[1].value;
      hony.css('display','block');
      pwd2.css('display','block');
      pwd2.attr('required','required');
      hony.stop().animate({opacity:1},0.4)
      pwd2.stop().animate({opacity:1},0.4)
      oDiv.stop().animate({height:'370px'},0.6,'easeOutStrong');
      $H_Type.val(1);
    }

    $('#form1')[0].onsubmit=function(){
      if($(aRadio[1]).attr('checked') && pwd.val()!=pwd2.val()){
        pwd2.val('');
        $('.alert').stop().animate({left:'162px',opacity:1},0.4,'easeOutStrong',function(){
          setTimeout(function(){
             $('.alert').stop().animate({opacity:0},0.4,'easeOutStrong',function(){
                $('.alert').css('left','300px');
            });
          },1000);
        });
        return false;
      }
      if(window.localStorage){
        localStorage.name=userName.val();
      }
    }


  })(KISSY);

</script>
</html>
