<!DOCTYPE html>
<style>
    div.actions.clearfix {
    display: none important!;
}
    </style>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MoveMate Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">

    <link rel="stylesheet" href="{{asset('import/Register/fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">
    <link rel="stylesheet" href="{{asset('import/Register/css/style.css')}}">

    <meta name="robots" content="noindex, follow">
    <script nonce="934ad7d1-77a9-4a77-b04d-4894cbb22e2d">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return async function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})),{})))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>

    <style>
        .submitBtn {
            background: #6d7f52;
            color: #fff;
            padding: 0;
            border: none;
            display: inline-flex;
            height: 41px;
            width: 135px;
            align-items: center;
            font-family: "Muli-SemiBold";
            cursor: pointer;
            padding-left: 28px;
        }

        .error-message {
            color: #ff0000;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <form action="{{ route('registration.post') }}" method="POST" id="wizard" class="signup-form" onsubmit="return validateForm()">
            @csrf
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{asset('import/Register/images/regis-1.jpg')}}" alt="...">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Registration</h3>
                        </div>
                        <p>Please fill with your details</p>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" id="username" name="username" placeholder="Full Name" class="form-control">
                                <span class="error-message" id="username-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="email" id="email" name="email" placeholder="Your Email" class="form-control">
                                <span class="error-message" id="email-error"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                <span class="error-message" id="password-error"></span>
                            </div>
                        </div>
                   
                        <div class="form-group">
                            <button type="submit" class="submitBtn">&nbsp; Submit &nbsp; <span>&#10003;</span> </button>
                        </div>
                        <div class="goToLogin">
                            <a class="nav-link" href="{{ route('login') }}">Already Register? Login</a>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <script src="{{asset('import/Register/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('import/Register/js/jquery.steps.js')}}"></script>
    <script src="{{asset('import/Register/js/main.js')}}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"8114e486992e13d8","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.8.0","si":100}' crossorigin="anonymous"></script>

    
    <script>

    function validateForm() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/; // Password regex
        var isValid = true;

        if (username === "") {
            document.getElementById('username-error').innerText = "Please enter your Full Name.";
            isValid = false;
        } else {
            document.getElementById('username-error').innerText = "";
        }

        if (email === "") {
            document.getElementById('email-error').innerText = "Please enter your Email.";
            isValid = false;
        } else if (!/@/.test(email) || !/.com/.test(email)) {
            document.getElementById('email-error').innerText = "Invalid email format. Email must contain '@' and '.com'.";
            isValid = false;
        } else {
            document.getElementById('email-error').innerText = "";
        }

        if (password === "") {
            document.getElementById('password-error').innerText = "Please enter your Password.";
            isValid = false;
        } else if (password.length < 8 || password.length > 20 || /[/,={}|]/.test(password)) {
            document.getElementById('password-error').innerText = "Password must be 8-20 characters long and not contain =/[],{}|.";
            isValid = false;
        } else if (!passwordRegex.test(password)) {
            document.getElementById('password-error').innerText = "Password must include at least one letter, one number, and one special character (@$!%*?&).";
            isValid = false;
        } else {
            document.getElementById('password-error').innerText = "";
        }


        return isValid;
    }


    </script>
</body>
</html>
