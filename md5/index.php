<?php
/**
 * 在线md5转换
 * User: 何晓宏
 * Date: 2019/1/12
 * Time: 16:06
 */
?>

<?php
/** ---------------------------------- PHP Handle -------------------------------**/
?>

<?php
require_once dirname(__FILE__) . '/../common.php';
?>

<?php

$outputMD5 = 'md5';
$inputMD5 = '';

if (isset($_POST['inputMD5'])) {
    $inputMD5 =  trim($_POST['inputMD5']);


    $outputMD5 = md5($inputMD5);

}



?>

<?php
/** ---------------------------------- HTML Template -------------------------------**/
?>

<?php
require WEB_TOOLS_ROOT . '/header.html';
?>

<div class="projects-header page-header">
    <h2 id="theColorYouLike"><?php echo isset($_POST['$inputMD5']) ? $outputMD5 : '请输入';?></h2>
    <p>请输入需要转化为md5的字符串</p>
</div>

<div class="row">
    <div class="row">
        <form action="" method="POST">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-4">
                <input type="text" class="form-control" placeholder="请在这里输入字符串" name="inputMD5" value="<?php echo $inputMD5;?>">
            </div>
            <div class="col-xs-4">
                <input type="submit" class="btn btn-success" value="智能转换" >
            </div>
        </form>
    </div>

    <br />



    <br /><br />
    <h3>猜你需要：</h3>

    <table class="table table-hover">
        <tr>
            <td>转换结果：</td>
            <td><?php  echo $outputMD5; ?></td>
            <td>转换大写</td>
            <td><?php  echo strtoupper($outputMD5) ; ?></td>
        </tr>
        <tr>
            <td>两次MD5加密：</td>
            <td><?php  echo md5($outputMD5) ; ?></td>
            <td>两次MD5加密转换大写：</td>
            <td><?php  echo strtoupper(md5($outputMD5)) ; ?></td>
        </tr>
        <tr>
            <td>base64加密:</td>
            <td><?php  echo base64_encode($inputMD5) ; ?></td>
            <td>base64解密:</td>
            <td><?php  echo base64_decode($inputMD5) ; ?></td>
        </tr>
        <tr>
            <td>MD5+base64:</td>
            <td><?php  echo base64_encode($outputMD5) ; ?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br /><br />



</div> <!-- row -->

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

