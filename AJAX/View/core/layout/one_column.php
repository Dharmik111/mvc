<html>
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">		<script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/mage.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo $this->baseUrl('Skin/Admin/Js/mage1.js'); ?>"></script>
		<script src="skin/ckeditor.js"></script>
	    <script src="skin/sample.js"></script>
	</head>
		<body>
		<div id="gridHtml" class="container-fluied"></div>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
				<td width = "100%" colspan = "3">
					<?php echo $this->getHeader()->toHtml();?>
				</td>
			</tr>
			<tr>
				<td style = 'text-align:left' width = "100%">
					<?php
						echo $this->createBlock('Block\Core\Layout\Message')->toHtml();
						echo $this->getChild('content')->toHtml();
						?>
				</td>
			</tr>
			<tr>
				<td border="1"style = 'text-align:center' height="100px" colspan = "3">
					<?php echo $this->getChild('footer')->toHtml();?>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
	</body>
	</html>