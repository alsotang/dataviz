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
  width: 320px; height: 280px; margin: 120px auto;padding: 10px 20px;
   box-shadow:0px 0px 24px #ccc;
   border-radius:4px;
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
</style>

<body>
<form action="service/user.php">
  <div class="container">
      <h2 class="form-signin-heading">欢迎登陆到kcharts</h2>
      <input type="text" name="email" class="form-control" placeholder="邮箱" id="userName" required autofocus>
      <input type="password" name="pwd" class="form-control" placeholder="密码" id="pwd" required>
      <label class="radio">
        <input type="radio" value="lgn" name="act" checked> 登陆
      </label>
      <label class="radio">
        <input type="radio" value="reg" name="act"> 注册
      </label>
      <!-- <input type="hidden" name="type" value="1"> -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Go</button>
  </div>
</form>
</body>
<script type="text/javascript">
  (function(S){
    var $=S.all;

    var userName=$('#userName');
    var pwd=$('#pwd');
    var oBtn=$('.btn-lg');

    var aRadio=document.getElementsByName('act');

    var act=aRadio[0].value;

    aRadio[0].onclick=function(){
      userName.attr('placeholder','域账号或已注册账号');
      $('.form-signin-heading').html('欢迎登陆到kcharts');
      act=aRadio[0].value;
    }

    aRadio[1].onclick=function(){
      userName.attr('placeholder','注册账号');
      $('.form-signin-heading').html('欢迎注册');
      act=aRadio[1].value;
    }

    oBtn.on('click',function(){
      ajax('',{
        act:act,
        user:userName,
        pwd:pwd
      },function(data){

      })
    })

    function ajax(url,data,fn,errorfn){
      S.io({
          dataType:'jsonp',
          url:url, 
          data:data,
          jsonp:"callback",    
          success:function (data) {
            fn(data)
          },
          error:function(){
            errorfn() 
          }
      }); 
    }


  })(KISSY);
</script>
</html>
