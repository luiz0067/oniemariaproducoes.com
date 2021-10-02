<?php include('../conecta.php');?>
<?php include '../verifica.php'?>
<?php //empty
	$acao=isset($_POST["acao"])?$_POST["acao"]:(isset($_GET["acao"])?$_GET["acao"]:"");
	$campo=isset($_POST["campo"])?$_POST["campo"]:(isset($_GET["campo"])?$_GET["campo"]:"");
	$campo=BlockSQLInjection($campo);
	$valor=isset($_POST["valor"])?$_POST["valor"]:(isset($_GET["valor"])?$_GET["valor"]:"");
	$valor=BlockSQLInjection($valor);
	$modelo=isset($_POST["modelo"])?$_POST["modelo"]:(isset($_GET["modelo"])?$_GET["modelo"]:"");
	$modelo=BlockSQLInjection($modelo);
	$id=isset($_POST["id"])?$_POST["id"]:(isset($_GET["id"])?$_GET["id"]:"");
	$nome=isset($_POST["nome"])?$_POST["nome"]:(isset($_GET["nome"])?$_GET["nome"]:"");
	$ocultar=isset($_POST["ocultar"])?$_POST["ocultar"]:(isset($_GET["ocultar"])?$_GET["ocultar"]:false);
		$ocultar=($ocultar=="true");
	$sql="";
	$select="select id,nome,ocultar from menu where nome!='HOME'";
	$resultado=null;
	$my_Insert_Statement=null;
	$campos=array(
		"id"=>array(
			"nome"=>"Código"
			,"tipo"=>"integer"
		)
		,"nome"=>array(
			"nome"=>"Nome"
			,"tipo"=>"varchar(50)"
		)
		,"ocultar"=>array(
			"nome"=>"Ocultar"
			,"tipo"=>"boolean"
		)
	);
	if($acao=="salvar"){
		if($id==null){
			$sql="INSERT INTO menu (nome,ocultar) VALUES ( :nome, :ocultar )";
			try { 
				$my_Insert_Statement = $my_Db_Connection->prepare($sql);
				$my_Insert_Statement->bindParam(":nome", $nome);
				$my_Insert_Statement->bindParam(":ocultar", $ocultar);
				if ($my_Insert_Statement->execute()) {
				  //echo "New record created successfully";
				} else {
				  //echo "Unable to create record";
				}
				//$my_Insert_Statement->bind_result($resultado);
				//$resultado=$my_Insert_Statement->fetch();
				$sql="$select and(  id=(select max(id) from menu)   ) ";
				try { 
					$my_Insert_Statement = $my_Db_Connection->prepare($sql);
					if ($my_Insert_Statement->execute()) {
					  //echo "New record created successfully";
					} else {
					  //echo "Unable to create record";
					}	
					$lista=array();
					while ($resultado=$my_Insert_Statement->fetch()) {
						$linha = array($resultado['id'], $resultado['nome'], $resultado['ocultar']);
						array_push($lista,$linha); 
					}
					$json_saida = json_encode(
						array(
							"mensagem_sucesso"=>"Menu cadastrado com sucesso!"
							,"campos"=>$campos
							,"registros"=>$lista
						)
					);
					echo $json_saida;
				}
				catch (PDOException $error) {
				   //echo 'Connection error: ' . $error->getMessage();
				}
			}
			catch (PDOException $error) {
			   //echo 'Connection error: ' . $error->getMessage();
			}
		}
		else{
			$sql="update menu set nome=:nome,ocultar=:ocultar where(id=:id)";
			try { 
				$my_Insert_Statement = $my_Db_Connection->prepare($sql);
				$my_Insert_Statement->bindParam(":nome", $nome);
				$my_Insert_Statement->bindParam(":ocultar", $ocultar);
				$my_Insert_Statement->bindParam(":id", $id);
				if ($my_Insert_Statement->execute()) {
				  //echo "New record created successfully";
				} else {
				  //echo "Unable to create record";
				}
				//$resultado=$my_Insert_Statement->fetch();	
				
				$sql="$select and (id=:id) ";
				try { 
					$my_Insert_Statement = $my_Db_Connection->prepare($sql);
					$my_Insert_Statement->bindParam(":id", $id);
					if ($my_Insert_Statement->execute()) {
					  //echo "New record created successfully";
					} else {
					  //echo "Unable to create record";
					}	
					$lista=array();
					while ($resultado=$my_Insert_Statement->fetch()) {
						$linha = array($resultado['id'],$resultado['nome'],$resultado['ocultar']);
						array_push($lista,$linha); 
					}
					$json_saida = json_encode(
						array(
							"mensagem_sucesso"=>"Menu atualizado com sucesso!"
							,"campos"=>$campos
							,"registros"=>$lista
						)
					);
					echo $json_saida;				
				}
				catch (PDOException $error) {
				   //echo 'Connection error: ' . $error->getMessage();
				}
			}
			catch (PDOException $error) {
			   //echo 'Connection error: ' . $error->getMessage();
			}
		}
	}
	else if($acao=="excluir"){
		$sql="delete from menu where(nome!='HOME') and(id=:id)";
		try { 
			$my_Insert_Statement = $my_Db_Connection->prepare($sql);
			$my_Insert_Statement->bindParam(":id", $id);
			if ($my_Insert_Statement->execute()) {
			  //echo "New record created successfully";
			} else {
			  //echo "Unable to create record";
			}
			//$resultado=$my_Insert_Statement->fetch();	
			$sql="$select and (id=:id) ";
			try { 
				$my_Insert_Statement = $my_Db_Connection->prepare($sql);
				$my_Insert_Statement->bindParam(":id", $id);
				if ($my_Insert_Statement->execute()) {
				  //echo "New record created successfully";
				} else {
				  //echo "Unable to create record";
				}	
				$lista=array();
				while ($resultado=$my_Insert_Statement->fetch()) {
					$linha = array($resultado['id'],$resultado['nome'],$resultado['ocultar']);
					array_push($lista,$linha); 
				}
				$json_saida = json_encode(
					array(
						"mensagem_sucesso"=>"Menu excluído com sucesso!"
						,"campos"=>$campos
						,"registros"=>$lista
					)
				);
				echo $json_saida;				
			}
			catch (PDOException $error) {
			   //echo 'Connection error: ' . $error->getMessage();
			}			
		}
		catch (PDOException $error) {
		   //echo 'Connection error: ' . $error->getMessage();
		}
	}
	else if($acao=="buscarcampo"){
		$sql="$select and ($campo=:valor)";
		try { 
			$my_Insert_Statement = $my_Db_Connection->prepare($sql);
			$my_Insert_Statement->bindParam(":valor", $valor);
			if ($my_Insert_Statement->execute()) {
			  //echo "New record created successfully";
			} else {
			  //echo "Unable to create record";
			}			
			$lista=array();
			while ($resultado=$my_Insert_Statement->fetch()) {
				$linha = array($resultado['id'],$resultado['nome'],$resultado['ocultar']);
				array_push($lista,$linha); 
			}
			$numero_registros=count($lista);
			$json_saida = json_encode(
				array(
					"mensagem_sucesso"=>"foram encontrado $numero_registros registros na sua busca!"
					,"campos"=>$campos
					,"registros"=>$lista
				)
			);
			echo $json_saida;				


		}
		catch (PDOException $error) {
		   //echo 'Connection error: ' . $error->getMessage();
		}
	}
	else if($acao=="buscar"){
		$sql="$select and";
		$sql=$sql."((:id = '')or(id=:id))";
		$sql=$sql."and";
		$sql=$sql."((:nome ='')or(nome=:nome))";
		$sql=$sql."and";
		$sql=$sql."((:ocultar = '')or(ocultar=:ocultar))";
		try { 
			$my_Insert_Statement = $my_Db_Connection->prepare($sql);
				$my_Insert_Statement->bindParam(":id", $id);
				$my_Insert_Statement->bindParam(":nome", $nome);
				$my_Insert_Statement->bindParam(":ocultar", $ocultar);
			if ($my_Insert_Statement->execute()) {
			  //echo "New record created successfully";
			} else {
			  //echo "Unable to create record";
			}	
			$lista=array();
			while ($resultado=$my_Insert_Statement->fetch()) {
				$linha = array($resultado['id'],$resultado['nome'],$resultado['ocultar']);
				array_push($lista,$linha); 
			}
			$numero_registros=count($lista);
			$json_saida = json_encode(
				array(
					"mensagem_sucesso"=>"foram encontrado $numero_registros registros na sua busca!"
					,"campos"=>$campos
					,"registros"=>$lista
				)
			);
			echo $json_saida;				
		}
		catch (PDOException $error) {
		   //echo 'Connection error: ' . $error->getMessage();
		}
	}	
	else if($acao=="buscartodos"){
		$sql="$select ";
		try { 
			$my_Insert_Statement = $my_Db_Connection->prepare($sql);
			if ($my_Insert_Statement->execute()) {
			  //echo "New record created successfully";
			} else {
			  //echo "Unable to create record";
			}	
			$lista=array();
			while ($resultado=$my_Insert_Statement->fetch()) {
				$linha = array($resultado['id'],$resultado['nome'],$resultado['ocultar']);
				array_push($lista,$linha); 
			}
			$numero_registros=count($linha);
			$json_saida = json_encode(
				array(
					"mensagem_sucesso"=>"foram encontrado $numero_registros registros na sua busca!"
					,"campos"=>$campos
					,"registros"=>$lista
				)
			);
			echo $json_saida;				
		}
		catch (PDOException $error) {
		   //echo 'Connection error: ' . $error->getMessage();
		}
	}	
	$my_Insert_Statement=null;
	$my_Db_Connection=null;
?>