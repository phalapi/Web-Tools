<?php
/**
 * 在线颜色转换
 *
 * @author: dogstar 2014-11-04
 */
?>

<?php
 /** ---------------------------------- PHP Handle -------------------------------**/
?>

<?php
require_once dirname(__FILE__) . '/../common.php';
?>

<?php
header('Cache-control', 'max-age=36000');
header('Expires', gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');
header('Last-Modified: '. gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');

$hex = '#666666';
$rbg = hex2rgb($hex);

function hex2rgb($hex) {
	if (substr($hex, 0, 1) != '#') {
		$hex = '#' . $hex;
	}
	return sprintf('RGB(%d,%d,%d)', hexdec(substr($hex, 1, 2)), hexdec(substr($hex, 3, 2)), hexdec(substr($hex, 5, 2)));
}

function rgb2hex($rgb) {
	$colors = explode(',', $rgb);
	if (!isset($colors[1])) {
		$colors[1] = '255';
	}
	if (!isset($colors[2])) {
		$colors[2] = '255';
	}
	return sprintf('#%s%s%s', dechex($colors[0]), dechex($colors[1]), dechex($colors[2]));
}
?> 

<?php
 /** ---------------------------------- HTML Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
	<h2 id="theColorYouLike"><?php echo $rbg;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $hex;?></h2>
	<p>请在下面输入您需要转换的颜色，如果是RGB格式，系统将会转换成带#号的HEX；反之，则会转换成RGB。</p>
</div>

<div class="row">
	<div class="row">
		<form action="" method="POST">
			<div class="col-xs-4">
			</div>
			<div class="col-xs-4">
				<input type="text" class="form-control" placeholder="请在这里输入RGB，或者类如#00000的十六进制" id="inputColor" name="inputColor" value="" onKeyUp="tranJColor();" >
			</div>
			<div class="col-xs-4">
				<button onClick="tranJColor()" class="btn btn-success" />智能转换</button>
			</div>
		</form>
	</div>
	
<br /><br />

<table class="table" style="height:200px;">
<tr>
	<td id="theColorYouInputShowHere" width="20px;" bgcolor="<?php echo $hex; ?>" style="cursor: pointer"></td>
</tr>

</table>
<br /><br />

更多选择：
<a href="http://rgb.pin5i.com/">在线颜色生成器</a>&nbsp;&nbsp;
<a href="http://www.colorspire.com/">Create Color Schemes</a>


</div> <!-- row -->

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>

<?php
 /** ---------------------------------- JS Functions -------------------------------**/
?>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
function tranJColor() {
	var color = $("#inputColor").val();
	if (color == '') {
		return;
	}
	
	color = color.replace('，', ',');
	color = color.replace('，', ',');
	color = color.replace('#', '');
	
	if (color.indexOf(',') > 0) {
		updateColor(color);
	} else if (color.length >= 6) {
		color = color.substr(0, 6);
		updateColor(HexToRGB('#' + color));
	}
}

<script type="text/javascript">

function updateColor(color) {
	if (color.indexOf(',') < 0) {
		return;
	}
	
	var rgb = color.split(',');
	if (rgb.length != 3) {
		return;
	}

	if (rgb[0] < 0) {
		rgb[0] = 0;
	}
	if (rgb[0] > 255) {
		rgb[0] = 255;
	}
	if (rgb[1] < 0) {
		rgb[1] = 0;
	}
	if (rgb[1] > 255) {
		rgb[1] = 255;
	}
	if (rgb[2] < 0) {
		rgb[2] = 0;
	}
	if (rgb[2] > 255) {
		rgb[2] = 255;
	}

	var rgbStr = rgb[0].toString() + ',' + rgb[1].toString() + ',' + rgb[2].toString();
	/**
	var hexR = rgb[0].toString(16).toLocaleUpperCase();
	var hexG = rgb[1].toString(16).toLocaleUpperCase();
	var hexB = rgb[2].toString(16).toLocaleUpperCase();
	var hex = '#' + (hexR.length == 1 ? '0' + hexR : hexR) + (hexG.length == 1 ? '0' + hexG : hexG) + (hexB.length == 1 ? '0' + hexB : hexB);
	*/
	var hex = RGBToHex(rgbStr);
	
	$("#theColorYouLike").html('RGB(' + rgbStr + ')' + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + hex);
	$("#theColorYouInputShowHere").css("background", hex);
}

function RGBToHex(rgb){ 
   var regexp = /[0-9]{0,3}/g;  
   var re = rgb.match(regexp);//利用正则表达式去掉多余的部分，将rgb中的数字提取
   var hexColor = "#"; 
   var hex = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];  
   for (var i = 0; i < re.length; i++) {
        var r = null, c = re[i], l = c; 
        var hexAr = [];
        while (c > 16){  
              r = c % 16;  
              c = (c / 16) >> 0; 
              hexAr.push(hex[r]);  
         } hexAr.push(hex[c]);
         if(l < 16&&l != ""){        
             hexAr.push(0)
         }
       hexColor += hexAr.reverse().join(''); 
    }  
   return hexColor;  
}

function HexToRGB(hex) {
	var sColor = hex.toLowerCase();  
    if(sColor.length === 4){
       	var sColorNew = "#";  
       	for(var i=1; i<4; i+=1){
           	sColorNew += sColor.slice(i,i+1).concat(sColor.slice(i,i+1));     
        }
        sColor = sColorNew;
    }  

    //处理六位的颜色值 
    var sColorChange = [];
    for(var i=1; i<7; i+=2){
        sColorChange.push(parseInt("0x"+sColor.slice(i,i+2)));
    }  
    
	return sColorChange.join(",");  
}
</script>

</script>

