<!DOCTYPE html>

<html class="no-js">

<head>

    <meta charset="utf-8">

    <title>Easy-Demo</title>



    <meta name="description" content="">

    <meta http-equiv="cleartype" content="on">



    <style>
        /*! normalize.css v3.0.0 | MIT License | git.io/normalize */

        /**
         * 1. Set default font family to sans-serif.
         * 2. Prevent iOS text size adjust after orientation change, without disabling
         *    user zoom.
         */

        html {
            font-family: sans-serif; /* 1 */
            -ms-text-size-adjust: 100%; /* 2 */
            -webkit-text-size-adjust: 100%; /* 2 */
            behavior: url(http://localhost/wgift/resource/css/ie-css3.htc);
        }

        /**
         * Remove default margin.
         */

        body {
            margin: 0;
        }

        /* HTML5 display definitions
           ========================================================================== */

        /**
         * Correct `block` display not defined in IE 8/9.
         */

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        nav,
        section,
        summary {
            display: block;
        }

        /**
         * 1. Correct `inline-block` display not defined in IE 8/9.
         * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.
         */

        audio,
        canvas,
        progress,
        video {
            display: inline-block; /* 1 */
            vertical-align: baseline; /* 2 */
        }

        /**
         * Prevent modern browsers from displaying `audio` without controls.
         * Remove excess height in iOS 5 devices.
         */

        audio:not([controls]) {
            display: none;
            height: 0;
        }

        /**
         * Address `[hidden]` styling not present in IE 8/9.
         * Hide the `template` element in IE, Safari, and Firefox < 22.
         */

        [hidden],
        template {
            display: none;
        }

        /* Links
           ========================================================================== */

        /**
         * Remove the gray background color from active links in IE 10.
         */

        a {
            background: transparent;
        }

        /**
         * Improve readability when focused and also mouse hovered in all browsers.
         */

        a:active,
        a:hover {
            outline: 0;
        }

        /* Text-level semantics
           ========================================================================== */

        /**
         * Address styling not present in IE 8/9, Safari 5, and Chrome.
         */

        abbr[title] {
            border-bottom: 1px dotted;
        }

        /**
         * Address style set to `bolder` in Firefox 4+, Safari 5, and Chrome.
         */

        b,
        strong {
            font-weight: bold;
        }

        /**
         * Address styling not present in Safari 5 and Chrome.
         */

        dfn {
            font-style: italic;
        }

        /**
         * Address variable `h1` font-size and margin within `section` and `article`
         * contexts in Firefox 4+, Safari 5, and Chrome.
         */

        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        /**
         * Address styling not present in IE 8/9.
         */

        mark {
            background: #ff0;
            color: #000;
        }

        /**
         * Address inconsistent and variable font size in all browsers.
         */

        small {
            font-size: 80%;
        }

        /**
         * Prevent `sub` and `sup` affecting `line-height` in all browsers.
         */

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sup {
            top: -0.5em;
        }

        sub {
            bottom: -0.25em;
        }

        /* Embedded content
           ========================================================================== */

        /**
         * Remove border when inside `a` element in IE 8/9.
         */

        img {
            border: 0;
        }

        /**
         * Correct overflow displayed oddly in IE 9.
         */

        svg:not(:root) {
            overflow: hidden;
        }

        /* Grouping content
           ========================================================================== */

        /**
         * Address margin not present in IE 8/9 and Safari 5.
         */

        figure {
            margin: 1em 40px;
        }

        /**
         * Address differences between Firefox and other browsers.
         */

        hr {
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
        }

        /**
         * Contain overflow in all browsers.
         */

        pre {
            overflow: auto;
        }

        /**
         * Address odd `em`-unit font size rendering in all browsers.
         */

        code,
        kbd,
        pre,
        samp {
            font-family: monospace, monospace;
            font-size: 1em;
        }

        /* Forms
           ========================================================================== */

        /**
         * Known limitation: by default, Chrome and Safari on OS X allow very limited
         * styling of `select`, unless a `border` property is set.
         */

        /**
         * 1. Correct color not being inherited.
         *    Known issue: affects color of disabled elements.
         * 2. Correct font properties not being inherited.
         * 3. Address margins set differently in Firefox 4+, Safari 5, and Chrome.
         */

        button,
        input,
        optgroup,
        select,
        textarea {
            color: inherit; /* 1 */
            font: inherit; /* 2 */
            margin: 0; /* 3 */
        }

        /**
         * Address `overflow` set to `hidden` in IE 8/9/10.
         */

        button {
            overflow: visible;
        }

        /**
         * Address inconsistent `text-transform` inheritance for `button` and `select`.
         * All other form control elements do not inherit `text-transform` values.
         * Correct `button` style inheritance in Firefox, IE 8+, and Opera
         * Correct `select` style inheritance in Firefox.
         */

        button,
        select {
            text-transform: none;
        }

        /**
         * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`
         *    and `video` controls.
         * 2. Correct inability to style clickable `input` types in iOS.
         * 3. Improve usability and consistency of cursor style between image-type
         *    `input` and others.
         */

        button,
        html input[type="button"], /* 1 */
        input[type="reset"],
        input[type="submit"] {
            -webkit-appearance: button; /* 2 */
            cursor: pointer; /* 3 */
        }

        /**
         * Re-set default cursor for disabled elements.
         */

        button[disabled],
        html input[disabled] {
            cursor: default;
        }

        /**
         * Remove inner padding and border in Firefox 4+.
         */

        button::-moz-focus-inner,
        input::-moz-focus-inner {
            border: 0;
            padding: 0;
        }

        /**
         * Address Firefox 4+ setting `line-height` on `input` using `!important` in
         * the UA stylesheet.
         */

        input {
            line-height: normal;
        }

        /**
         * It's recommended that you don't attempt to style these elements.
         * Firefox's implementation doesn't respect box-sizing, padding, or width.
         *
         * 1. Address box sizing set to `content-box` in IE 8/9/10.
         * 2. Remove excess padding in IE 8/9/10.
         */

        input[type="checkbox"],
        input[type="radio"] {
            box-sizing: border-box; /* 1 */
            padding: 0; /* 2 */
        }

        /**
         * Fix the cursor style for Chrome's increment/decrement buttons. For certain
         * `font-size` values of the `input`, it causes the cursor style of the
         * decrement button to change from `default` to `text`.
         */

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        /**
         * 1. Address `appearance` set to `searchfield` in Safari 5 and Chrome.
         * 2. Address `box-sizing` set to `border-box` in Safari 5 and Chrome
         *    (include `-moz` to future-proof).
         */

        input[type="search"] {
            -webkit-appearance: textfield; /* 1 */
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box; /* 2 */
            box-sizing: content-box;
        }

        /**
         * Remove inner padding and search cancel button in Safari and Chrome on OS X.
         * Safari (but not Chrome) clips the cancel button when the search input has
         * padding (and `textfield` appearance).
         */

        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /**
         * Define consistent border, margin, and padding.
         */

        fieldset {
            border: 1px solid #c0c0c0;
            margin: 0 2px;
            padding: 0.35em 0.625em 0.75em;
        }

        /**
         * 1. Correct `color` not being inherited in IE 8/9.
         * 2. Remove padding so people aren't caught out if they zero out fieldsets.
         */

        legend {
            border: 0; /* 1 */
            padding: 0; /* 2 */
        }

        /**
         * Remove default vertical scrollbar in IE 8/9.
         */

        textarea {
            overflow: auto;
        }

        /**
         * Don't inherit the `font-weight` (applied by a rule above).
         * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.
         */

        optgroup {
            font-weight: bold;
        }

        /* Tables
           ========================================================================== */

        /**
         * Remove most spacing between table cells.
         */

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        td,
        th {
            padding: 0;
        }

        /**
         * Clearfix helper
         * Used to contain floats: h5bp.com/q
         */
        .clear {
            clear: both;
        }

        .clear:before,
        .clear:after {
            content: "";
            display: table;
        }

        .clear:after {
            clear: both;
        }

        html{font-size:16px; font-family:"寰蒋闆呴粦","榛戜綋";}
        body{ background-color:#eee;text-align:center;}
        .page{width:1000px; margin:0 auto; padding-top:80px;  }

        .img-welcome{ margin:128px auto 0 auto;}

        .form-div{background-color:rgba(255,255,255,0.27); border-radius:10px; border:1px solid #aaa; width:424px; margin:0 auto;padding:30px 0 20px 0px; font-size:12px;box-shadow: inset 0px 0px 10px rgba(255,255,255,0.5),0px 0px 15px rgba(75,75,75,0.3); text-align:left;}

        .form-div input[type="text"], .form-div input[type="password"], .form-div input[type="email"]{width:268px; margin:10px; line-height:20px; font-size:16px;}
        .form-div input[type="checkbox"]{margin:20px 0 20px 10px;}
        .form-div input[type="button"],.form-div input[type="submit"]{margin:10px 20px 0 0;}

        .form-div table{ margin:0 auto; text-align:right; color:rgba(64,64,64,1.00);}
        .form-div table img{ vertical-align:middle; margin:0 0 5px 0;}
        .footer{color:rgba(64,64,64,1.00); font-size: 12px; margin-top: 30px;}
        .form-div .buttons{float:right;}

        .protocol{ padding:0px 20px 20px 20px; text-align:left; background-color:rgba(255,255,255,0.5);border-radius:7px; height:400px;overflow:auto;}

        .input-text {
            padding: 10px;
            border: 1px solid #D4D4D4;
            color: #333333;
            margin-top: 5px;
        }

        input[type="text"], input[type="password"], input[type="email"] {
            border-radius: 8px;
            box-shadow: inset 0 2px 5px #eee;
            padding: 10px;
            border: 1px solid #D4D4D4;
            color: #333333;
            margin-top: 5px;
        }

        input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
            border: 1px solid #50afeb;
            outline: none;
        }

        input[type="button"], input[type="submit"] {
            padding: 7px 15px;
            background-color: #3c6db0;
            text-align: center;
            border-radius: 5px;
            overflow: hidden;
            min-width: 80px;
            border: none;
            color: #FFF;
            box-shadow: 1px 1px 1px rgba(75,75,75,0.3);
        }

        input[type="button"]:hover, input[type="submit"]:hover {
            background-color: #5a88c8;
            /*border: 1px solid #999;*/
        }

        input[type="button"]:active, input[type="submit"]:active {
            background-color: #5a88c8;
            /*border: 1px solid #777;*/
        }
    </style>



    <script src="/assets/reception/js/jquery.min.js"></script>

    <script src="/assets/reception/js/easyform.js"></script>



</head>

<body>



<script type="text/javascript">



    var WIDTH = $(window).innerWidth();
    var HEIGHT = $(window).innerHeight();

    $(document).ready(function(){
        $(".page").css("height", HEIGHT+"px");

    });



</script>



<div class="page">
    <div class="form-div">
        <form id="reg-form" action="" method="post">
            <table>
                <tr>
                    <td>用户名</td>
                    <td><input name="uid" type="text" id="uid" easyform="length:4-16;char-normal;real-time;" message="用户名必须为4—16位的英文字母或数字" easytip="disappear:lost-focus;theme:blue;" ajax-message="用户名已存在!">
                    </td>
                </tr>
                <tr>
                    <td>密码</td>
                    <td><input name="psw1" type="password" id="psw1" easyform="length:6-16;" message="密码必须为6—16位" easytip="disappear:lost-focus;theme:blue;"></td>
                </tr>
                <tr>
                    <td>确认密码</td>
                    <td><input name="psw2" type="password" id="psw2" easyform="length:6-16;equal:#psw1;" message="两次密码输入要一致" easytip="disappear:lost-focus;theme:blue;"></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input name="email" type="text" id="email" easyform="email;real-time;" message="Email格式要正确" easytip="disappear:lost-focus;theme:blue;" ajax-message="这个Email地址已经被注册过，请换一个吧!"></td>
                </tr>
                <tr>
                    <td>昵称</td>
                    <td><input name="nickname" type="text" id="nickname" easyform="length:2-16" message="昵称必须为2—16位" easytip="disappear:lost-focus;theme:blue;"></td>
                </tr>
            </table>

            <div class="buttons">
                <input value="注 册" type="submit" style="margin-right:20px; margin-top:20px;">
                <input value="我有账号，我要登录" type="button" style="margin-right:45px; margin-top:20px;">
            </div>
            <br class="clear">

        </form>

    </div>







</div>
<script>


    $(document).ready(function ()
    {
        $('#reg-form').easyform();

    });





</script>

</body>

</html>

