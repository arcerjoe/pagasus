<?php include "../../assets/template/sample_header.html";?>
<div class="area_directions">
    <div class="title">gulpfile.js配置规范</div>
    <ul>
        <li>模块来源：<a href="">m.cncn.net gulp自动化开发</a></li>
        <li>模块来源：<a href="">应用中心 gulp自动化开发</a></li>
        <li>安装略过，之后补充</li>
        <li>文件格式GBK，符合输出的编码规范。内部文件.scss类的，必须使用UTF-8，注意转码</li>
        <li>path短文件名固定为dev和dest，含两端（desktop级和mobile级）的，分别用Ddev和Mdev...</li>
        <li>每组类别之间（html,css,js,watch汇总,m端)保持两行空格，同类型的不加空行，维持可读性和视觉效果</li>
        <li>&nbsp;</li>
        <li>livereload.listen的端口建议使用5位数，后三位是项目的端口号</li>
        <li>html任务做页面模板即时刷新用的，views里请各自配置路径，支持/asset上级目录读取</li>
        <li>&nbsp;</li>
        <li>样式固定为style打头，任务名采用驼峰式，节省右侧的命令行字符数</li>
        <li>初始文件命名desktop级的用index.css，mobile级的用mobile.css，节日活动用css.css</li>
        <li>css编译采用两份，一份是压缩发布版，一份是开发版，含sourcemaps功能，配合README.md和.scss索引文件还有控制台可以快速的理清代码的脉络</li>
        <li>开发版和发布版可以通过url切换，查询是否变动</li>
        <li>sass文件都是编译的，发布文件不建议后端在里面增加。可以尝试在模板文件内增加&lt;style&gt;等前端回头添加到.scss相应模块里面</li>
        <li>&nbsp;</li>
        <li>图片分两部分，一部分是直接拷贝输出，jpg格式的。放在default目录下；另一部分是合并的，分png8和png24的格式。mobile里面直接用png24目录，不区分2个类别</li>
        <li>JS部分待定</li>
    </ul>
