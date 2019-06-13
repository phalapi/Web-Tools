<?php
/**
 * URL
 *
 * URL编码和解码
 *
 * 1、PHP处理
 * 2、HTML输出
 * 3、JS函数
 *
 * @author: dogstar 2017-02-26
 */
?>

<?php
 /** ---------------------------------- PHP Handle -------------------------------**/
?>

<?php
require_once dirname(__FILE__) . '/../common.php';
?>

<?php
/**
 * TODO: 请在下面进行PHP处理
 */

?> 

<?php
 /** ---------------------------------- HTML Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
    <h2>图片base64转换</h2>
    <p>点击上传图片后，会自动转换为base64编码。</p>
</div>

<div class="row">
<!-- TODO: 请在下面进行界面展示处理 -->

<form action="" method="POST">
    <div class="row">
    <h3>上传图片：</h3>
        <div class="row">
            <input name="img" id="img" type="file" class="btn btn-default" onchange="changbase(event)">
        </div>
    </div>
    <div class="row">
    <h3>base64编码：</h3>
        <div class="row">
            <textarea class="form-control" rows="3"  id="base" name="base" ></textarea>
        </div>
    </div>
    <div class="row">
        <h3>base64编码后URIComponent转换（参数传递）：</h3>
        <div class="row">
            <textarea class="form-control" rows="3"  id="baseurl" name="baseurl" ></textarea>
        </div>
    </div>
    <br /><br />

</form>
<br />


</div>

<?php
 /** ---------------------------------- JS Functions -------------------------------**/
?>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/json3/3.3.2/json3.js"></script>

<script type="text/javascript">
/**
 * TODO: 请在下面放置需要的JS函数
 */

function changbase(e)
{

    try {
        // var file = $("#img").files[0];
        var file = e.target.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file); // 读出 base64
        reader.onloadend = function () {
            // 图片的 base64 格式, 可以直接当成 img 的 src 属性值
            var dataURL = reader.result;
            // 下面逻辑处理
            $("#base").val(dataURL);
            var index = dataURL.lastIndexOf("\,");
            urlbase = dataURL.substring(index+1, dataURL.length);
            enurl = encodeURIComponent(urlbase);
            $("#baseurl").val(enurl)
        };

    } catch (e) {
        $("#base").val('base64编码失败！');
    }
}

</script>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>

