<?php
	class head {
		public function getHtml() {
			$output = '
				<meta charset="UTF-8" />
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<link rel="icon" href="images/furniture/favicon.png">

				<title>Beoordelingssysteem Vista College</title>

				<!-- HIER NOG ZELF INVULLEN -->
				<meta name="author" 		content="JOUW NAAM, JOUW E-MAIL">
				<meta name="designer" 		content="JOUW NAAM">

				<meta name="keywords" 		content="Vista College Beoordelingssysteem">
				<meta name="description" 	content="Bedoordelingssysteem">
				<meta name="subject" 		content="Beoordelingssysteem">
				<meta name="copyright" 		content="VISTA College">
				<meta name="language" 		content="nl">
				<meta name="robots" 		content="index,follow">
				<meta name="owner" 			content="Vista College, Sittard, Maastricht">
				<meta name="pagename" 		content="Vista College / Beoordelingsysysteem">
				<meta name="rating" 		content="General">
				<meta name="revisit-after" 	content="7 days">
				<meta name="target" 		content="all">
				<meta http-equiv="Expires" 	content="0">
				<meta http-equiv="Pragma" 	content="no-cache">

				<meta http-equiv="Cache-Control" content="no-cache">
				<meta http-equiv="imagetoolbar" content="no">
				<meta http-equiv="x-dns-prefetch-control" content="off">

				<!-- BOOTSTRAP Stylesheet -->
				<!-- https://getbootstrap.com/docs/4.3/components/alerts/ kijk hier en klik links in het menu voor meer items -->
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
					integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
					crossorigin="anonymous">

				<!-- FONT AWSOME Stylesheet -->
				<!-- https://fontawesome.com/icons?d=gallery om icons te zoeken en te gebruiken -->
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
					integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
					crossorigin="anonymous">

				<!-- CUSTOM Stylesheets -->
				<link href="' . CSS_PATH . 'style.colors.css" 		type="text/css" rel="stylesheet"/>
				<link href="' . CSS_PATH . 'style.positions.css" 	type="text/css" rel="stylesheet"/>
				<link href="' . CSS_PATH . 'style.css" 				type="text/css" rel="stylesheet"/>

				<!-- Bootstrap JavaScript staat in file: includes/footer.inc.php -->

				<!-- CUSTOM JavaScript -->
				<script src="' . JS_PATH . 'functions.js"></script>
			';

			return $output;
		}
	}