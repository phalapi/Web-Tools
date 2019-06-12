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

 /** ---------------------------------- PHP Handle -------------------------------**/

require_once dirname(__FILE__) . '/common.php';

header('Cache-control', 'max-age=36000');
header('Expires', gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');
header('Last-Modified: '. gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');

 /** ---------------------------------- HTML Template -------------------------------**/

require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
	<h2 id="theColorYouLike">Web Tools开发者在线工具精品推荐</h2>
	<p>以下在线工具由开源社区提供，并通过精心挑选，追求简洁实用。 希望能对您有帮助，谢谢！</p>
</div>


<div class="row">

      	<div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'colorwall/'; ?>" title="Bootstrap 编码规范" ><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190612235705_7cfbe0dce3727031890aaf651d5fb6d5.jpeg" width="300" height="150" alt="Color Wall"></a>
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
            <a href="<?php echo WEB_TOOLS_HOST . 'timestamp/'; ?>" title="在线时间戳"><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190612235740_6611f0708ed597fabc1f73adda234a95.jpeg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
              <h3> 
                <a href="<?php echo WEB_TOOLS_HOST . 'timestamp/'; ?>" title="时间戳" >在线时间戳<br><small>by @dogstar</small></a>
              </h3>
              <p>
              WebTools在线时间戳：如果是时间戳，系统将会转换成日期；反之，则会转换成时间戳。
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4 col-lg-3 ">
          <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'json/'; ?>" title="在线JSON解析" ><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190612235756_9d86324447e708c0a3cad4444b0628ed.jpeg" width="300" height="150" alt="Color Wall"></a>
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
            <a href="<?php echo WEB_TOOLS_HOST . 'colortran/'; ?>" title="在线颜色转换" ><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190613000256_f92750c7cb07cf00db9f30cf931b794b.jpeg" width="300" height="150" alt="Color Wall"></a>
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


<div class="row">

        <div class="col-sm-6 col-md-4 col-lg-3 ">
        <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'url/'; ?>" title="在线URIComponent转换"><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190613000106_f4679022dc9e45e46f38bb02c7b1fe96.jpeg" width="300" height="150" alt="url"></a>
            <div class="caption">
                <h3>
                    <a href="<?php echo WEB_TOOLS_HOST . 'url/'; ?>" title="在线URIComponent转换" >在线URIComponent转换<br><small>by @dogstar</small></a>
                </h3>
                <p>
                    在线URIComponent转换：当输入字符串后，系统会url编码并转义用于分隔 URI 各个部分的标点符号,适用于url作为参数传递时。
                </p>
            </div>
        </div>
    </div>

		<div class="col-sm-6 col-md-4 col-lg-3 ">
        <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'md5/'; ?>" title="在线MD5转换"><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190613000035_8d5587cde6250e70bb5e72cccbcddeab.jpeg" width="300" height="150" alt="Color Wall"></a>
            <div class="caption">
                <h3>
                    <a href="<?php echo WEB_TOOLS_HOST . 'md5/'; ?>" title="在线MD5转换" >在线MD5转换<br><small>by @sHuXnHs</small></a>
                </h3>
                <p>
                    在线MD5转换：当输入字符串后，系统会自动转换成相应的字符串Md5串
                </p>
            </div>
        </div>
    </div>

        <div class="col-sm-6 col-md-4 col-lg-3 ">
        <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'urls/'; ?>" title="在线URI转换"><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190613000009_dccae914ffc481dfe27c87ce8605e6c4.jpeg" width="300" height="150" alt="url"></a>
            <div class="caption">
                <h3>
                    <a href="<?php echo WEB_TOOLS_HOST . 'urls/'; ?>" title="在线URI转换" >在线URI转换<br><small>by @sHuXnHs</small></a>
                </h3>
                <p>
                    在线URI转换：当输入字符串后，系统会整个URI进行编码，但不会对本身属于URI的特殊字符进行编码，例如、/ ？和#,适用于url跳转时。
                </p>
            </div>
        </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 ">
        <div class="thumbnail">
            <a href="<?php echo WEB_TOOLS_HOST . 'base64/'; ?>" title="在线图片base64编码"><img class="lazy" src="http://cdn7.okayapi.com/89E670FD80BA98E7F7D7E81688123F32_20190613000508_3d446f9f740bede8b006ce0ee8d44068.jpeg" width="300" height="150" alt="url"></a>
            <div class="caption">
                <h3>
                    <a href="<?php echo WEB_TOOLS_HOST . 'base64/'; ?>" title="在线图片base64编码" >在线图片base64编码<br><small>by @sHuXnHs</small></a>
                </h3>
                <p>
                    在线图片base64编码：当上传图片后，系统会对图片进行base64编码。
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
