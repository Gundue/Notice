<?php include "../model/db.php"; ?>
<?php require_once('../lib/head.php') ?>
	<title>회원가입</title>
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
	<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/common.js"></script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form  method="post" action="../controller/member_ok.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-51">
						Sign Up
                    </span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input name="userid" id="userid" class="check input100" placeholder="Userid"  autofocus>
						<span class="focus-input100"></span>
						<div id="id_check" style="margin-left:30px;">아이디 중복 검사</div>
                    </div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="userpw" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="userpw2" placeholder="Confirm Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="text" name="name" placeholder="name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="text" id="sample6_postcode" placeholder="adress_code" name="adress_code">
						<span class="focus-input100"></span> <input type="button" class="btn btn-light" onclick="sample6_execDaumPostcode()" value="우편번호 찾기" style="margin-left:30px;">
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="sample6_address" placeholder="adress" name="adress">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="sample6_detailAddress" placeholder="adress_detail" name="adress_detail">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="sample6_extraAddress" placeholder="Reference item">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-24">
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Join
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../vendor/animsition/js/animsition.min.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../vendor/countdowntime/countdowntime.js"></script>
	<script src="../js/main.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer src="../../../../static.cloudflareinsights.com/beacon.min.js"
		data-cf-beacon='{"rayId":"5f17058f783da27f","version":"2020.9.1","si":10}'></script>
<?php require_once('../lib/tail.php') ?>