<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 14:04
 */
   include("../../DB.class.php");
   $db = new DB();
   $res =$db->findAll('brand');
//   print_r($res);

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
<form action="car_do.php" method="post" enctype="multipart/form-data">
<table border="1">
    <tr>
        <td>车名</td>
        <td>
            <input type="text" name="c_name">
        </td>
    </tr>
    <tr>
        <td>车价格</td>
        <td>
            <input type="text" name="c_price">
        </td>
    </tr>
    <tr>
        <td>是否上架</td>
        <td>
            <input type="radio" name="is_new" id="" value="是" checked>是
            <input type="radio" name="is_new" id="" value="否">否
        </td>
    </tr>
    <tr>
        <td>车主</td>
        <td><input type="text" name="c_man"></td>
    </tr>
    <tr>
        <td>品牌</td>
        <td>
            <select name="b_id" id="">
                <?php foreach ($res as $k=>$v){ ?>
                    <option value="<?php echo $v['b_id'] ?>"><?php echo $v['b_name']?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>车展</td>
        <td>
            <input type="file" name="c_img" id="">
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="提交"></td>
    </tr>
</table>
</form>
</body>
</html>

