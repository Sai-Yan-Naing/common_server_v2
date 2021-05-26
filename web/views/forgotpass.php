<?php
 require_once("header.php");
?>
<div id="loginWrapper">
	<h1 style="font-size: 20px; font-weight: bold;">Winserver Controlpanel Share server</h1>
	<?php
	if(isset($result))
	{?>

		<label class="<?= $error ?>"><?= $result ?></label>
	<?php 
	}
	?>
<form action="pass_reset_confirm" method="post" id="pass_reset_confirm" />
<input type="hidden" name="token_" value="<?php echo $token ;?>">
<table>
	<tr>
		<th scope="row">ユーザーID or ドメイン名</th>
		<td><input type="text" name="domain_userid" size="40" value="<?= $_POST['domain_userid']?>" required /></td>
	</tr>
	<tr>
		<td></td>
		<td><a href="login" id="btnBack" class="btn inputBtn">戻る</a><input type="submit" value="パスワードの再設定手続きを行う" id="btnReset"  class="inputBtn" /></td>
	</tr>
</table>
</form>
<div style="margin-top: -30px">
	再発行ボタンをクリックいただくと、ご登録いただいているお客様情報のメールアドレスにパスワード再設定の認証メールを送付いたしますので、メールをご確認の上手続きをお願いいたします。
</div>
<!-- /loginWrapper -->
</div>
<?php
require_once('footer.php');
?>