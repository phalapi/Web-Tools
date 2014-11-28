<?php
/**
 * Demo
 *
 * 虽然目前这种写法不是最好的，但可以先简单按以下格式来开发：
 *
 * 1、PHP处理
 * 2、HTML输出
 * 3、JS函数
 *
 * @author: dogstar 2014-11-14
 */
?>

<?php
 /** ---------------------------------- PHP Handle -------------------------------**/
?>

<?php
require_once dirname(__FILE__) . '/common.php';
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
	<h2 id="theColorYouLike">Web Tools开发者在线工具精品推荐</h2>
	<p>以下在线工具由开源社区提供，并通过精心挑选，追求简洁实用。 希望能对您有帮助，谢谢！</p>
</div>


<div class="row">

      	<div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="Bootstrap 编码规范" target="_blank"><img class="lazy" src="http://webtools.qiniudn.com/index_thumb_color_wall.jpg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="颜色墙" >在线颜色墙<br><small>by @dogstar</small></a>
              </h3>
              <p>
              WebTools颜色墙：在线随机生成，并共有标准版、简约版和深沉版三个版本。
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'timestamp/'; ?>" title="在线时间戳" target="_blank"><img class="lazy" src="http://webtools.qiniudn.com/index_thumb_timestamp_v2.jpg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="时间戳" >在线时间戳<br><small>by @dogstar</small></a>
              </h3>
              <p>
              WebTools在线时间戳：如果是时间戳，系统将会转换成日期；反之，则会转换成时间戳。
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'json/'; ?>" title="在线JSON解析" target="_blank"><img class="lazy" src="http://webtools.qiniudn.com/index_thumb_v2.jpg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'json/'; ?>" title="在线JSON解析" >在线JSON解析<br><small>by @dogstar</small></a>
              </h3>
              <p>
              WebTools在线JSON解析：输入JSON串后，本地会实时转换；如果不行，可以尝试智能转换。
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'colortran/'; ?>" title="在线颜色转换" target="_blank"><img class="lazy" src="http://webtools.qiniudn.com/index_thumb_colortran_v2.jpg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'colortran/'; ?>" title="在线颜色转换" >在线颜色转换<br><small>by @dogstar</small></a>
              </h3>
              <p>
                 WebTools在线颜色转换：输入需要转换的颜色后，如果是RGB格式，系统将会转换成带#号的HEX；反之，则会转换成RGB。
             </p>
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
