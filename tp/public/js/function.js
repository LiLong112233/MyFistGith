function ajax(method,url,callback,params) {
let p="&"
for (const k in params){
    p+=k+ '='+params[k]+'&'
}
let new_url = url+p;
    //1实例化
    let xhr =new XMLHttpRequest()
    //2监控readyState
    xhr.onreadystatechange=function () {
        if (xhr.readyState==4&&xhr.status==200) {
            let data = JSON.parse(xhr.responseText)
            callback(data)    //处理服务器响应
        }
    }
    //3初始化网络请求
    xhr.open(method,new_url)
    xhr.send()
}