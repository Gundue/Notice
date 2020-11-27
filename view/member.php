<?php 
/*
* 회원가입 페이지
*/
	include "../model/db.php"; 
	require_once('../lib/head.php');
	//css link
	require_once('../lib/bootlink.php'); 
?>
	<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form  method="post" action="../controller/member_ok.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-51">
						Sign Up
                    </span>
					<!-- Userid -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input name="userid" id="userid" class="check input100" placeholder="Userid"  autofocus>
						<span class="focus-input100"></span>
					<!-- id check-->
						<div id="id_check" style="margin-left:30px;">아이디 중복 검사</div>
                    </div>
					<!-- Password -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="userpw" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<!-- Password2 -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="userpw2" placeholder="Confirm Password">
						<span class="focus-input100"></span>
					</div>
					<!-- Username -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="text" name="name" placeholder="name">
						<span class="focus-input100"></span>
					</div>
					<!-- adress_code -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="text" id="sample6_postcode" placeholder="adress_code" name="adress_code">
						<span class="focus-input100"></span> <input type="button" class="btn btn-light" onclick="sample6_execDaumPostcode()" value="우편번호 찾기" style="margin-left:30px;">
					</div>
					<!-- adress -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="sample6_address" placeholder="adress" name="adress">
						<span class="focus-input100"></span>
					</div>
					<!-- adress detail-->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
						<input class="input100" type="text" id="sample6_detailAddress" placeholder="adress_detail" name="adress_detail">
						<span class="focus-input100"></span>
					</div>
					<!-- Reference item-->
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
			</div> <!-- /.wrap-login100 p-t-50 p-b-90 -->
		</div> <!-- /.container-login100 -->
	</div> <!-- /.limiter -->
<?php require_once('../lib/tail.php') ?>