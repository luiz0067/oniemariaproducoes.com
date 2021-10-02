<?php include 'top.php'?>
<div class="row" style="padding: 0 0 0 0;margin: 0 0 0 0; width:100%;height:100%">			
	<div class="col-sm-3" style="margin: 0 0 0 0;padding: 0 0 0 0;"></div>	
	<div class="col-sm-9" style="margin: 0 0 0 0;padding: 0 0 0 0;">	
	<div class="row" style="height:50px;"></div>
		<div class="row" >
			<h3 style="text-align:center;width:100%;color:#8e1c1c;">ORÇAMENTO</h3>
	    </div>
		<div class="row" style="height:50px;"></div>  
<?php
        if(!(empty($_POST["acao"])) && ($_POST["acao"]=="enviar")){
            $nome=(!empty($_POST["nome"]))?$_POST["nome"]:"";
            $email=(!empty($_POST["email"]))?$_POST["email"]:"";
            $telefone=(!empty($_POST["telefone"]))?$_POST["telefone"]:"";
            $endereco=(!empty($_POST["endereco"]))?$_POST["endereco"]:"";
            
            $endereco_do_evento=(!empty($_POST["endereco_do_evento"]))?$_POST["endereco_do_evento"]:"";
            $data_do_evento=(!empty($_POST["data_do_evento"]))?$_POST["data_do_evento"]:"";
            $hora_do_evento=(!empty($_POST["hora_do_evento"]))?$_POST["hora_do_evento"]:"";
            $detalhes=(!empty($_POST["detalhes"]))?$_POST["detalhes"]:"";
            
            
            $tipo_do_evento=(!empty($_POST["tipo_do_evento"]))?$_POST["tipo_do_evento"]:"";
            
            ini_set('display_errors', 1);

            error_reporting(E_ALL);
            
            $from = "orcamento@oniemariaproducoes.com";
            $senha= "&Hb=UxqD";
            
            $to = "onibianca@hotmail.com";
            $to2 = "mariafilha.fassini@yahoo.com.br";
            
            $subject ="Oba! Cliente novo, entre em contato com $nome. no telefone $telefone ou email $email tambem pode visitar aqui  $endereco.";
            
            $message ="Olá, $nome Solicitou um orçamento para $tipo_do_evento \n";
            $message.="O evento será realizado no dia $data_do_evento as $hora_do_evento \n";
            $message.="no local $endereco_do_evento \n";
            $message.="\n";
            $message.="$nome informou mais detalhes sobre o evento\n";
            $message.="\n";
            $message.="$detalhes";
            
            $headers = "De:". $from;
            
            $enviado=mail($to, $subject, $message, $headers);
            $enviado=mail($to2, $subject, $message, $headers);
            $enviado=mail($email, $subject, $message, $headers);
            $enviado=mail($from, $subject, $message, $headers);
            if($enviado){
?>
<h3 style="text-align:center;width:100%;color:#8e1c1c;">Enviado com sucesso!</h3>
<h3 style="text-align:center;width:100%;color:#8e1c1c;">Em breve entraremos em contato</h3>
<?php
            }
        }
		else{
?>

		<div class="row">
		    <div class="col-sm-4">
		        <div style="width:300px;margin-left:auto;margin-right:auto;">
    		        <br>
    		        Consulte a disponibilidade e os valores para seu evento preenchendo o formulário ao lado.
                    <br>
                    <br>
                    Quanto mais detalhes você informar, melhor e mais podemos responder.
                      <br>  <br>  <br>
		        </div>  
		    </div>  
		    <div class="col-sm-4">
    		    <div style="width:300px;margin-left:auto;margin-right:auto;">
    		    
        			<form action="http://oniemariaproducoes.com/orcamento" method="POST">
        			    <input type="hidden" name="acao" value="enviar">
        				<div class="form-row align-items-center">
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupnome">Nome</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-bars" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGroupnome" placeholder="Seu nome" name="nome">
        						</div>
        						
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupemail">E-mail</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									@
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGroupemail" placeholder="Seu e-mail" name="email">
        						</div>
        
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGrouptelefone">Telefone</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-mobile" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGrouptelefone" placeholder="Seu telefone" name="telefone">
        						</div>
        						
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupendereco">Endereço</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-map-marker" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGroupendereco" placeholder="Seu endereço" name="endereco">
        						</div>

        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupendereco_do_evento">Endereço do evento</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-map-marker" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGroupendereco_do_evento" placeholder="Endereco do evento" name="endereco_do_evento">
        						</div>

        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupdata_do_evento">Data do evento</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-calendar" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGroupdata_do_evento" placeholder="__/__/____" name="data_do_evento">
        						</div>

        						
								<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGrouphora_do_evento">Hora do evento</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGrouphora_do_evento" placeholder="__:__" name="hora_do_evento">
        						</div>								
								
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGrouptipo_do_evento">Tipo do evento</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-heart" aria-hidden="true"></i>
        								</div>
        							</div>
        							<input type="text" class="form-control" id="inlineFormInputGrouptipo_do_evento" placeholder="Tipo do evento aniversário, casamento ..." name="tipo_do_evento">
        						</div>
        						
        						<div class="input-group mb-3">
        							<label class="sr-only" for="inlineFormInputGroupdetalhes">Detalhes</label>
        							<div class="input-group-prepend">
        								<div class="input-group-text">
        									<i class="fa fa-bars" aria-hidden="true"></i>
        								</div>
        							</div>
        							<textarea rows="10" type="text" class="form-control" id="inlineFormInputGroupdetalhes" placeholder="Detalhes" name="detalhes"></textarea>
        						</div>
        
        
        
        
        					<button name="novo" type="submit" class="btn btn-dark Enviar"><i class="fa fa-check" aria-hidden="true"></i> Enviar</button>      
        								
        
        								
        						
        				</div>
        			</form>
    		    </div>
		    </div>
        		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		    
		</div>
	
<?php } ?>	
	</div>
	
</div>
<?php include 'foot.php'?>