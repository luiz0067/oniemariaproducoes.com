				<div  id="menu">
					<div class="row w-100">
						<a class="iten_menu<?php if(urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)) == "/") echo "_ativo"?>" href="/">Página Inicial</a>
					</div>
					<div class="row w-100" style="height:10px"></div>
					<?php
						include './adm/conecta.php';
						$sql="select id,nome,ocultar from menu where nome!='HOME' AND ocultar!=true";
						$my_Insert_Statement = $my_Db_Connection->prepare($sql);
						if ($my_Insert_Statement->execute()) {
							while ($resultado=$my_Insert_Statement->fetch()) 
							{

					?>
					
					<div class="row w-100">
						<a class="iten_menu<?php if(urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)) == "/galeria/".$resultado['nome']) echo "_ativo"?>" href="http://oniemariaproducoes.com/galeria/<?php echo $resultado['nome']?>"><?php echo $resultado['nome']?></a>
					</div>
					
					<div class="row w-100" style="height:10px"></div>

					<?php 	}
						}
					?>
					<div class="row w-100" style="height:10px"></div>
					<div class="row w-100">
						<a class="iten_menu<?php if(urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)) == "/contato") echo "_ativo"?>" href="/contato">Contato</a>
					</div>
					
					<div class="row w-100" style="height:10px"></div>
					<div class="row w-100">
						<a class="iten_menu<?php if(urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)) == "/orcamento") echo "_ativo"?>" href="/orcamento">Orçamento</a>
					</div>
					
				</div>
				<div id='barra_menu' ></div>