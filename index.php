<?php
/**
 * Web Tools
 *
 * @author: dogstar 2014-11-08
 */

require_once dirname(__FILE__) . '/common.php';

header('Content-Type', 'text/html;charset=utf-8');

header('Cache-control', 'max-age=36000');
header('Expires', gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');
header('Last-Modified: '. gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');

?> 

<?php
 /** ---------------------------------- Template -------------------------------**/
?>

<?php
require dirname(__FILE__) . '/header.html';
?>

<div class="projects-header page-header">
	<h2 id="theColorYouLike">Web Tools开发者在线工具精品推荐</h2>
		<p>以下在线工具都是不断精心开发而成，并且追求简洁实用。 希望能对您有帮助，谢谢！</p>
</div>

<div class="row">

      	<div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="Bootstrap 编码规范" target="_blank"><img class="lazy" src="http://webtools.qiniudn.com/index_thumb_color_wall.jpg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="颜色墙" target="_blank" >颜色墙<br><small>by @dogstar</small></a>
              </h3>
              <p>
              WebTools颜色墙：在线随机生成，共具有三个版本。
              </p>
            </div>
          </div>
        </div>

</div> <!-- row -->

<?php
require dirname(__FILE__) . '/footer.html';
?>
