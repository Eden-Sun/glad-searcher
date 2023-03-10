
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="GLAD,PVQC,BAP,專業英文">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
		<title>Global Learning and Assessment Development (GLAD) - PVQC VQC BAP Typing</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="cert.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
	</head>
	<body>
		<?
			include("db.php");
			$cerno=$_POST['password'];
			$data=mysql_query("select * from info where Certificate ='$cerno'") ;
			$rows = mysql_fetch_row($data);
			$cert_id = $rows[15];
			include("cert_".$cert_id.".php");
		?>
	</body>
	<script>
		document.onmousedown=click;
		document.onkeydown=click;
		if (document.layers) window.captureEvents(Event.MOUSEDOWN); window.onmousedown=click;
		if (document.layers) window.captureEvents(Event.KEYDOWN); window.onkeydown=click;
		function click(e){
			if (navigator.appName == 'Netscape'){
				if (e.which != 1){alert("Not available to download!!");return false;}}
				if (navigator.appName == "Microsoft Internet Explorer"){
				if (event.button != 1){alert("Not available to download!!");
		return false;}}}
		
		$(document).ready(function(){
			var pdfContent = $(document.body).children()[0]
			var pdfWidth = $(pdfContent).width()
			var pdfHeight = $(pdfContent).height()
			var orientationKey = pdfWidth > pdfHeight ? 'l' : 'p'
			var opt = {
				filename:     '<? echo $cerno ?>.pdf',
				html2canvas:  { width: pdfWidth },
				jsPDF:        { unit: 'px', format: [pdfWidth, pdfHeight], orientation: orientationKey }
			};
			if (/download/.test(window.location.search)) html2pdf(pdfContent, opt)
		})
	</script>
</html>