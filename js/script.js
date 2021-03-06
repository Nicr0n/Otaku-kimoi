var typeNumber = 6;
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
    if ($('.login-form-mask').css("display") == 'none') {
        $('.login-form-mask').fadeIn(100);
    } else {
        $('.login-form-mask').fadeOut(0);
    }
});
$('.login-form-mask').click(function () {
    $('.login-form').slideUp(200);
    $('.login-form-mask').fadeOut(0);
});

//设置导航栏多级下拉事件
$('.drop-down>span').on('click', function () {
    if ($(this).next('div').hasClass('drop-down-content')) {
        //未展开
        $(this).next('div').slideDown(200);
        $(this).next('div').removeClass('drop-down-content');
    } else {
        //已展开
        $(this).next('div').slideUp(200);
        $(this).next('div').addClass('drop-down-content');
    }
});

//设置右侧推送切换事件
$('.rpt1').on('click', function () {
    $('.recent-comments').fadeOut(0);
    $('.recent-comments').removeClass('rightfadein');
    $('.hot-articles').fadeOut(0);
    $('.hot-articles').removeClass('rightfadein');
    $('.recent-articles').fadeIn(0);
    $('.recent-articles').addClass('rightfadein')
});

$('.rpt2').on('click', function () {
    $('.recent-comments').fadeOut(0);
    $('.recent-comments').removeClass('rightfadein');
    $('.recent-articles').fadeOut(0);
    $('.recent-articles').removeClass('rightfadein');
    $('.hot-articles').fadeIn(0);
    $('.hot-articles').addClass('rightfadein')

});

$('.rpt3').on('click', function () {
    $('.recent-articles').fadeOut(0);
    $('.recent-articles').removeClass('rightfadein');
    $('.hot-articles').fadeOut(0);
    $('.hot-articles').removeClass('rightfadein');
    $('.recent-comments').fadeIn(0);
    $('.recent-comments').addClass('rightfadein');
});

//html转义
function html_encode(str) {
    var s = "";
    if (str.length == 0) return "";
    s = str.replace(/&/g, "&amp;");
    s = s.replace(/</g, "&lt;");
    s = s.replace(/>/g, "&gt;");
    s = s.replace(/\'/g, "&#39;");
    s = s.replace(/\"/g, "&quot;");
    return s;
}

//点击事件,包括切换页面和显示源代码
$('.dropdown-item').on('click', function () {
    if ($('#inner_page').length>0){
        $('#inner_page').remove();
        $('#code').remove();
        $('#represent-nav').after("<iframe class=\"embed-responsive-item\" id=\"inner_page\" src=\""+$(this).attr('data')+" \"></iframe>");
        $('#inner_page').on('load', function () {
            var h = $(this).contents().find("html").height()+50;
            $(this).height(h);
            $('#inner_page').after("<pre id='code'><code class='line-numbers language-html'>" + html_encode($('#inner_page').contents().find('html').html()) + "</code></pre>");
            Prism.highlightAll();
        });
    } else{
        $('#represent-nav').after("<iframe class=\"embed-responsive-item\" id=\"inner_page\" src=\""+$(this).attr('data')+" \"></iframe>");
        $('#inner_page').on('load', function () {
            $('#inner_page').after("<pre id='code'><code class='line-numbers language-html'>" + html_encode($('#inner_page').contents().find('html').html()) + "</code></pre>");
            Prism.highlightAll();
        });
    }
});

function getRootPath() {
    //获取当前网址，如： http://localhost:8083/uimcardprj/share/meun.jsp
    var curWwwPath = window.document.location.href;
    //获取主机地址之后的目录，如： uimcardprj/share/meun.jsp
    var pathName = window.document.location.pathname;
    var pos = curWwwPath.indexOf(pathName);
    //获取主机地址，如： http://localhost:8083
    var localhostPaht = curWwwPath.substring(0, pos);
    //获取带"/"的项目名，如：/uimcardprj
    var projectName = pathName.substring(0, pathName.substr(1).indexOf('/') + 1);
    return (localhostPaht + projectName);
}

console.log(document.domain);
//激活live2d组件
// loadlive2d("live2d", "https://"+document.domain+"/wp-content/themes/Otaku-kimoi/model/katou_01/katou_01.model.json");




