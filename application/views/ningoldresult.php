<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$gold = $this->session->userdata('gold');
$activity = $this->session->userdata('activity');
$win = $this->session->userdata('win');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ninja Gold</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	*{
		/*outline: 1px red dotted;*/
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	h2{
		margin-left:30px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.building{
	display: inline-block;
	width: 300px;
	height: 200px;
	vertical-align: top;
	text-align: center;
	border: 1px black solid;
	}

	.building button{
	height: 30px;
	width: 110px;
	margin: 25px 0px 0px 0px;
	}

	#log{
	margin:10px;
	overflow: auto;
	max-height:300px;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Ninja Gold</h1>
	<h2>Your Gold: <?= $gold?></h2>
	<div id="body">
		<div class="building">
			<form action="process_money" method="get">
				<h3>Farm</h3>
				<p>(earns 10-20 gold)</p>
				<button>Find Gold!</button>
				<input type="hidden" name="shop" value="farm">
			</form>
		</div>
		<div class="building">
			<form action="process_money" method="get">
				<h3>Cave</h3>
				<p>(earns 5-10 gold)</p>
				<button>Find Gold!</button>
				<input type="hidden" name="shop" value="cave">
			</form>
		</div>
		<div class="building">
			<h3>House</h3>
			<form action="process_money" method="get">
				<p>(earns 2-5 gold)</p>
				<button>Find Gold!</button>
				<input type="hidden" name="shop" value="house">
			</form>
		</div>
		<div class="building">
			<form action="process_money" method="get">
				<h3>Casino</h3>
				<p>(earn or lose 0-50 gold)</p>
				<button>Find Gold!</button>
				<input type="hidden" name="shop" value="casino">
			</form>
		</div>

		

	</div>
	<div id="log">
	<?php 
		foreach ($activity as $event) {
			echo $event;
		}
	?>
	</div>
</div>

</body>
</html>