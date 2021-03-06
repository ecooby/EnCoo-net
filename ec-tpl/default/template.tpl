<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>%{ec_title}%</title>
	<link href="/ec-tpl/%{ec_template}%/styles/reset.css" rel="stylesheet">
	<link href="/ec-tpl/%{ec_template}%/styles/font-awesome.min.css" rel="stylesheet">
	<link href="/ec-tpl/%{ec_template}%/styles/fonts.css" rel="stylesheet">
	<link href="/ec-tpl/%{ec_template}%/styles/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container">

		<div class="header">
			<div class="header-logo"><a href="/">%{header logo}%</a></div>
			<a class="toggleMenu" href="javascript:openNav();"><i class="fa fa-align-justify"></i></a>
			<div class="header-nav">
				<ul>
					%{header ec_items}%
				</ul>
			</div>
		</div>

		<div class="deviceNav">
			<div class="box">
				<ul>
					%{header ec_items}%
				</ul>
			</div>
		</div>

		%{ec_content}%
		
	</div>

	%{ec_footer}%
	<script src="/ec-tpl/%{ec_template}%/scripts/jquery-2.2.0.min.js"></script>
	<script src="/ec-tpl/%{ec_template}%/scripts/main.js"></script>
</body>
</html>