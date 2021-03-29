<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 10:30
 */
   include("../demo/DB.class.php");
   $db = new DB();
   $res = $db->findAll('gbrand');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="game_do.php" method="post" enctype="multipart/form-data" onsubmit="return check_submit()">
<table border="1">
    <tr>
        <td>游戏名称</td>
        <td><input type="text" name="g_name" id="g_name" onblur="check_name()">
            <span id="span_name"><font color=""></font></span>
        </td>
    </tr>
    <tr>
        <td>游戏价格</td>
        <td>
            <input type="text" name="g_price" id="g_price" onblur="check_price()">
            <span id="span_price" ><font></font></span>
        </td>
    </tr>
    <tr>
        <td>游戏描述</td>
        <td><textarea name="g_desc" id="" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
        <td>品牌</td>
        <td>
            <select name="b_id" id="">
               <?php foreach ($res as $k=>$v){ ?>
                   <option value="<?php echo $v['b_id']?>"><?php echo $v['b_name']?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>游戏图片</td>
        <td><input type="file" name="g_img" id=""></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="提交"></td>
    </tr>
</table>
</form>
</body>
</html>
<script>
     function check_name() {
         var g_name = document.getElementById('g_name').value;
         var  span_name = document.getElementById('span_name');
         var reg_name = /^[\u4e00-\u9fa5]{2,4}$/;//中文2-4位
         if (g_name ==''){
             span_name.innerHTML="<font color='red'>游戏名称必填</font>";
             return false;
         }else if(reg_name.test(g_name) == false){
             span_name.innerHTML="<font color='red'>游戏名称必须为中文且2-4位</font>";
             return false;
         } else{
             // span_name.innerHTML="<font color='green'>√</font>";
             //             // return true;
             var sign = false;
             //实例化ajax对象
             var xhr = new XMLHttpRequest();

             //回调函数
             xhr.onreadystatechange=function(){
                 if (xhr.status==200 && xhr.readyState==4){
                       if (xhr.responseText =='yes'){
                           span_name.innerHTML="<font color='red'>游戏名称已存在</font>";
                           sign = false;
                       } else{
                           span_name.innerHTML="<font color='green'>√</font>";
                           sign = true;
                       }
                  }
             };
             //发送请求
             xhr.open('get','check_name.php?g_name='+g_name,false);

             //发送
             xhr.send(null);
             return sign;
         }
     }
     function check_price() {
         var g_price = document.getElementById('g_price').value;
         var span_price = document.getElementById('span_price');
         var reg_price = /^[1-9]\d{2,6}$/;//第一位非0，  3-7
         if (g_price==''){
             span_price.innerHTML="<font color='red'>游戏价格必填</font>";
             return false;
         } else if(reg_price.test(g_price)==false){
             span_price.innerHTML="<font color='red'>游戏价格必须为3-7之间且首位不能为0</font>";
             return false;
         }else{
             span_price.innerHTML="<font color='green'>√</font>";
             return true;
         }
     }

     function check_submit() {
         if (check_name()&&check_price()){
             return true;
         } else{
             return false;
         }
     }

</script>
