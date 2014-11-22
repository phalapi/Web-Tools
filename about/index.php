<?php
/**
 * 关于页面
 *
 * @author: dogstar 2014-11-14
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

?> 

<?php
 /** ---------------------------------- HTML Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
	<h2>工具，从简单贴心开始！</h2>
	<p>我们致力于提供简单实用、贴心智能的在线工具，以提高我们日常的开发效率。这些工具之所以有生气，因为我们都是开发者！</p>
</div>

<div class="row">

<div class="row alert alert-info">
	<h2>关于我们</h2>
	<div class="row">
		<div class="col-xs-10">
			<p>
			这是一个开源的项目，其中用到的资源大部分均来自互联网中的开源项目。<br/><br/>
			其中有：网站样式设计灵感和技术支持来自Bootstrap，图片素材CDN支持来自七牛云存储，更重要的是代码托管和运行维护得益于开源中国，等等...<br/><br/>
			所以奉着开源项目的精神，这里也希望能通过提供实用的在线工具或代替工具给开发者来回馈开源社区。
			</p>
		</div>
		<div class="col-xs-2">
			<p><img src="http://webtools.qiniudn.com/logo_icon.png" style="height:120px;width:120px;" /></p>
		</div>
	</div>
</div>

<div class="row alert alert-success">
	<h2>加入我们</h2>
	<div class="row">
		<div class="col-xs-10">
			<p>
			如果您也拥有简单实用的在线工具，并且希望分享给更多的人使用，欢迎加入我们！<br/><br/>
			您可以将代码提交到：<a href="https://git.oschina.net/dogstar/Web-Tools.git">https://git.oschina.net/dogstar/Web-Tools.git</a>，建议在dev分支上开发，以便管理 和发布。<br/><br/>
			<a target="_blank" class="btn btn-warning" href="http://my.oschina.net/u/256338/blog/342431">我有建议</a>&nbsp;
			<a target="_blank" class="btn btn-success" href="http://git.oschina.net/dogstar/Web-Tools/wikis/home">我要加入</a>
			<img src="http://webtools.qiniudn.com/WebTools.png" />
			</p>
		</div>
		<div class="col-xs-2">
			<p></p>
		</div>
	</div>
</div>

<div class="row alert alert-danger">
	<h2>广告合作</h2>
	<div class="row">
		<div class="col-xs-10">
			<p>
			欢迎对我们项目进行捐赠！以便我们能拥有更好的服务器和资源为更多的开发者服务！同时您们的支持是我们前进的最大动力！<br/><br/>
			广告资料请提供：950*100 图片、及跳转链接。<br/><br/>
			联&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;系：dogstar<br/>
			邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：chanzonghuang@gmail.com<br/><br/>
			</p>
		</div>
		<div class="col-xs-2">
			<p><img src="http://webtools.qiniudn.com/dogstar_new.png" style="height:120px;width:120px;" /></p>
		</div>
	</div>
</div>

</div>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>

<?php
 /** ---------------------------------- JS Functions -------------------------------**/
?>
<script type="text/javascript">
/**
 * TODO: 请在下面放置需要的JS函数
 */

</script>
