<?php
/**
 * color wall
 *
 * @author: dogstar 2014-11-04
 */

require_once dirname(__FILE__) . '/../common.php';

header('Content-Type', 'text/html;charset=utf-8');

header('Cache-control', 'max-age=36000');
header('Expires', gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');
header('Last-Modified: '. gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');

$timestamp = $_SERVER['REQUEST_TIME'];
$inputTime = '';

if (isset($_POST['inputTime'])) {
	$inputTime = str_replace('：', ':', trim($_POST['inputTime']));
	
	if (is_numeric($inputTime)) {
		$timestamp = intval($inputTime);
	} else {
		$timestamp = strtotime($inputTime);
	}
}

$date = date('Y-m-d H:i:s', $timestamp);

?> 

<?php
 /** ---------------------------------- Template -------------------------------**/
?>

<?php
require dirname(__FILE__) . '/../header.html';
?>

<div class="projects-header page-header">
	<h2 id="theColorYouLike"><?php echo $date;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $timestamp;?></h2>
	<p>请在下面输入您需要转换的时间，如果是时间戳，系统将会转换成日期；反之，则会转换成时间戳。</p>
</div>

<div class="row">
	<div class="row">
		<form action="" method="POST">
			<div class="col-xs-4">
			</div>
			<div class="col-xs-4">
				<input type="text" class="form-control" placeholder="请在这里输入时间戳，或者日期" name="inputTime" value="<?php echo $inputTime;?>">
			</div>
			<div class="col-xs-4">
				<input type="submit" class="btn btn-success" value="智能转换" >
			</div>
		</form>
	</div>
	
<br /><br />

<?php if (isset($_POST['inputTime'])) { ?>
<h3>猜你需要：</h3>
<table class="table table-hover">
	<tr>
		<td>其他日期格式：</td>
		<td><?php echo date('Y年m月d日 H:i:s', $timestamp);?></td>
		<td><?php echo date('Y/n/j G:i:s', $timestamp);?></td>
		<td><?php echo date('H:i:s M/d/Y', $timestamp);?></td>
	</tr>
	<tr>
		<td>星期几：</td>
		<td>星期<?php $chars = array('X', '一','二','三','四','五','六','日'); echo $chars[date('N', $timestamp)];?></td>
		<td><?php echo date('l', $timestamp);?></td>
		<td><?php echo date('D', $timestamp);?></td>
	</tr>
	<tr>
		<td><?php echo date('Y', $timestamp)?>年中的：</td>
		<td>第<?php echo date('W', $timestamp)?>周</td>
		<td>第<?php echo date('z', $timestamp);?>天</td>
		<td><?php echo date('L', $timestamp) == 1 ? '闰年' : '不是闰年';?></td>
	</tr>
</table>
<?php } ?>

<br /><br />

更多选择：
<a href="http://tool.chinaz.com/Tools/unixtime.aspx">Unix时间戳(Unix timestamp)转换工具</a>&nbsp;&nbsp;


</div> <!-- row -->


<?php
require dirname(__FILE__) . '/../footer.html';
?>
