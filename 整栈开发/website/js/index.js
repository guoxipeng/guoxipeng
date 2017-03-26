$(function(){
    var $searchIpt = $("#search-ipt");
    $("#search span").on("click", function(){
        alert($searchIpt.val());
    });
    $searchIpt.on("keypress", function(e){
        if(e.which == 13){//表示点击的是回车
            alert($searchIpt.val());
        }
    });



});