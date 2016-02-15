<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="reset.css">
		<style>
			.col-md-5 { width: 20%; }
			.content { margin: 1vh 1vw; }
			.prefoot { min-height: 95vh; }
			.vertical.space { height: 1vh; }
			body { background-color: black; color: white; font-style: verdana, sans-serif; }
			form { display: inline; }
			button { background: #232b30; border: 1px solid #1c252b; color: #9fa8b0; font-weight: bold; height: 3vh; outline: 0; width: 20%; }
			button:hover { color: #fff; background: #4C5A64; }
			select { border: 1px solid #1c252b; font-weight: bold; height: 3vh; width: 19%; }
			pre { background-color: rgba(235, 236, 228, 0.2); font-family: monospace; margin: 1vh 0 1vh 0; padding: 1vh 1vw 1vh 1vw; }
		</style>
		<title>Cxy: The Fourth Evolution</title>
	</head>
	<body>
		<div class="prefoot">
		<?php
			include_once 'nav/Nav.php';

			$page = $_GET['page'];
			if (!isset($page))
				$page = 0;

			echo "<div id=\"navivalue\" hidden>$page</div>";

			$page = intval($page);
			echo generateNavibar($page);
		?>
			<div class="content">
			<?php
				if (doesPageExist($page)) {
					echo getVerticalSpace();
					echo getPage($page);
				}
				else {
					echo generateNavibar($page);
					echo '<div class="vertical space"></div>';
					echo '<pre> This part of the tutorial is not present </pre>';
				}
			?>
			</div>
		</div>
		<?php
				echo getVerticalSpace();
			echo generateNavibar($page);
		?>
	</body>
	<script>
		function setSelects(value) {
			selects = document.getElementsByTagName("select");
			for (i = 0; i < selects.length; ++i) {
				selects[i].selectedIndex = value;
			}
		}
		setSelects(document.getElementById('navivalue').innerHTML);
		function getPage(response, selected) {
			document.open();
			document.write(response);
			document.close();
			setSelects(selected);
		}
		function httpGetAsyncPage(theUrl, callback) {
			selected = theUrl;
			theUrl = "?page=".concat(theUrl);
			var xmlHttp = new XMLHttpRequest();
			xmlHttp.onreadystatechange = function() {
				if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
					callback(xmlHttp.responseText, selected);
				}
			xmlHttp.open("GET", theUrl, true); // true for asynchronous
			xmlHttp.send(null);
		}
	</script>
</html>
