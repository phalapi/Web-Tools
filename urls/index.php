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
    <h2>请输入待编码/解码的URL</h2>
    <p>输入URL后，会自动进行编码/解码。</p>
</div>

<div class="row">
<!-- TODO: 请在下面进行界面展示处理 -->

<form action="" method="POST">
    <div class="row">
    <h3>URL编码：</h3>
        <div class="row">
            <textarea class="form-control" rows="3" onkeyup="urlEncodeFun();" id="urlEncode" name="urlEncode" ></textarea>
        </div>
    </div>
    <div class="row">
    <h3>URL解码：</h3>
        <div class="row">
            <textarea class="form-control" rows="3" onkeyup="urlDecodeFun();" id="urlDecode" name="urlDecode" ></textarea>
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

function urlEncodeFun()
{
    var str = $("#urlEncode").val();
    try {
        var deUrl = encodeURI(str);
        $("#urlDecode").val(deUrl);
    } catch (e){
        $("#urlDecode").val('URL编码失败！');
    }
}

function urlDecodeFun()
{
    var str = $("#urlDecode").val();
    try {
        var enUrl = encodeURI(str);
        $("#urlEncode").val(enUrl);
    } catch (e) {
        $("#urlEncode").val('URL解码失败！');
    }
}
</script>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>

