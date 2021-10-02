<?php include 'top.php'?>
		<div class="row" style="padding: 0 0 0 0;margin: 0 0 0 0; width:100%;min-height:100%;height:auto">			
			<div class="col-sm-3" style="margin: 0 0 0 0;padding: 0 0 0 0;"></div>	
			<div class="col-sm-9" style="margin: 0 0 0 0;padding: 0 0 0 0; background:white;">	
				<div class="row" style="height:50px;"></div>
				<h3 class="text-center" style="color:#b81d1d;text-transform: uppercase;"><?php echo $_GET["nome_menu"]?> - <?php echo $_GET["nome_album"]?></h3>
				<div class="row" style="height:50px;"></div>
				<div class="col-12">
						<div class="card-columns gallery">
<?php
							include './adm/conecta.php';
							$contador=0;
							$sql="select f.foto, a.nome nome_album, f.nome nome_foto from fotos_album f ";
							$sql.=" left join album a on (a.id=f.id_album) ";
							$sql.=" left join menu m on (m.id=a.id_menu) ";
							$sql.="where ";
							$sql.=" (m.nome=:nome_menu) ";
							$sql.=" and (a.nome=:nome_album) ";
							$sql.=" order by f.id desc";
							$my_Insert_Statement = $my_Db_Connection->prepare($sql);
							$my_Insert_Statement->bindParam(":nome_menu", $_GET["nome_menu"]);					
							$my_Insert_Statement->bindParam(":nome_album", $_GET["nome_album"]);					
							if ($my_Insert_Statement->execute()) {
								while ($resultado=$my_Insert_Statement->fetch()) 
								{

?>
								<div class="galleryItem card">
								    <label style="color:#b81d1d; text-transform: uppercase;">&nbsp; <?php echo $resultado['nome_foto']?></label>
									<img class="card-img-top" src="/uploads/album/1366x768/<?php echo $resultado['foto']?>" data-text="<?php echo $resultado['nome_foto']?>">
								</div>
<?php 	
									$contador++;
								}
							}
?>
						</div>
				</div>
			</div>
		</div>
<?php include 'foot.php'?>