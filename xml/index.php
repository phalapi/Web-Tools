<?php
/**
 * XML格式化
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
    <h2>请输入要格式化的xml</h2>
    <p>输入xml后，会自动进行格式化。</p>
</div>

<div class="row">
<!-- TODO: 请在下面进行界面展示处理 -->

<form action="" method="POST">

    <div class="row">
        <div class="col-lg-5">
            <h3>xml代码：</h3>
            <div class="row">
                <textarea class="form-control" rows="20" onkeyup="xmlFormatFun();" id="xmlStr" name="xmlStr" ></textarea>
            </div>
        </div>

        <div class="col-lg-5 col-lg-offset-2">
            <h3>格式化后：</h3>
            <div class="row">
                <textarea class="form-control" rows="20" id="formatXml" name="formatXml"></textarea>
            </div>
        </div>

    </div>
</form>
<br />


</div>

<?php
 /** ---------------------------------- JS Functions -------------------------------**/
?>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/json3/3.3.2/json3.js"></script>

<script type="text/javascript">

    function formateXml(xmlStr){
        text = xmlStr;
        //使用replace去空格
        text = '\n' + text.replace(/(<\w+)(\s.*?>)/g,function($0, name, props){
            return name + ' ' + props.replace(/\s+(\w+=)/g," $1");
        }).replace(/>\s*?</g,">\n<");
        //处理注释
        text = text.replace(/\n/g,'\r').replace(/<!--(.+?)-->/g, function($0, text){
            var ret = '<!--' + escape(text) + '-->';
            return ret;
        }).replace(/\r/g,'\n');

        //调整格式  以压栈方式递归调整缩进
        var rgx = /\n(<(([^\?]).+?)(?:\s|\s*?>|\s*?(\/)>)(?:.*?(?:(?:(\/)>)|(?:<(\/)\2>)))?)/mg;
        var nodeStack = [];
        var output = text.replace(rgx,function($0,all,name,isBegin,isCloseFull1,isCloseFull2 ,isFull1,isFull2){
        var isClosed = (isCloseFull1 == '/') || (isCloseFull2 == '/' ) || (isFull1 == '/') || (isFull2 == '/');
        var prefix = '';
        if(isBegin == '!'){//!开头
            prefix = setPrefix(nodeStack.length);
        }else {
            if(isBegin != '/'){///开头
                prefix = setPrefix(nodeStack.length);
                if(!isClosed){//非关闭标签
                    nodeStack.push(name);
                }
            }else{
                nodeStack.pop();//弹栈
                prefix = setPrefix(nodeStack.length);
            }
        }
        var ret =  '\n' + prefix + all;
        return ret;
        });

        var prefixSpace = -1;
        var outputText = output.substring(1);
        //还原注释内容
        outputText = outputText.replace(/\n/g,'\r').replace(/(\s*)<!--(.+?)-->/g,function($0, prefix,  text){
        if(prefix.charAt(0) == '\r')
        prefix = prefix.substring(1);
        text = unescape(text).replace(/\r/g,'\n');
        var ret = '\n' + prefix + '<!--' + text.replace(/^\s*/mg, prefix ) + '-->';
            return ret;
        });
        outputText= outputText.replace(/\s+$/g,'').replace(/\r/g,'\r\n');
        return outputText;
    }

//计算头函数 用来缩进
function setPrefix(prefixIndex) {
    var result = '';
    var span = '    ';//缩进长度
    var output = [];
    for(var i = 0 ; i < prefixIndex; ++i){
        output.push(span);
    }
    result = output.join('');
    return result;
}

function xmlFormatFun()
{
    var str = $("#xmlStr").val();
    try {
        var enUrl = formateXml(str);
        $("#formatXml").val(enUrl);
    } catch (e) {
        $("#formatXml").val('XML格式化失败！');
    }
}
</script>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>

