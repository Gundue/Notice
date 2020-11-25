<?php include "../model/db.php"; ?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form action="../controller/login_ok.php" method="post" class="login100-form validate-form">
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>
                    <?php
                        if(isset($_COOKIE['cookieID'])) {
                            $user = $_COOKIE['cookieID'];
                            $sql = mq("select * from bd_member where bm_id = '$user'");
                            echo "<script>alert('로그인되었습니다.'); location.href='main.php';</script>";
                    ?>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100" type="text" name="userid" placeholder="Username" value="<?php echo $_COOKIE["cookieID"] ?>">
                        <span class="focus-input100"></span>
                    </div>
                        <?php } else {?>
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
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/common.js"></script>
<?php require_once('../lib/tail.php') ?>