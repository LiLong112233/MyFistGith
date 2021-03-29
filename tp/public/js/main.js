//服务器地址
let url = 'http://tp.2008.com/index.php?s=user/Index/ajax';
//获取
let user_name=document.getElementById('user_name')
let email=document.getElementById('email')
let tel =document.getElementById('tel')
// var res=/^[a-zA-Z]{4,}$/
// user_name.addEventListener('blur',function (){
//     if (this.value){
//         if (res.test(this.value)){
//             var xhr=new XMLHttpRequest();
//             xhr.onreadystatechange=function(){
//                 if (xhr.readyState==4 &&xhr.status==200){
//                     var json_str = xhr.responseText
//                     var od = JSON.parse(json_str);
//                     if (od.error==0){
//                         span_name.innerHTML="<font>√</font>"
//                     }else{
//                         span_name.innerHTML="<font>用户名已存在</font>"
//                         form.addEventListener('click',function (e){
//                             e.preventDefault();
//                         })
//
//                     }
//                 }
//             }
//             xhr.open("GET","/index.php?s=user/Index/ajax_name&user_name="+this.value);
//             xhr.send();
//         }else{
//             span_name.innerHTML="<font>你的用户名不合法，用户名必须为英文字母，不能包含特殊符号，且长度不能少于4位\n</font>"
//             form.addEventListener('click',function (e){
//                 e.preventDefault();
//             })
//         }
//     } else{
//         span_name.innerHTML="<font>用户名不能为空</font>"
//         form.addEventListener('click',function (e){
//             e.preventDefault();
//         })
//     }
// })
// var user_email=document.getElementById("email")
// var span_email=document.getElementById("span_email")
// var aaa=/^\w+@[a-z0-9]+(\.[a-z]+){1,3}$/
// user_email.addEventListener('blur',function (){
//     if (this.value){
//         if (aaa.test(this.value)){
//             var xhr=new XMLHttpRequest();
//             xhr.onreadystatechange=function(){
//                 if (xhr.readyState==4 &&xhr.status==200){
//                     var json_str = xhr.responseText
//                     var od = JSON.parse(json_str);
//                     if (od.error==0){
//                         span_email.innerHTML="<font>√</font>"
//                     }else{
//                         span_email.innerHTML="<font>Email邮箱地址已存在</font>"
//                     }
//                 }
//             }
//             xhr.open("GET","/index.php?s=user/Index/ajax_email&email="+this.value);
//             xhr.send();
//             form.addEventListener('click',function (e){
//                 e.preventDefault();
//             })
//         } else{
//             span_email.innerHTML="<font>您的邮箱不合法</font>"
//             form.addEventListener('click',function (e){
//                 e.preventDefault();
//             })
//         }
//     } else{
//         span_email.innerHTML="<font>Email不能为空</font>"
//         form.addEventListener('click',function (e){
//             e.preventDefault();
//         })
//     }
// })
// var tel=document.getElementById('tel')
// var span_tel=document.getElementById('span_tel')
// var bbb =/^[0-9]{1,}$/
// tel.addEventListener('blur',function () {
//     if (this.value){
//         if (bbb.test(tel)){
//             var xhr=new XMLHttpRequest();
//             xhr.onreadystatechange=function(){
//                 if (xhr.readyState==4&& xhr.status==200){
//                     var json_str = xhr.responseText
//                     var otel=JSON.parse(json_str);
//                     if (otel.error==0){
//                         span_tel.innerHTML="<font>√</font>"
//                     } else{
//                         span_tel.innerHTML="<font>该手机号已存在</font>"
//                     }
//                 }
//             }
//             xhr.open("GET","/index.php?s=user/Index/ajax_tel&tel="+this.value)
//             xhr.send();
//             form.addEventListener('click',function (e){
//                 e.preventDefault();
//             })
//         } else{
//             span_tel.innerHTML="<font>手机号必须为纯数字</font>"
//             form.addEventListener('click',function (e){
//                 e.preventDefault();
//             })
//         }
//     } else{
//         span_tel.innerHTML="<font>手机号码不能为空</font>"
//         form.addEventListener('click',function (e){
//             e.preventDefault();
//         })
//     }
// })
// var pass=document.getElementById('pass')
// var pass2=document.getElementById('pass2')
//
// pass2.addEventListener('blur',function () {
//     var op1=pass.value;
//     var op2=pass2.value;
//     if (op1!=op2){
//         alert("您的密码与确认密码不相同")
//         form.addEventListener('click',function (e){
//             e.preventDefault();
//         })
//     }
// })
    //验证用户名
user_name.addEventListener('blur',function (e) {
    console.log('验证用户名')
    //发送的参数
    let params={
        user_name:this.value
    }
    let callback = function (d) {
        alert(d.msg)
    }
    ajax('get',url,callback,params)
})
//验证email
email.addEventListener('blur',function (e) {
    console.log('验证Email')
    //发送的参数
    let params={
        email:this.value
    }
    //处理服务器响应
    let callback =function (d) {
     alert(d.msg)
    }
    ajax('get',url,callback,params)
})
//验证tel
tel.addEventListener('blur',function (e) {
    console.log("验证手机号")
    //发送参数
    let params ={
        tel:this.value
    }
    //处理服务器响应
    let callback = function (d) {
      alert(d.msg)
    }
  ajax('get',url,callback,params)
})
//验证密码
var op1=document.getElementById('pass')
var op2=document.getElementById('pass2')
op2.addEventListener('blur',function () {
    //先获取pass的值
    var pass=op1.value
    var pass2=op2.value

    if (pass!=pass2){
        alert('密码不一致')
        return
    } else{
        console.log("密码OK")
    }


})
