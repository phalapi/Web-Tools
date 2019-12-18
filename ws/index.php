<?php
/**
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
require_once dirname(__FILE__) . '/../common.php';
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>
<style>
    .highlight {
        padding: 9px 14px;
        margin-bottom: 14px;
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
        border-radius: 8px;
    }
</style>
<br>
<div class="row">

    <h2 class="text-center">webSocket在线调试</h2>
    <hr>

    <div class="col-lg-5">
        <div>
            <input type="text" class="form-control" id="host" name="host" placeholder="ws://host:port">
        </div>
        <br>
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="connect" class="btn btn-success" onclick="wsConnect()">连接</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="close" class="btn btn-danger" onclick="wsClose()">断开</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="send" class="btn btn-info" onclick="wsSend()">发送</button>
            </div>
        </div>

        <hr>

        <div class="row">
            <figure class="highlight">
                发送窗口
            </figure>
            <div>
                <textarea class="form-control" rows="10" id="word" name="word"></textarea>
            </div>
        </div>
    </div>




    <div>
        <div  class="col-lg-6 col-lg-offset-1 panel panel-default" id="content">
            <div class="panel-heading">
                <h3 class="panel-title">
                    对话窗口
                </h3>
            </div>
            <div class="panel-body" id="content">

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
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    var lockReconnect = false;  //避免ws重复连接
    $(function () {
        wsConnect();
        wsSend();
        wsClose();
    });
function wsConnect(){
    var host = $("#host").val();
    ws = createWebSocket(host)
    ws.onopen = function (evt) {
        heartCheck.reset().start();      //心跳检测重置
        console.log("Connection open ...");
        ws.send("Hello WebSockets!");
        var html = '<p>连接已成功</p>';
        document.getElementById("content").innerHTML += html;
        document.getElementById("connect").setAttribute("disabled",true);
    };

    ws.onmessage = function (event) {
        if (typeof event.data === String) {
            console.log("Received data string");
        }

        if (event.data instanceof ArrayBuffer) {
            var buffer = event.data;
            console.log("Received arraybuffer");
        }
        console.log("Received Message: " + event.data);
        // 获取时间
        var date = new Date();
        var seperator1 = "-";
        var seperator2 = ":";
        var month = date.getMonth() + 1<10? "0"+(date.getMonth() + 1):date.getMonth() + 1;
        var strDate = date.getDate()<10? "0" + date.getDate():date.getDate();
        var currentdate = date.getFullYear() + seperator1  + month  + seperator1  + strDate
            + " "  + date.getHours()  + seperator2  + date.getMinutes()
            + seperator2 + date.getSeconds();
        var html = "<p><font color='blue'>服务器 " + currentdate + "</font><br>" + event.data + "<br>";
        document.getElementById("content").innerHTML += html;
    };

    ws.onerror = function (event) {
        var html = '<p>连接异常,正在重试连接</p><br>';
        reconnect(host);
        document.getElementById("content").innerHTML += html;
    };

}

function wsSend() {
    //发送文本
    var word = $("#word").val();
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1<10? "0"+(date.getMonth() + 1):date.getMonth() + 1;
    var strDate = date.getDate()<10? "0" + date.getDate():date.getDate();
    var currentdate = date.getFullYear() + seperator1  + month  + seperator1  + strDate
        + " "  + date.getHours()  + seperator2  + date.getMinutes()
        + seperator2 + date.getSeconds();
    var html = "<p><font color='red'>我 " + currentdate + "</font><br>" + word + "<br>";
    document.getElementById("content").innerHTML += html;
    ws.send(word);
    $("#word").val('');
    // //发送Blob数据
    // var file = document
    //     .querySelector('input[type="file"]')
    //     .files[0];
    // ws.send(file);
    // //发送ArrayBuffer
    // var img = canvas_context.getImageData(0, 0, 400, 320);
    // var binary = new Uint8Array(img.data.length);
    // for (var i = 0; i < img.data.length; i++) {
    //     binary[i] = img.data[i];
    // }
    // ws.send(binary.buffer);
    //
    // //webSocket.bufferedAmount
    // //bufferedAmount属性，表示还有多少字节的二进制数据没有发送出去。它可以用来判断发送是否结束
    // var data = new ArrayBuffer(10000000);
    // socket.send(data);
    //
    // if (socket.bufferedAmount === 0) {
    //     // 发送完毕
    // } else {
    //     // 发送还没结束
    // }
}

function wsClose() {
    ws.close();
    var html = '<p>连接已断开</p>';
    document.getElementById("content").innerHTML += html;
    document.getElementById("send").setAttribute("disabled", true);
    document.getElementById("connect").removeAttribute("disabled");
    document.getElementById("close").setAttribute("disabled", true);
    console.log("Connection closed.");
}

function createWebSocket(url) {
    try{
        if('WebSocket' in window){
            ws = new WebSocket(url);
            return ws;
        }else if('MozWebSocket' in window){
            ws = new MozWebSocket(url);
            return ws;
        }else{
           alert("您的浏览器不支持websocket协议,建议使用新版谷歌、火狐等浏览器，请勿使用IE10以下浏览器，360浏览器请使用极速模式，不要使用兼容模式！");
        }
    }catch(e){
        reconnect(url);
        console.log(e);
    }
}

function reconnect(url) {
    if(lockReconnect) return;
    lockReconnect = true;
    setTimeout(function () {     //没连接上会一直重连，设置延迟避免请求过多
        createWebSocket(url);
        lockReconnect = false;
    }, 2000);
}

    //心跳检测
    var heartCheck = {
        timeout: 540000,        //9分钟发一次心跳
        timeoutObj: null,
        serverTimeoutObj: null,
        reset: function(){
            clearTimeout(this.timeoutObj);
            clearTimeout(this.serverTimeoutObj);
            return this;
        },
        start: function(){
            var self = this;
            this.timeoutObj = setTimeout(function(){
                ws.send("ping");
                console.log("ping!")
                self.serverTimeoutObj = setTimeout(function(){
                    //如果超过一定时间还没重置，说明后端主动断开了
                    ws.close();     //如果onclose会执行reconnect，我们执行ws.close()就行了.如果直接执行reconnect 会触发onclose导致重连两次
                }, self.timeout)
            }, this.timeout)
        }
    }
</script>

