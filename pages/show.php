<?php
$size = 640;
if(in_array($_REQUEST['size'], array(230, 320, 480, 640))){
	$size = $_REQUEST['size'];
}

$prefix = 'image';
$step = 32;

?><!DOCTYPE html> 
<html> 
	<head> 
	<title>Image Tester</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="../common.js"></script>
	<script type="text/javascript">
		$(document).bind("mobileinit", function(){
		  $.mobile.ajaxEnabled = true;
		  $.mobile.ajaxLinksEnabled = true;
		});
	</script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js"></script>
	<meta name="viewport" content="width=320">
</head> 
<body> 

<div data-role="page" id="main"> 
	<div data-role="header">
		<h1><?php print $size; ?>px. # of colors combination</h1>
	</div> 
	<div data-role="content" style="margin:0; padding:0">
		<p>Order by number of colors</p>

<?php
		for($color = 32; $color <= 256; $color+=$step){
			print sprintf('<div>case:%d</div>', $color / 32);
			print sprintf('<div><img src="../images/export/%s_s%d_c%d.gif" width="320"></div>', $prefix, $size, $color);
			print '<div>';
			print sprintf('<a href="#color-%d" data-rel="dialog" data-transition="pop" data-role="button">Detail</a>', $color);
			print sprintf('<a href="../images/export/%s_s%d_c%d.gif?%s" data-role="button" rel="external">Original</a>', $prefix, $size, $color, microtime(true));
			print '</div>';
			print '<div style="height:50px;">&nbsp;</div>';
		}
?>
	
	</div> 
	<div data-role="footer"></div> 
</div> 



<?php
// part of dialog
		for($color = 32; $color <= 256; $color+=32){
?>
<div data-role="page" id="color-<?php print $color; ?>"> 
 
 
	<div data-role="content">	
		<h2>Detail</h2>
		<p>Width: <?php print $size; ?>px</p> 
		<p>Number of colors:<?php print $color; ?></p>		
		<p>Filesize: <?php print round(filesize(sprintf('../images/export/'.$prefix.'_s'.$size.'_c%d.gif', $color)) / 1000); ?>KB</p>	
		<p><a href="#main" data-rel="back" data-role="button">Close</a></p>	
	</div>

</div>
<?php
		}
?>
	


</body>
</html>

