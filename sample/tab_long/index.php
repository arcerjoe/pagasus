<?php include "../../assets/template/sample_header.html";?>
<div class="area_directions">
    <div class="title">文档说明</div>
    <ul>
        <li>模块来源：<a href="http://192.168.1.5:753/info?id=10004">应用中心详情页</a></li>
        <li>引入模块后，只需要全局FastClick.attach(document.body);命名一下。就能绑定默认的click事件了。可以很顺畅的过渡旧代码。</li>
        <li>无毒副作用</li>
    </ul>
</div>
<div class="area_code">
    <div class="title">代码结构</div>
    <pre class="brush: xml"> 
        <!-- info_tabs -->
        <div class="info_tabs" id="J_info_tabs">
            <!-- tabs_menu_outside -->
            <div class="tabs_menu_outside">
                <ul class="tabs_menu clearfix fixed">
                    <li class="li cur"><span>应用介绍</span></li>
                    <li class="li"><span>相关应用</span></li>
                    <li class="li"><span>用户评价</span></li>
                </ul>
            </div>
            <!-- /tabs_menu_outside -->
            <!-- tabs_content -->
            <div class="tabs_content">
                <!-- module1 -->
                <div class="module tabs_item application_message" style="background: #ffc1c1; height: 300px;">
                </div>
                <!-- /module1 -->
                <!-- module2 -->
                <div class="module tabs_item" style="background: #fe6464; height: 500px;">
                </div>
                <!-- /module2 -->
                <!-- module3 -->
                <div class="module tabs_item user_appraise" style="background: #ff3939; height: 1000px;">
                </div>
                <!-- /module3 -->
            </div>
            <!-- /tabs_content -->
        </div>
        <!-- /info_tabs -->
    </pre>
    <pre class="brush: js"> 
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
    // 调用方法
    window.tabScroll('#J_info_tabs','.li','.tabs_item', 160, 1)
    </pre> 
</div>
<div class="area_demo">
    <div class="title"><a href="demo/index.html">模块展示</a></div>
    <div class="content">
        <iframe src="demo/index.html" frameborder="no"></iframe>
    </div>
</div>
<div class="area_path">
    <div class="title">模块位置</div>
    <div class="mt10">
        b2b/static/js/mobile/fastclick.min.js<br />
        <a href="http://192.168.1.158:701/static/js/mobile/fastclick.min.js">链接下载</a>
    </div>
</div>
<div class="area_path">
    <div class="title">版本记录</div>
    <div class="mt10">
        v1.0 应用中心第一版开发至发布用
    </div>
</div>
<?php include "../../assets/template/sample_footer.html";?>