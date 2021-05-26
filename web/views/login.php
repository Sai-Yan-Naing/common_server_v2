<?php
 require_once("header.php");
session_start();
// At the top of page right after session_start();
if (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

?>


<div id="loginWrapper">
<h1><img src="../img/login/title.png" width="220" height="90" alt="ウィンサーバー　コントロールパネルログイン"></h1>
<?php if(isset($_POST['domain_userid'])){ ?>
	<label class="error">ご契約ID and Password error</label>
<?php }?>
<form action="login_confirm" method="post" id="login_confirm" />
<table>
	<tr>
		<th scope="row">ご契約ID</th>
		<td><input type="text" name="domain_userid" id="domain_userid" size="40" value="<?= $_POST['domain_userid'] ?>" /></td>
	</tr>
	<tr>
		<th scope="row">PASSWORD</th>
		<td><input type="password" name="password" id="password" value="<?= $_POST['password'] ?>" size="40" /></td>
	</tr>
	<?php 
			// In sign-in form submit button
		if (isset($_SESSION["login_attempts"]) && $_SESSION["login_attempts"] >2)
		{
		    $_SESSION["locked"] = time();
	?>
	<?php echo "<label id='timer'>Please wait for <span class='countdown'>30</span> seconds</label>";?>
	<tr>
		<th colspan="2" scope="row"><input type="submit" value="ログイン" id="btnLogin" disabled class="inputBtn" style="cursor: auto; background: #ccc;" /></th>
	</tr>
	<?php
		}
		else
		{
		 
	?>
	<tr>
		<th colspan="2" scope="row"><input type="submit" value="ログイン" id="btnLogin" class="inputBtn" /></th>
	</tr>
	<?php
 
	}
	 
	?>
	
</table>
<div style="margin-top: -30px">
	<a href="forgotpass">PASSWORDをお忘れの方はこちらから</a>
</div>
</form>

<!-- /loginWrapper -->
</div>
<script>
var timer = setInterval(function () {
    $(".countdown").each(function() {
        var newValue = parseInt($(this).text(), 10) - 1;
        $(this).text(newValue);
        if(newValue == 0) {
           clearInterval(timer);
           $("#btnLogin").attr('disabled',false);
           $("#btnLogin").css({'cursor':'pointer','background-color':'#FC0'});
           $("#timer").css({'display':'none'});
        }
    });
}, 1000);
</script>
<?php
require_once('footer.php');
?>