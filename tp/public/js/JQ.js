$("#user_name").on('blur',function () {
    let name=this.value  //获取当前input中的value
    let res =/^[a-zA-Z0-9_]{1,}$/    //正则
    if (res.test(name)==false){
        document.getElementById('span_name').style.display='block'    //正则判断给提示
    }
    $.ajax({
        type:"get",//ajax提交方式
        url:"http://tp.2008.com/index.php?s=user/Index/ajax&user_name="+name,// URL 地址
        dataType:'json',// 传回数据的类型
    }).done(function (data) {
        if (data.error){
            document.getElementById('span_name2').style.display='block'//根据ajax 传回的值 判断并给出用户提示
        }
    })
})
$("#email").on('blur',function () {
    let mail =this.value
    let sss=/@+/
    if (sss.test(mail)==false){
        document.getElementById('span_email').style.display ='block'
    }
    $.ajax({
        type:'get',
        url:"http://tp.2008.com/index.php?s=user/Index/ajax&email="+mail,
        dataType:'json',
    }).done(function (data) {
      if (data.error){
          document.getElementById('span_email2').style.display='block'
      }

    })
})
$("#tel").on('blur',function () {
    let num=this.value  //获取当前input中的value
    let res =/^1[0-9_]{10}$/    //正则
    if (res.test(num)==false){
        document.getElementById('span_tel').style.display='block'    //正则判断给提示
    }
    $.ajax({
        type:"get",//ajax提交方式
        url:"http://tp.2008.com/index.php?s=user/Index/ajax&tel="+num,// URL 地址
        dataType:'json',// 传回数据的类型
    }).done(function (data) {
        if (data.error){
            document.getElementById('span_tel2').style.display='block'//根据ajax 传回的值 判断并给出用户提示
        }
    })
})
    let passs=$("#pass")
        passs.on('blur',function () {
    let ps = this.value
    let pas=/^[a-zA-Z0-9+._]{7,}$/
    if (pas.test(ps)==false){
        document.getElementById('span_pass').style.display='block'

    }
})
  var op1 =document.getElementById('pass')
  var op2=document.getElementById('pass2')
   op2.addEventListener('blur',function () {
    //先获取pass的值
    var pass=op1.value
    var pass2=op2.value

    if (pass!=pass2){
        document.getElementById('span_pass2').style.display='block'
    }

})

// //定义数组
// var arr=['apple','badfd','con','donm'];
// //访问数组
// // alert(arr['0'])
// // alert(arr['1'])
// //向数组添加元素
// arr.push("egg")
// //删除末尾数组元素
// arr.pop();
// //向头部添加元素
// arr.unshift("aaaaaa")
// //删除头部元素
// arr.shift()
// //查找某个元素在数组中的位置
// // alert(arr.indexOf("con"))
// //通过索引删除某个元素
//   arr.splice("3",1)//引号里表示索引位置，1表示删除1个
// //获取数组长度
//  alert(arr.length)
// //遍历数组
// arr.forEach(function (v,k) {
//     alert(v)?
// })
//
//定义
let arr=[11,22,33,44,55];
//向数组末尾添加元素
arr.push("66")
//向数开头添加元素
arr.unshift("00")
//删除数组末尾的元素
//  arr.pop()
//删除数组开头的元素
arr.shift()
//查找某个元素在数组中的位置
//  alert(arr.indexOf(55))
//通过索引删除某个元素
arr.splice(5,1)
//获取数组长度
alert(arr.length)
//遍历
arr.forEach(function (v,k) {
    alert(v)
})