</div>
<div class="area_code">
    <div class="title">代码结构</div>
    <pre class="brush: js"> 
    //单项目示例：

    var gulp = require('gulp'),
        sass = require('gulp-sass'),
        sourcemaps = require('gulp-sourcemaps'),
        watch = require('gulp-watch'),
        sprite = require('gulp.spritesmith'),
        notify = require('gulp-notify'),
        plumber = require('gulp-plumber'),
        livereload = require('gulp-livereload'),
        path = {
            views: '../../../app_m/views/**',
            dev: 'dev/',
            dest: 'dest/'
        };


    //html
    gulp.task('html',function(){
        return gulp.src(path.views)
            .pipe(livereload())
    });


    //sass
    gulp.task('style', function () {
        return gulp.src(path.dev + "sass/mobile.scss")
            .pipe(plumber({errorHandler: notify.onError('Err: <%= error.message %>')}))
            .pipe(sourcemaps.init())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(path.dest + 'transitcss/'))
            .pipe(livereload())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(gulp.dest(path.dest + 'css/'))
    });


    // img
    gulp.task('defaultImg', function(){
        return gulp.src(path.dev + 'img/default/**')
            .pipe(gulp.dest(path.dest + 'img/'))
    });
    gulp.task('sprite', function () {
        var spriteData = gulp.src(path.dev + 'img/sprite/png24/**.png')
            .pipe(sprite({
                retinaSrcFilter: [path.dev + 'img/sprite/png24/*@2x.png'],
                imgName: 'sprite.png',
                retinaImgName: 'sprite@2x.png',
                cssName: 'sprite.scss',
                cssFormat: 'scss',
                imgPath: '../img/sprite/sprite@2x.png'
            }));
        spriteData.img.pipe(gulp.dest(path.dest + 'img/sprite/'));
        spriteData.css.pipe(gulp.dest(path.dev + 'sass/mod/'));
    });


    // watch
    gulp.task('watch',function(){
        livereload.listen({livereloadPort:55701});
        gulp.watch(path.views, ['html']);
        gulp.watch(path.dev + 'sass/**', ['style']);
        gulp.watch(path.dev + 'img/default/**', ['defaultImg']);
        gulp.watch(path.dev + 'img/sprite/png24/**.png', ['sprite']);
    });
    gulp.task('default', ['watch']);
    </pre> 
    <pre class="brush: js"> 
    //desktop级和mobile级混排项目示例：

    var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    watch = require('gulp-watch'),
    sprite = require('gulp.spritesmith'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    livereload = require('gulp-livereload'),
    path = {
        views: '../../views/app/*',
        Ddev: 'desktop/dev/',
        Ddest: 'desktop/dest/',
        Mdev: 'mobile/dev/',
        Mdest: 'mobile/dest/'
    };


    //html
    gulp.task('html',function(){
        return gulp.src(path.views)
            .pipe(livereload())
    });


    //sass
    gulp.task('style', function () {
        return gulp.src(path.Ddev + "sass/style.scss")
            .pipe(plumber({errorHandler: notify.onError('Err: <%= error.message %>')}))
            .pipe(sourcemaps.init())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(path.Ddest + 'transitcss/'))
            .pipe(livereload())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(gulp.dest(path.Ddest + 'css/'))
    });
    gulp.task('styleSub', function () {
        return gulp.src(path.Ddev + "sass/sub.scss")
            .pipe(plumber({errorHandler: notify.onError('Err: <%= error.message %>')}))
            .pipe(sourcemaps.init())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(path.Ddest + 'transitcss/'))
            .pipe(livereload())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(gulp.dest(path.Ddest + 'css/'))
    });


    // mobile scss
    gulp.task('styleMobile', function () {
        return gulp.src(path.Mdev + "sass/mobile.scss")
            .pipe(plumber({errorHandler: notify.onError('Err: <%= error.message %>')}))
            .pipe(sourcemaps.init())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(path.Mdest + 'transitcss/'))
            .pipe(livereload())
            .pipe(sass({outputStyle: "compressed"}))
            .pipe(gulp.dest(path.Mdest + 'css/'))
    });


    // img
    gulp.task('defaultImg', function(){
        return gulp.src(path.Ddev + 'img/default/**')
            .pipe(gulp.dest(path.Ddest + 'img/'))
    });
    gulp.task('sprite8', function () {
        var spriteData = gulp.src(path.Ddev + 'img/sprite/png8/**.png')
            .pipe(sprite({
                imgName: 'sprite8.png',
                cssName: 'sprite8.scss',
                cssFormat: 'scss',
                imgPath: '../img/sprite/sprite8.png'
            }));
        spriteData.img.pipe(gulp.dest(path.Ddest + 'img/sprite/'));
        spriteData.css.pipe(gulp.dest(path.Ddev + 'sass/mod/'));
    });
    gulp.task('sprite24', function () {
        var spriteData = gulp.src(path.Ddev + 'img/sprite/png24/**.png')
            .pipe(sprite({
                imgName: 'sprite24.png',
                cssName: 'sprite24.css',
                cssFormat: 'scss',
                imgPath: '../img/sprite/sprite24.png'
            }));
        spriteData.img.pipe(gulp.dest(path.Ddest + 'img/sprite/'));
        spriteData.css.pipe(gulp.dest(path.Ddev + 'sass/mod/'));
    });


    // mobile img
    gulp.task('defaultImgMobile', function(){
        return gulp.src(path.Mdev + 'img/default/**')
            .pipe(gulp.dest(path.Mdest + 'img/'))
    });
    gulp.task('spriteMobile', function () {
        var spriteData = gulp.src(path.Mdev + 'img/sprite/png24/**.png')
            .pipe(sprite({
                retinaSrcFilter: [path.Mdev + 'img/sprite/png24/*@2x.png'],
                imgName: 'sprite.png',
                retinaImgName: 'sprite@2x.png',
                cssName: 'sprite.scss',
                cssFormat: 'scss',
                imgPath: '../img/sprite/sprite@2x.png'
            }));
        spriteData.img.pipe(gulp.dest(path.Mdest + 'img/sprite/'));
        spriteData.css.pipe(gulp.dest(path.Mdev + 'sass/mod/'));
    });


    // watch
    gulp.task('watch',function(){
        livereload.listen({livereloadPort:55872});
        gulp.watch(path.views, ['html']);
        gulp.watch(path.Ddev + 'sass/**', ['style','styleSub']);
        gulp.watch(path.Ddev + 'img/default/**', ['defaultImg']);
        gulp.watch(path.Ddev + 'img/sprite/png8/**.png', ['sprite8']);
        gulp.watch(path.Ddev + 'img/sprite/png24/**.png', ['sprite24']);
        gulp.watch(path.Mdev + 'sass/**', ['styleMobile']);
        gulp.watch(path.Mdev + 'img/default/**', ['defaultImgMobile']);
        gulp.watch(path.Mdev + 'img/sprite/png24/**.png', ['spriteMobile']);
    });
    gulp.task('default', ['watch']);
    </pre>
</div>
<div class="area_path">
    <div class="title">模块位置</div>
    <div class="mt10">
        .5\app_cncn_net\webapp\static\asset\gulpfile.js<br />
        <a href="">链接下载暂无（系统文件，不配置下载）</a><br />
        .7\caigoufenxiao\webapp\static_m\asset\gulpfile.js<br />
        <a href="">链接下载暂无（系统文件，不配置下载）</a>
    </div>
</div>
<div class="area_path">
    <div class="title">版本记录</div>
    <div class="mt10">
        2016/04/21 更新，定稿单项目，混合项目命名编写标准。备注：JS待前端组讨论定方案
    </div>
</div>
<?php include "../../assets/template/sample_footer.html";?>