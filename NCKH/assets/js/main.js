// $("#search_input").keyup(function(){
//     $("#form_search").css({'position':'absolute','top':'120px'});
//     $("#show_search").css('margin-top','-530px');
//     let searchText = $(this).val();
//     // console.log(searchText);
//     if (searchText != "") {
//         $.ajax({
//         url: "assets/ajax/action.php",
//         method: "post",
//         data: {
//             query: searchText,
//         },
//         success: function (response) {
//             $("#show-list").html(response);
//         },
//         });
//     } else {
//         $("#show-list").html("");
//     }
// })
// $(".day_num").on('click', function () {
//     let today = document.getElementsByClassName("day_num");
//     console.log(today[2]);
//     for (let index = 0; index < today.length; index++) {
//         console.log(element);
//     }
// });

// $("#today").on('click', function () {
//     let today = document.getElementById("month_year").getAttribute('value');
//     var a = 1
//     console.log(today);
//     alert(today+a);
// });
// $("#previous").on('click', function () {
//     let today = document.getElementById("month_year").getAttribute('value');
//     today ++;
//     let previous = $(this).val();
//     console.log(previous+today);
//     alert(previous+today);
// });
// $("#next").on('click', function () {
//     let today = document.getElementById("month_year").getAttribute('value');
//     today --;
//     let next = $(this).val();
//     console.log(next+today);
//     alert(next+today);
// });
