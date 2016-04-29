<?php include "../../assets/template/sample_header.html";?>
<div class="area_directions">
    <div class="title">选修基本格式，强迫症患者福音</div>
    <ul>
        <li>一个单位tab缩进，4个空格</li>
        <li>属性和值之间有一个空格；多个参数的时候，逗号后面的预留一个空格；加减操作符之间也一样。eg: $aqua: lighten(#00f, 10%);</li>
    </ul>
</div>
<div class="area_code">
    <div class="title">编码规范教学&讲解</div>
    <pre class="brush: sass"> 
    //变量类

    $red: #f00;
    .elem{
        color: $red;
    }


    //计算
    .elem{
        width: $wid * 50%;
    }


    //嵌套
    section{
        //维持较少的复杂层级嵌套，保证输出的css选择器不会大于3个至4个
        .hd{
            ...
        }
        .bd{
            ...
        }
    }


    //伪类
    a{
        ...
        &:hover{
            ...
        }
        &:nth-child(2n){
            ...
        }
    }


    //继承，class常量块
    //第一种场景，不推荐
    .sidebar_box{
        width: 200px;
        border: 1px solid;
    }
    .content_bottom_box{
        @extend .sidebar_box;
    }
    //第二种场景，推荐
    %border_box{
        width: 200px;
        border: 1px solid;
    }
    .content_bottom_box{
        @extend %border_box
    }


    //mixin 宏，代码块
    @mixin wid($val: 10){
        width: $val + px;
    }
    .elem{
        @include wid;
        @include wid(200);
    }


    //颜色函数
    $aqua: lighten(#00f, 10%);

    //if/else
    .elem{
        @if lightness($color) > 30% {
    　　　　background-color: #000;
    　　} @else {
    　　　　background-color: #fff;
    　　}
    }


    //循环
    @for $i from 1 to 100{
        w#{$i}{
            width: #{$i}px;
        }
    }

    $pageThemeVariable: 'theme_blue', 'theme_green', 'theme_yellow';
    //三套颜色符合function定义的base color
    $themeColorVariable: #0390f4, #11a84a, #ffa800;
    $themeColorVariableThin: #1e9ef8, #14b350, #ffb526;
    $themeColorVariableDeep: #0f75d4, #09963e, #ec9c00;

    @each $list in $pageThemeVariable{
        $i: index($pageThemeVariable, $list);
        .#{$list}{
            //首页
            .search_top{
                border-color: nth($themeColorVariable, $i);
                .btn{
                    border-color: nth($themeColorVariable, $i);
                    background: nth($themeColorVariable, $i);
                }
            }
            .menu{
                background: nth($themeColorVariable, $i);
            }
            .menu_con .side_menu{
                background: nth($themeColorVariableThin, $i);
            }
            .menu_con .nav a.on, .menu_con .nav a:hover{
                background: nth($themeColorVariableDeep, $i);
            }
            .box250 .tit strong i{
                background: nth($themeColorVariable, $i);
            }
            .list_con dl:hover dd{
                border-color: nth($themeColorVariable, $i);
            }
            .footer{
                border-color: nth($themeColorVariable, $i);
            }
            //列表页
            .box_change{
                dt{
                    color: nth($themeColorVariableDeep, $i);
                }
                dd a.on{
                    background: nth($themeColorVariable, $i);
                }
            }
            .toolbar .sort li.cut a{
                color: nth($themeColorVariableDeep, $i);
            }
            //详情页
            .box200bt{
                border-top-color: nth($themeColorVariable, $i);
            }
            .line_travel_box{
                .hd_inside{
                    background: nth($themeColorVariable, $i);
                }
                .hd .li.cur, .hd .li:hover{
                    background: nth($themeColorVariableDeep, $i);
                }
                .con_box .title{
                    color: nth($themeColorVariable, $i);
                }
                .con_box .mod-name{
                    border-color: nth($themeColorVariable, $i);
                }

            }
        }
    }

    .theme_blue{
        .line_travel_box{
            #cn01 .title i{
                @extend .icon-t11;
            }
            .xlxc_box .yc i{
                @extend .icon-t12;
            }
            .xlxc_box .zs i{
                @extend .icon-t13;
            }
            #cn02 .title i{
                @extend .icon-t14;
            }
            #cn04 .title i{
                @extend .icon-t15;
            }
            #cn05 .title i{
                @extend .icon-t16;
            }
            #cn06 .title i{
                @extend .icon-t17;              
            }
            #cn7 .title i{
                @extend .icon-t18;
            }
        }
        #member{
            #lft{
                h2{
                    border-top: 2px solid #0390f4; 
                }  
            } 
            #rht{
                .club_list {
                    .tit{
                        a.on{
                            border-bottom: 2px solid #0390f4;
                        }
                    } 
                }
            } 
            .txt{
                s.s1{
                    @extend .icon-s11;
                }
                s.s2{
                    @extend .icon-s12;
                }
                s.s3{
                    @extend .icon-s13;
                }
                s.s4{
                    @extend .icon-s14;
                }
                s.s5{
                    @extend .icon-s15;
                }
                s.s6{
                    @extend .icon-s16;
                }
                s.s7{
                    @extend .icon-s17;
                }
                s.s8{
                    @extend .icon-s18;
                }
                s.s9{
                    @extend .icon-s19;
                }
                li.on{
                    a{
                        color: #0390f4;
                    }
                    i{
                        @extend .icon-triangle-blue;
                    }
                }
            }
        }
    }
    .theme_green{
        .line_travel_box{
            #cn01 .title i{
                @extend .icon-t21;
            }
            .xlxc_box .yc i{
                @extend .icon-t22;
            }
            .xlxc_box .zs i{
                @extend .icon-t23;
            }
            #cn02 .title i{
                @extend .icon-t24;
            }
            #cn04 .title i{
                @extend .icon-t25;
            }
            #cn05 .title i{
                @extend .icon-t26;
            }
            #cn06 .title i{
                @extend .icon-t27;
            }
            #cn7 .title i{
                @extend .icon-t28;
            }
        }
        #member{
            #lft{
                h2{
                    border-top: 2px solid #11a84a;
                }
            }
            #rht{
                .club_list {
                    .tit{
                        a.on{
                            border-bottom: 2px solid #11a84a;
                        }
                    } 
                }
            } 
            .txt{
                s.s1{
                    @extend .icon-s21;
                }
                s.s2{
                    @extend .icon-s22;
                }
                s.s3{
                    @extend .icon-s23;
                }
                s.s4{
                    @extend .icon-s24;
                }
                s.s5{
                    @extend .icon-s25;
                }
                s.s6{
                    @extend .icon-s26;
                }
                s.s7{
                    @extend .icon-s27;
                }
                s.s8{
                    @extend .icon-s28;
                }
                s.s9{
                    @extend .icon-s29;
                }
                li.on{
                    a{
                        color: #11a84a;
                    }
                    i{
                        @extend .icon-triangle-green;
                    }
                }
            }
        }
    }
    </pre>
</div>
<?php include "../../assets/template/sample_footer.html";?>