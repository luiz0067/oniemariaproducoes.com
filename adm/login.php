<?php include 'top.php'?>
<?php
/*
error_reporting(0);
ini_set(“display_errors”, 0 );*/

	$acao=isset($_POST["acao"])?$_POST["acao"]:(isset($_GET["acao"])?$_GET["acao"]:"");
	$login=isset($_POST["login"])?$_POST["login"]:(isset($_GET["login"])?$_GET["login"]:"");
	$senha=isset($_POST["senha"])?$_POST["senha"]:(isset($_GET["senha"])?$_GET["senha"]:"");
	if($acao=="Entrar"){
		try { 
			$sql	= "SELECT id,login,senha FROM usuario where (login=:login) and( senha=:senha) ";
			$my_Insert_Statement = $my_Db_Connection->prepare($sql);
			$my_Insert_Statement->bindParam(":login", $login);
			$my_Insert_Statement->bindParam(":senha", $senha);
			if ($my_Insert_Statement->execute()) {	
			} else {}			
			echo $acao;
			while ($resultado=$my_Insert_Statement->fetch()) {
				if (($login==$resultado["login"])&&($senha==$resultado["senha"])){
					session_start();
					$_SESSION["codigo"]		= $resultado["id"];
					$_SESSION["usuario"]	= $resultado["login"];
					$_SESSION["time"]	= time();
					header("location:/adm/principal.php");
					exit;
				}
				else{
					?>
					<div style="color:#FF0000">Usuario ou senha inválido</div>
					<?php
				}
			}
		}
		catch (PDOException $error) {
			//echo 'Connection error: ' . $error->getMessage();
		}
	}
?>

<div id="login" class="" style="background-repeat:no-repeat;background-image:url('/adm/assets/img/cms/LINK LINK.png');height:850px;">
    <div class="row" style="height:135px;"></div>
    <div class="row" style="">

		<div class="col-md-4" style="margin-left:auto;margin-right:auto;width:320px;">
			<form class="form-login" method="POST">
				
				<h2 class="form-login-heading" style="background-color:white">Bem vindo</h2>
				<div class="form-group">
					<div class="input-group">
						<label for="login" class="sr-only">Login</label>
						<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
						<input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
					</div>
				</div>			
				<div class="form-group">
					<div class="input-group">
						<label for="senha" class="sr-only">Senha</label>
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
						<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group ">
						<input name="acao" class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">							
					</div>
				</div>
				<div class="form-group">					
					<div class="input-group ">
						<a href="/adm/esqueceu_a_senha" class="btn btn-link" style="background-color:white;">Esqueceu a senha</a>
					</div>
				</div>	
				<!--
				<?php /*if usuario_tem_erro($tentativas_falhadas){*/?>
			    <label class="alert alert-danger"><?php usuario_mensagem_erro($tentativas_falhadas)?></label>
				<?php /*}*/ ?>			
				<?php /*if login() {*/?>
				<label class="alert alert-success"><?php echo $mensagem_successo ?></label>
				<?php /*} */?>	
			-->				
			</form>
		</div> 
	</div> 
</div>
<?php include 'foot.php'?>
