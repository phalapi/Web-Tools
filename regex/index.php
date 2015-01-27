<?php
/**
 * 正则表达式工具
 *  
 * @author: simba.wei 2015-01-26
 */ 

require_once dirname(__FILE__) . '/../common.php';

header('Content-Type', 'text/html;charset=utf-8');


?>


<?php
 /** ---------------------------------- Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<?php 
 /** ----------------------------------- CSS ------------------------------------**/
?>
<style type="text/css">
    #reg-exp {
       font: 100% "courier new",monospace;
    }
    .smart-field b {
       background: none repeat scroll 0 0 #FFF000;
       color: #FFF000;
    }
    .smart-field i {
        background :none repeat scroll 0 0 #80C0FF;
        color: #80C0FF;
    }
    .smart-field textarea{
        background: none repeat scroll 0 0 transparent;
        position:absolute;
        z-index:999;
        font: 100% "courier new",monospace;
    }
    .smart-field span{
        position:absolute;
        z-index: 1;
        padding: 6px 12px;
        background: none;
        white-space: pre-wrap;
        color: #F9F9F9;
        font: 100% "courier new",monospace;
        word-wrap: break-word;
        display: block;
    }
    .form-group label{
        font-weight: normal;
    }
    .projects-header b{
        color: #000;
    }
</style>

<div class="projects-header page-header smart-field">
    <h2>请输入</h2>
    <p>请在下面输入您的正则表达式以及待匹配的文本</p>
    <p>匹配成功的字符串将<b>高亮</b>显示</p>
</div>

<div class="row">
    <div class="row">
        <form action="" class="form-inline" role="form">
            <div class="form-group">
                <input type="checkbox" checked id="match-all">
                <label for="match-all">全局匹配</label>
            </div>&nbsp;&nbsp;
            <div class="form-group">
                <input type="checkbox" id="show-result">
                <label for="show-result">显示match结果</label>
            </div>&nbsp;&nbsp;
            <div class="form-group">
                <input type="checkbox" id="ignore-case">
                <label for="ignore-case">不区分大小写</label>
            </div>&nbsp;&nbsp;
        </form>
        <textarea id="reg-exp" class="form-control" placeholder="请输入正则表达式" name="" rows="5"></textarea>
    </div>
    <p/>
    <div class="row smart-field" style="height:200px;">
        <span id="reg-text-bg"></span>
        <textarea id="reg-text" class="form-control" style="height:200px;max-height:200px;" placeholder="请输入文本" rows="10"></textarea>
    </div>
    <p/>
    <div class="row">
        <pre id ="reg-result" style="display:none">显示匹配结果</pre>
    </div>
</div>


<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //自适应宽度
        $('#reg-text').width($('#reg-exp').width());
        $('#reg-text-bg').width($('#reg-exp').width());
        $(window).resize(function(){
            $('#reg-text').width($('#reg-exp').width());
            $('#reg-text-bg').width($('#reg-exp').width());
        });
        //
        $('#reg-exp').bind('keyup', function(){ 
            match(); 
        });
        $('#reg-text').bind('keyup', function(){ 
            var scrollHeight = $(this)[0].scrollHeight;
            if ($(this).outerHeight() < scrollHeight) {
                $(this).parent('.row').height(scrollHeight);
                $(this).height(scrollHeight);
                $(this).css('max-height', scrollHeight);
            }
            match();
        });
        $('#match-all').change(function(){ match(); });
        $('#ignore-case').change(function(){ match(); });
        $('#show-result').change(function(){
            if ($(this).is(':checked')) {
                $('#reg-result').show();
            } else {
                $('#reg-result').hide();
            }
        });
        
        var replaceByMap = function(map, str)
        {
            var result = str;
            for (var k in map) {
                result = result.replace(eval('/'+ k +'/g'), map[k]);
            }    
            return result;
        }
        //
        var match = function (){
            var regExStr = $('#reg-exp').val();
            var regText = $('#reg-text').val();
            if (!regExStr || !regText) {
                $('#reg-text-bg').html('');
                $('#reg-result').html('显示匹配结果');
                return;
            }
            var map = {
                '&' : '&amp', //必须第一个替换
                '<' : '&lt',
                '>' : '&gt',
                '"' : '&quot'
            };

            regExStr = '/' + regExStr + '/';

            if ($('#match-all').is(':checked') == true) {
                regExStr += 'g';
            }
            if ($('#ignore-case').is(':checked') == true) {
                regExStr += 'i';
            }

            try{
                var regEx = eval(regExStr);
                var result = regText.match(regEx);
                
                regEx = eval(replaceByMap(map, regExStr));

                var i = 0;
                var regTextBg = replaceByMap(map, regText).replace(regEx, function(str){
                    if (i++ % 2 == 0) {
                        return '<b>' +  str + '</b>';
                    } else {
                        return '<i>' +  str + '</i>';
                    }
                }).replace(/&amp|&lt|&gt|&quot/g, '_');
                $('#reg-text-bg').html(regTextBg);
                $('#reg-result').text(JSON.stringify(result)).html();
            } catch(e) {
                $('#reg-text-bg').html('');
                $('#reg-result').html('Invalide RegExp');
            }
        }

        //初使化
        var firstFocus = true;
        var defaultRegExStr = '^(\\w+\\.){3}\\w+$';
        var defaultRegExText = 'webtools.oschina.mopaas.com';

        $('#reg-exp').focus(function(){
            if (firstFocus === false) {
                return;
            }
            firstFocus = false;
            $('#reg-exp').html('');
            $('#reg-text').html('');
            match();            
        });

        $('#reg-exp').html(defaultRegExStr);
        $('#reg-text').html(defaultRegExText);
        match();
    });
</script>

<?php
require WEB_TOOLS_ROOT . '/footer.html';
?>
