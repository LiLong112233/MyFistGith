
// function ajax(method,url,callback) {
//
//            let xhr = new XMLHttpRequest();
//            xhr . onreadystatechange = function () {
//                if (xhr . readyState == 4 && xhr . status == 200) {
//                    callback()
//                }
//                }
//     xhr.open(method, url);
//     xhr.send()
// }
function ahax() {
    //arguments个浏览器传递给函数的隐式参数arguments
    let url= arguments[0].url
    let method=arguments[0].method
    let data=arguments[0].data
    let callback=arguments[0].success


    let xhr =new XMLHttpRequest()
    xhr.onreadystatechange=function () {
        if (xhr.readyState==4&& xhr.status==200 ){
            callback()
        }
    }
    if (method=='get'){
        let param="?"
        for (let k in data){
            param+=k + '='+data[k]+'&'
        }
        console.log(param)
        xhr.open('get',url+param)
        xhr.send(data)
    }
    if (method=='post'){
        xhr.send(JSON.stringify(data))
    }
}