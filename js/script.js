var typeNumber = 4;
var errorCorrectionLevel = 'L';
var qr = qrcode(typeNumber, errorCorrectionLevel);
var url = window.location.href;
qr.addData(url);
qr.make();
document.getElementById('share-qrcode').innerHTML = qr.createImgTag();
$('.share').hover(function () {
    $("#share-qrcode").removeAttr("hidden");
}, function () {
    $("#share-qrcode").attr("hidden", "hide");
});
//设置登录页面弹出效果
$('.nav-login').click(function () {
    $('.login-form').slideToggle(200);
    if ($('.login-form-mask').css("display") == 'none'){
        $('.login-form-mask').fadeIn(100);
    }else{
        $('.login-form-mask').fadeOut(0);
    }
});
$('.login-form-mask').click(function () {
    $('.login-form').slideUp(200);
    $('.login-form-mask').fadeOut(0);
});

//设置导航栏多级下拉事件
$('.drop-down>span').on('click',function () {
    if($(this).next('ul').hasClass('drop-down-content')){
        //未展开
        $(this).next('ul').slideDown(200);
        $(this).next('ul').removeClass('drop-down-content');
    }else{
        //已展开
        $(this).next('ul').slideUp(200);
        $(this).next('ul').addClass('drop-down-content');
    }
})

//激活live2d组件
loadlive2d("live2d", "http://127.0.0.1/wordpress/wp-content/themes/Otaku-Kimoi/model/katou_01/katou_01.model.json");




