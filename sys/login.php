<?   
    if ($_SESSION['user_account']) return;

    $fmBackUrl      = getParam('fmBackUrl', 'nothing');   
    $fmLoginSubmit  = getParam('fmLoginSubmit', 'nothing');
    if ($fmLoginSubmit)
    {
        $loginAccount = getParam('loginAccount', 'string');
        $loginPasswd  = getParam('loginPasswd', 'string');
        
        $obj = db_object(db_query("SELECT * FROM user WHERE account='$loginAccount'"));
        $password = md5($loginPasswd);
        if ($obj && $password == $obj->password)
        {
            $_SESSION['user_account'] = $loginAccount;
            echo "<script>window.location.href = '$fmBackUrl'</script>";
            exit;
        }
    }

    show_login();
    exit;

    function show_login()
    {    
        global $PHP_SELF;
        header("Content-type: text/html;charset=utf-8");
        
        echo "<html>
              <head>
		      <meta http-equiv=\"Content-Type\" content=\"text/html; charset='utf-8\">
		      <title>LMS</title>
              <script src='dom.js'></script>
		      <script>function setFocus() {\$('loginAccount').focus();}</script>
    	      </head>
    	      <body>";
    	      
        $backUrl = request_uri();
        echo "<div style='color:#606060; text-align: center; font-size: 13px; border: 1px solid #ccc; margin: 20px; padding: 20px 2px 20px 2px;'>
                <form action='$PHP_SELF' method=get>
                <center>
                    <div>請先登入</div>
					<div style='background:#FFD none repeat scroll 0%; border:1px solid #EDB;	margin-bottom:20px;	overflow:hidden; padding:8px 4px 8px 8px; text-align:left; width:200px; *width:220px;'>
                        <div style='text-align:right; padding:0px 0px 4px 0px'>帳號 <input id=loginAccount name=loginAccount type=text style='width:130px' size=16></div>
                        <div style='text-align:right;'>密碼 <input id=loginPasswd name=loginPasswd type=password size=16 style='width:130px'></div>
                        <div style='padding:10px 0px 0px 0px; text-align:right'>
                            <input type=hidden id=fmBackUrl name=fmBackUrl value='$backUrl'>
                            <input type=submit id=fmLoginSubmit name=fmLoginSubmit value='送出'>
                        </div>
					</div>
                </center>
              </div>";
              
        echo "</body>
              </html>";
    }
?>