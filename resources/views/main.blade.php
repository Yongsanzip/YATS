<html lang="UTF-8">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/bin/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            main_page_init();
        });

        function send(){
            $.ajax({
                type: "POST",
                url: "{{route('fsgsdfdsfsad')}}",
                data_type: 'json',
                data: {
                    method: "POST",
                    url: $("#autocomplete-input").val(),
                    datas: JSON.stringify([

                        {key: "뭐시기", data: "892045rd98b", data_type: "text"},
                        {key: "뭐시기", data: "892045rd98b", data_type: "file"}

                    ])
                },
                datatype: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    //alert("good");
                    console.log("done");
                    console.log(e);
                },
                error: function(e){
                    console.log("nope");
                    console.log(e);
                    //alert("fuck");
                }
            })
        }
    </script>
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 5%;">
            <li><a href="#modal_signIn" class="modal-trigger">Sign In</a></li>
            <li><a class='dropdown-trigger' href='#' data-activates='dropdown_nation'>Nation</a></li>
            <!-- nation dropdown -->
            <ul id='dropdown_nation' class='dropdown-content'>
                <a class="row valign-wrapper"><img src="/public/us.png" alt="" class="circle nation-row">English</a>
                <a class="row valign-wrapper"><img src="/public/kr.png" alt="" class="circle nation-row">Korea</a>
            </ul>
            <!-- nation dropdown End-->
        </ul>
    </div>
</nav>
<!-- Singin Modal Structure -->
<div id="modal_signIn" class="modal">
    <div class="modal-content">
        <h3>Sign In</h3>
        <p>SignIn and manage API projects!</p>
        <div class="input-field col s4" style="margin-top: 5%;">
            <input type="text" id="signIn_email">
            <label for="signIn_email">EMAIL</label>
        </div>
        <div class="input-field col s4">
            <input type="password" id="sign_pass">
            <label for="signIn_pass">PASSWORD</label>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-blue btn-flat">Sign In</a>
        <a href="javascript:open_sign_up();" class="madal-trigger waves-effect waves-green btn-flat">Sign Up</a>
    </div>
</div>
<!-- Login Modal Structure End -->

<!-- Joinin Modal Structure -->
<div id="modal_signUp" class="modal">
    <div class="modal-content">
        <h3>Sign up</h3>
        <p>SignUp and manage API projects!</p>
        <div class="input-field col s4" style="margin-top: 5%;">
            <input type="text" id="logIn_email">
            <label for="logIn_email">EMAIL</label>
        </div>
        <div class="input-field col s4">
            <input type="password" id="logIn_pass">
            <label for="logIn_pass">PASSWORD</label>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-blue btn-flat">로그인</a>
        <a href="/joinIn.html" class="modal-close waves-effect waves-green btn-flat">회원가입</a>
    </div>
</div>
<!-- Joinin Modal Structure End -->
<div class="content">
    <div class="start-txt">Get Start <span class="p-color">YATS</span></div>
    <div class="api-card">
        <div class="row valign-wrapper center-align">
            <div class="input-field col s9">
                <i class="material-icons prefix">web</i>
                <input name="urls" type="text" id="autocomplete-input" class="autocomplete">
                <label for="autocomplete-input">URL</label>
            </div>
            <div class="col s3 valign-wrapper">
                <button style="background-color: #3a557d;" class="btn waves-effect waves-light col s9 offset-s2" onclick="send()" name="action">SEND
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        <div class="row">
            <ul class="collapsible popout">
                <li>
                    <div class="collapsible-header"><i class="material-icons">hd</i>Headers</div>
                    <div class="collapsible-body">
                        <form id="header" action="">
                            <div class="row valign-wrapper">
                                <div class="input-field col s5">
                                    <input id="header_key" type="text" class="validate autoAdd">
                                    <label for="header_key">KEY</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="header_value" type="text" class="validate autoAdd">
                                    <label for="header_value">VALUE</label>
                                </div>
                                <i onclick="clear_row(this);" class="material-icons del-row">clear</i>
                            </div>
                        </form>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">list</i>Params</div>
                    <div class="collapsible-body">
                        <form id="param" action="">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="param_key" type="text" class="validate autoAdd">
                                    <label for="param_key">KEY</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="param_value" type="text" class="validate autoAdd">
                                    <label for="param_value">VALUE</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">comment</i>Body</div>
                    <div class="collapsible-body">
                        <form id="body" action="">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="body_key" type="text" class="validate autoAdd">
                                    <label for="body_key">KEY</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="body_value" type="text" class="validate autoAdd">
                                    <label for="body_value">VALUE</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>