<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:47
 */
include ("../DB.class.php");
$db = new DB();
$arr = $db->findAll('class');

$s_id = $_GET['s_id'];
$where =[
    ['s_id','=',$s_id]
];
$res = $db->where($where)->find('student');
//print_r($res);
?>

<form action="student_update_do.php" method="post">
    <table border="1">
        <input type="hidden" name="s_id" value="<?php echo $res['s_id']?>">
        <tr>
            <td>姓名</td>
            <td>
                <input type="text" name="s_name" value="<?php echo $res['s_name']?>">
            </td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                <?php if($res['s_sex']=="男"){?>
                <input type="radio" name="s_sex" id="" value="男" checked>男
                <input type="radio" name="s_sex" id="" value="女">女
                <?php }else{?>
                    <input type="radio" name="s_sex" id="" value="男" >男
                    <input type="radio" name="s_sex" id="" value="女" checked>女
                <?php }?>
            </td>
        </tr>
        <tr>
            <td>年龄</td>
            <td>
                <select name="s_age" id="">
                    <?php  for($i=15;$i<=30;$i++){?>
                        <option value="<?php echo $i ?>" <?php if($res['s_age']==$i){ echo "selected";}?>><?php echo $i ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>地址</td>
            <td>
                <input type="text" name="s_address" value="<?php echo $res['s_address']?>">
            </td>
        </tr>
        <tr>
            <td>班级</td>
            <td>
                <select name="c_id" id="">
                    <?php foreach ($arr as $k=>$v){ ?>
                        <option value="<?php echo $v['c_id'] ?>" <?php if($res['c_id']==$v['c_id']){echo "selected";}?>><?php echo $v['c_name']?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="修改">
            </td>
        </tr>
    </table>
</form>