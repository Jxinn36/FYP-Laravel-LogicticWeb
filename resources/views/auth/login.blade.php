


<!doctype html>
<html lang="en">
<head>
<style>
   .btnSignIn {
    background: #e3b04b !important;
    border: 1px solid #e3b04b !important;
    color: #fff !important;
    cursor: pointer;
    height: 48px;
    border-radius: 0.25rem !important;
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    padding: 10px 16px;
}
   </style>


<title>MoveMate Sign In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('import/Login/css/style.css')}}">
<script nonce="bea2a014-225a-417f-8eb7-e76dd1400053">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return async function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})),{})))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-12 col-lg-10">
<div class="wrap d-md-flex">
<img src="{{asset('import/Login/images/login.jpg')}}" alt="...">
<div class="img" style="background-image: url(images/bg-1.jpg);">
</div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">
<h3 class="mb-4">Sign In</h3>
</div>
</div>

@if(Session::has('success'))
<div class="alert alert-success"> {{Session::get('success')}}</div>
@endif
<form  id="loginForm" action="{{route('login.post')}}"  method="POST" class="signin-form">
@csrf
<div class="form-group mb-3">
<label class="label" for="name">Email</label>
<input type="email" id="email" class="form-control" name="email" placeholder="Email">
</div>
@if ($errors->has('email'))
<span class="text-danger">{{$errors->first('email')}} </sapn>
@endif

<div class="form-group mb-3">
<label class="label" for="password">Password</label>
<input type="password" id="password" class="form-control" name="password" placeholder="Password">
</div>
@if ($errors->has('password'))
<span class="text-danger">{{$errors->first('password')}} </sapn>
@endif

<div class="form-group">
@guest
<button type="submit"class="btnSignIn">Sign In</button>
@endguest
</div>


</form>

<div class="form-group d-md-flex">
<div class="w-50 text-md-left">
<a href="../forgot-password">Forgot Password</a>
</div>
</div>
</form>
<p class="text-center">Not a member? <a data-toggle="tab" href="register">Sign Up</a></p>
</div>
</div>
</div>
</div>
</div>
</section>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"81173d5539fd13e0","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.8.0","si":100}' crossorigin="anonymous"></script>



</body>
</html>
