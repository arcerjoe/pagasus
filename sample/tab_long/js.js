/**
 * 
 * @author lijun@cncn.com
 * @date    2016-03-31 14:46:08
 * @version 
 */

var tabScroll = function(obj,titElem,conElem,barHeight,num){
    $(obj).find(titElem).each(function(i){
        $(this).on('click',function(){
            $('html,body').animate({scrollTop: $(conElem).eq(i).offset().top - barHeight});
        });
    }).eq(num).trigger('click');
    $(window).on('scroll',function(){
        if($(document).scrollTop() > $(obj).offset().top){
            $(obj).find(titElem).parent().addClass('fixed')
        }else{
            $(obj).find(titElem).parent().removeClass('fixed')
        };
        $(obj).find(conElem).each(function(i){
            var windowTop = $(window).scrollTop(),
                elemTop = $(obj).find(conElem).eq(i).offset().top - barHeight;
            if(windowTop >= elemTop){
                $(obj).find(titElem).eq(i).addClass('cur').siblings().removeClass('cur');
            }
        })
    })
}
window.tabScroll = tabScroll;
window.tabScroll('#J_info_tabs','.li','.tabs_item', 160, 1)