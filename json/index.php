<?php
/**
 * JSON在线解析
 *
 * 1、JS本地实时解析
 * 2、服务器智能解析，并且以PHP代码输出
 *
 * @author: dogstar 2014-11-04
 */

require_once dirname(__FILE__) . '/../common.php';

header('Content-Type', 'text/html;charset=utf-8');
//header('Cache-control', 'max-age=36000');
//header('Expires', gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');
//header('Last-Modified: '. gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + 36000) . ' GMT');

$inputJson = isset($_POST['inputJson']) ? $_POST['inputJson'] : '';

$data = json_decode($inputJson, true);

$jsonStr = '';
if ($data !== NULL) {
    $data = array_map('loop_htmlspecialchars', $data);
    $jsonStr = var_export($data, true);
	$jsonStr = str_replace(' ', '&nbsp;', str_replace("\n", '<br/>', $jsonStr));
    $jsonStr = '&lt;?php<br/><br/>return ' . $jsonStr . ';';
}

function loop_htmlspecialchars($value)
{
    if (is_string($value)) {
        return htmlspecialchars($value);
    } else if (is_array($value)) {
        return array_map('loop_htmlspecialchars', $value);
    }
    return $value;
}
?> 

<?php
 /** ---------------------------------- Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
    <h2>请输入</h2>
    <p>请在下面输入您需要转换的json串 ，本地会实时转换。</p>
</div>

<div class="row">
<form action="" method="POST">
    <div class="row">
        <div class="row">
            <textarea class="form-control" rows="5" onkeyup="tranJson();" id="inputJson" name="inputJson" ><?php echo $inputJson;?></textarea>
        </div>
    </div>
    <br /><br />

    <div class="row">
        <textarea class="well"  id="formatJson" name="" id="" style="width: 100%;height:100%;overflow-y:visible;">这里将会实时显示结果</textarea>
    </div>

    <br/ >
示例：{"ret":0,"data":{"title":"Hello World","content":"Welcome to use Web Tools!","verion":"1.0.0","time":1415982826},"msg":""}
    <br /><br />

</form>
<br />

更多选择：
<a href="http://www.kjson.com/jsonparser/">JSON在线视图</a>&nbsp;&nbsp;
</div> <!-- row -->

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/json3/3.3.2/json3.js"></script>
<script type="text/javascript">
function tranJson() {
	var str = $("#inputJson").val();
    var result = '';
    var formatJsonBox = $('#formatJson');
    formatJsonBox.css('height','auto');
    try{
        if (str.length > 0) {
            var obj = JSON.parse(str);
            result = formatJson(obj, '', false);
            formatJsonBox.val(result);
            formatJsonBox.height(formatJsonBox[0].scrollHeight);
        } else {
            formatJsonBox.val('');
        }
    }catch(e){
        result = 'Valide JSON String';
        formatJsonBox.val(result);
    }
}

function formatJson(res, space, isNodeFromArr)
{
    var resStr = '';
    var insideSpace = space + "    ";
    isNodeFromArr = isNodeFromArr == 'undefined' ? true : isNodeFromArr;
    if (res instanceof Array) {
        resStr += isNodeFromArr ? space + "[\n" : "[\n";
        for (var i = 0; i < res.length; ++i) {
            if (res[i] instanceof Object || res[i] instanceof Array) {
                resStr += formatJson(res[i], space + "    ", true) + ",\n";
            } else {
                resStr += insideSpace + "\"" + res[i] + "\",\n";
            }
        }
        if (res.length > 0) {
            resStr = resStr.substr(0, resStr.length - 2)  + "\n";;
        }
        resStr += space + "]";
    } else if (res instanceof Object) {
        resStr += isNodeFromArr ? space + "{\n" : "{\n";
        for (var k in res) {
            resStr += insideSpace + "\"" + k + "\": ";
            if (res[k] instanceof Object || res[k] instanceof Array) {
                resStr += formatJson(res[k], space + "    ", false);
            } else {
                resStr += "\"" + res[k] + "\"";
            }
            resStr += ",\n";
        }
        if (res) {
            resStr = resStr.substr(0, resStr.length - 2) + "\n";
        }
        resStr += space + "}";
    }
    return resStr;
}

</script>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>
