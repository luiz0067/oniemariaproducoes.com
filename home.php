	<div id="home" >
			<div id="slider" class="slider" style="margin-left">
				<?php
					include './adm/conecta.php';
					$contador=0;
					$sql="select f.foto from fotos_album f ";
					$sql.=" left join album a on (a.id=f.id_album) ";
					$sql.=" left join menu m on (m.id=a.id_menu) ";
					$sql.="where ";
					$sql.=" (m.nome='HOME') ";
					$sql.=" and (a.nome='PRINCIPAL'); ";
					$my_Insert_Statement = $my_Db_Connection->prepare($sql);
					if ($my_Insert_Statement->execute()) {
						while ($resultado=$my_Insert_Statement->fetch()) 
						{

				?>
					<div class="slider-item <?php if($contador==0) echo "active"; ?>"    style="background-image: url(http://oniemariaproducoes.com/uploads/album/1366x768/<?php echo $resultado['foto']?>)"></div>	
				<?php 	
							$contador++;
						}
					}
				?>	
				<div class="slider-panel">
					<div class="slider-panel__navigation">
						<?php for ($i = 0; $i < $contador; $i++) {?>
							<i class="fas fa-circle indicator <?php if($i==0) echo "active"; ?>" data-slide-to="<?echo $i;?>"></i>
						<?}?>
					</div>
					<div class="slider-panel__controls">
						<i class="far fa-arrow-alt-circle-left" id="previous"></i>
						<i class="far fa-pause-circle" id="pause-play"></i>
						<i class="far fa-arrow-alt-circle-right" id="next"></i>
					</div>
				</div>
			</div>

		
			<div class="row" style="height:20px;width:100%;"></div>					
			<div class="row" style="padding: 0 0 0 0;margin: 0 0 0 0; width:100%;height:100%">			
				<div class="col-sm-3" style="margin: 0 0 0 0;padding: 0 0 0 0;"></div>	
				<div class="col-sm-9" style="margin: 0 0 0 0;padding: 0 0 0 0;">	
					<div style="margin:0px 0px 0px 0px 0px;padding:0px 0px 0px 5px;background:white;">
						<div id="galeria" class="owl-carousel" style="margin: 0 0 0 0;padding: 0 0 0 0;" >
							<?php
								include './adm/conecta.php';
								$sql="select f.foto from fotos_album f ";
								$sql.=" left join album a on (a.id=f.id_album) ";
								$sql.=" left join menu m on (m.id=a.id_menu) ";
								$sql.="where ";
								$sql.=" (m.nome='HOME') ";
								$sql.=" and (a.nome='CARROSEL1'); ";
								$my_Insert_Statement = $my_Db_Connection->prepare($sql);
								if ($my_Insert_Statement->execute()) {
									while ($resultado=$my_Insert_Statement->fetch()) 
									{

							?>
								<img  src="http://oniemariaproducoes.com/uploads/album/640x480/<?php echo $resultado['foto']?>">
							<?php 	
									}
								}
							?>	
						</div>
					</div>
				</div>
			</div>	
			
			
			<div class="row" style="height:20px;width:100%;"></div>					
			<div class="row" style="padding: 0 0 0 0;margin: 0 0 0 0; width:100%;height:100%">			
				<div class="col-sm-3" style="margin: 0 0 0 0;padding: 0 0 0 0;"></div>	
				<div class="col-sm-9" style="margin: 0 0 0 0;padding: 0 0 0 0;">	
					<div style="margin:0px 0px 0px 0px 0px;padding:0px 0px 0px 5px;background:white;">
						<div id="galeria" class="owl-carousel" style="margin: 0 0 0 0;padding: 0 0 0 0;" >
							<?php
								include './adm/conecta.php';
								$sql="select f.foto from fotos_album f ";
								$sql.=" left join album a on (a.id=f.id_album) ";
								$sql.=" left join menu m on (m.id=a.id_menu) ";
								$sql.="where ";
								$sql.=" (m.nome='HOME') ";
								$sql.=" and (a.nome='CARROSEL2'); ";
								$my_Insert_Statement = $my_Db_Connection->prepare($sql);
								if ($my_Insert_Statement->execute()) {
									while ($resultado=$my_Insert_Statement->fetch()) 
									{

							?>
								<img  src="http://oniemariaproducoes.com/uploads/album/640x480/<?php echo $resultado['foto']?>">
							<?php 	
									}
								}
							?>	
						</div>
					</div>
				</div>
			</div>	
						
						
			<div class="row" style="height:20px;width:100%;"></div>					
			<div class="row" style="padding: 0 0 0 0;margin: 0 0 0 0; width:100%;height:100%">			
				<div class="col-sm-3" style="margin: 0 0 0 0;padding: 0 0 0 0;"></div>	
				<div class="col-sm-9" style="margin: 0 0 0 0;padding: 0 0 0 0;">	
					<div style="margin:0px 0px 0px 0px 0px;padding:0px 0px 0px 5px;background:white;">
						<div id="galeria" class="owl-carousel" style="margin: 0 0 0 0;padding: 0 0 0 0;" >
							<?php
								include './adm/conecta.php';
								$sql="select f.foto from fotos_album f ";
								$sql.=" left join album a on (a.id=f.id_album) ";
								$sql.=" left join menu m on (m.id=a.id_menu) ";
								$sql.="where ";
								$sql.=" (m.nome='HOME') ";
								$sql.=" and (a.nome='CARROSEL3'); ";
								$my_Insert_Statement = $my_Db_Connection->prepare($sql);
								if ($my_Insert_Statement->execute()) {
									while ($resultado=$my_Insert_Statement->fetch()) 
									{

							?>
								<img  src="http://oniemariaproducoes.com/uploads/album/640x480/<?php echo $resultado['foto']?>">
							<?php 	
									}
								}
							?>	
						</div>
					</div>
				</div>
			</div>							
		
	</div>				
		
