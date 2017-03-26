require.config({
    paths : {
        "jquery" : "jquery-1.12.4"
    }
});
require(["jquery", "dialog"], function($, Dialog){
    $("#open").on("click", function(){
        var settings = {
            width : 500,
            height : 400,
            title : "我的弹出层",
            content : "login.html"
        };

        var dialog = new Dialog();
        dialog.open(settings);
       /* var settings = {
            width : 500,
            height : 400,
            title : "我的弹出层",
            content : "login.html"
        };
        dialog.open(settings);*/
    });
});