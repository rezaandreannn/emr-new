
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css');?>">

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">

<link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css?v=3.2.0');?>">
<script nonce="460f557f-6033-4e81-892d-0d5795de552e">try { (function(w,d){!function(b$,ca,cb,cc){b$[cb]=b$[cb]||{};b$[cb].executed=[];b$.zaraz={deferred:[],listeners:[]};b$.zaraz.q=[];b$.zaraz._f=function(cd){return async function(){var ce=Array.prototype.slice.call(arguments);b$.zaraz.q.push({m:cd,a:ce})}};for(const cf of["track","set","debug"])b$.zaraz[cf]=b$.zaraz._f(cf);b$.zaraz.init=()=>{var cg=ca.getElementsByTagName(cc)[0],ch=ca.createElement(cc),ci=ca.getElementsByTagName("title")[0];ci&&(b$[cb].t=ca.getElementsByTagName("title")[0].text);b$[cb].x=Math.random();b$[cb].w=b$.screen.width;b$[cb].h=b$.screen.height;b$[cb].j=b$.innerHeight;b$[cb].e=b$.innerWidth;b$[cb].l=b$.location.href;b$[cb].r=ca.referrer;b$[cb].k=b$.screen.colorDepth;b$[cb].n=ca.characterSet;b$[cb].o=(new Date).getTimezoneOffset();if(b$.dataLayer)for(const cm of Object.entries(Object.entries(dataLayer).reduce(((cn,co)=>({...cn[1],...co[1]})),{})))zaraz.set(cm[0],cm[1],{scope:"page"});b$[cb].q=[];for(;b$.zaraz.q.length;){const cp=b$.zaraz.q.shift();b$[cb].q.push(cp)}ch.defer=!0;for(const cq of[localStorage,sessionStorage])Object.keys(cq||{}).filter((cs=>cs.startsWith("_zaraz_"))).forEach((cr=>{try{b$[cb]["z_"+cr.slice(7)]=JSON.parse(cq.getItem(cr))}catch{b$[cb]["z_"+cr.slice(7)]=cq.getItem(cr)}}));ch.referrerPolicy="origin";ch.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(b$[cb])));cg.parentNode.insertBefore(ch,cg)};["complete","interactive"].includes(ca.readyState)?zaraz.init():b$.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document) } catch (err) {
      console.error('Failed to run Cloudflare Zaraz: ', err)
      fetch('/cdn-cgi/zaraz/t', {
        credentials: 'include',
        keepalive: true,
        method: 'GET',
      })
    };</script></head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="<?= base_url('assets/AdminLTE/index2.html');?>"><b>Admin</b>LTE</a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in to start your session</p>
<form action="../../index3.html" method="post">
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="remember">
<label for="remember">
Remember Me
</label>
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Sign In</button>
</div>

</div>
</form>
<div class="social-auth-links text-center mb-3">
<p>- OR -</p>
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div>

<p class="mb-1">
<a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
<a href="register.html" class="text-center">Register a new membership</a>
</p>
</div>

</div>
</div>


<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js');?>"></script>

<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js?v=3.2.0');?>"></script>
</body>
</html>
