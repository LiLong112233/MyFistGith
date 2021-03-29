// $("a").on( 'click', function (e) {
//      e.preventDefault()
//     let aa=this.text
//     let href =$("a").attr('href')
//     console.log(aa)
//     console.log(href)
// })
// $("#btn").on('click',function () {
//       $("#btn").val('BBB')
// })
// var user=$("#form1 :input[name=user_name]").on('blur',function () {
//      console.log (user.val())
//     $(this).val('Hello  Jqeury')
// })
//
// let ul=$("#ul :first-child").text()
// console.log(ul)
// //获取子元素
// let ul1=$("#ul1").children()
// console.log(ul1)
// //获取兄弟元素
// let ul2 = $("#ul1").siblings()
// console.log(ul2)
// //获取父元素
// let ul3=$("#ul1").parent()
// console.log(ul3)
// //获取所有祖先元素
// let ul4=$("#ul1").parents()
// console.log(ul4)
// //获取下一个相邻的兄弟元素
// let ul5=$("#ul1").next()
// console.log(ul5)
// //获取后面的所有相邻的兄弟元素
// let ul6=$("#ul1").nextAll()
// console.log(ul6)
// //获取相邻的上一个兄弟元素
// let ul7=$("#ul3").prev()
// console.log(ul7)
// //获取前边的所有相邻兄弟元素
// let ul8 =$("#ul3").prevAll()
// console.log(ul8)
// //获取元素集合中的最后一个
// let ul9 =$("#ul1 li").last()
// console.log(ul9)
// //获取元素集合中的第一个
// let ul10 =$("#ul1 li").first()
// console.log (ul10)
// //在后代元素中查找
// let ul11=$("#ul1").find("li").last()
// console.log(ul11)
// //获取元素集合的偶数索引元素
// let ul12 =$("#ul1 li").even()
// console.log(ul12)
// //获取元素集合中的奇数索引元素
// let ul13 =$("#ul1 li").odd()
// console.log(ul13)

//jQuery是什么?一个类库 jQuery是一个快速、小巧且功能丰富的JavaScript库，
// 它通过一个易于使用的跨多种浏览器的API，使HTML文档遍历操作、
// 事件处理、动画和Ajax等事情变得简单得多。结合了多功能性和可扩
// 展性
$("#btn1").on('click',function () {
  $("#div1").attr('style',"background-color:red;width:150px;height:150px; border : 3px solid black ")
})

$("#btn2").on('click',function () {
  $("#div1").attr('style',"background-color:blue;width:150px;height:150px; border : 3px solid black ")
})

$("#btn3").on('click',function () {
  $("#div1").attr('style',"background-color:green;width:150px;height:150px; border : 3px solid black ")
})
$(".ul1 li").even().on('mouseenter',function () {

    $(this) .attr('style',"background-color:green;")


    })
$(".ul1 li").even().on('mouseleave',function () {

    $(this) .attr('style',"")


    })
$(".ul1 li").odd().on('mouseenter',function () {

    $(this) .attr('style',"background-color:red;")


    })
$(".ul1 li").odd().on('mouseleave',function () {

    $(this) .attr('style',"")

    })

