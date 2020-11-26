<?php
/*
* 로그인 페이지
*/
    include "../model/db.php";
    require_once('../lib/head.php');
    // css link
    require_once('../lib/bootlink.php');    
?>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form action="../controller/login_ok.php" method="post" class="login100-form validate-form">
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100 focused-input" type="text" name="userid" placeholder="Username" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="userpw" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="test">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <div>
                            <a href="member.php" class="txt1">
                                Create your Account
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div> <!-- /.wrap-login100 p-t-50 p-b-90 -->
        </div> <!-- /.container-login100 -->
    </div> <!-- /.limiter -->
<?php require_once('../lib/tail.php') ?>