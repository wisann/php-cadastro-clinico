<!doctype html> 
<html lang="pt-br">
	<head>
		<title>Gravar paciente</title>
		<meta charset="UTF-8">
	</head>
	<body>
	<?php
		$agendamento 	= $_POST["agendamento"];
		$hora 			= $_POST["hora"];
		$nomeP 			= $_POST["nomeP"];
		$email 			= $_POST["email"];
		$telefone 		= $_POST["telefone"];
		$nascimento 	= $_POST["nascimento"];
		$estadocivil 	= $_POST["estadocivil"];
		$sexo 			= $_POST["sexo"];
		$doenca_cronica = 0;
		
		if ( isset($_POST["doenca_cronica"])  )
		{
			$doenca_cronica = $_POST["doenca_cronica"];
		}

		$rg	= $_FILES["rg"]["name"];
		$tipoArquivo= $_FILES["rg"]["type"];
		$tamanho 	= $_FILES["rg"]["size"];
		$nomeTemp 	= $_FILES["rg"]["tmp_name"];	

		$carteirinha	= $_FILES["carteirinha"]["name"];
		$tipoArquivo= $_FILES["carteirinha"]["type"];
		$tamanho 	= $_FILES["carteirinha"]["size"];
		$nomeTmp 	= $_FILES["carteirinha"]["tmp_name"];		
		
		
		$numero_carteirinha = $_POST["numero_carteirinha"];
		$sit_med		= $_POST["sit_med"];
		
		if ($agendamento =="")
		{
			die("A data de agendamento deve ser informada.");
		} 
		if ($hora =="")
		{
			die("O horário agendado deve ser informado.");
		} 

		if ($nomeP == "")
		{
			die("Nome do paciente não pode ficar em branco.");
		}
		if ($telefone =="")
		{
			die("O telefone deve ser informado.");
		} 
		if ($nascimento =="")
		{
			die("A data de nascimento deve ser informada.");
		} 
		if ($sexo =="")
		{
			die("O sexo do paciente deve ser informado.");
		}	
		if ($hora =="")
		{
			die("O horário agendado deve ser informado.");
		}
		if ($rg =="")
		{
			die("A foto do RG deve ser anexada.");
		}	
		if ($carteirinha =="")
		{
			die("A foto da carteirinha deve ser anexada.");
		}	
		if ($numero_carteirinha =="")
		{
			die("O número da carteirinha deve ser informado.");
		}	

		echo "<h1>Wisan Erik Monteiro da Silva RGM: 30546249<h1><br>";
		echo "<h1>Cadastro do paciente concluído!</h1>";
		echo "<b>Data do agendamento: $agendamento <br>";
		echo "Horário agendado: $hora <br>";
		echo "Nome do paciente: $nomeP <br>";
		echo "Email: $email <br>";
		echo "Telefone: $telefone <br>";
		echo "Data de nascimento: $nascimento <br>";
		echo "Estado civíl: $estadocivil <br>";
		echo "Sexo: $sexo <br>";
		echo "Doença crônica: $doenca_cronica <br>";		
		echo "Foto do RG: $rg <br>";
		echo "Tipo: $tipoArquivo <br>";
		echo "Tamanho: $tamanho bytes <br>";
		echo "Nome Temporário: $nomeTemp <br>";
		echo "Foto da carteirinha: $carteirinha <br>";
		echo "Tipo: $tipoArquivo <br>";
		echo "Tamanho: $tamanho bytes <br>";
		echo "Nome Temporário: $nomeTemp <br>";
		echo "Número da carteirinha: $numero_carteirinha <br>";
		echo "Situação médica: <br> $sit_med <hr>";
		
		$con = mysqli_connect("localhost", "root","");
		mysqli_set_charset($con, "utf8");	
		mysqli_select_db($con, "ALUNO30546249") or
			die("Erro na abertura do banco de dados:" .
				mysqli_error($con) );
			
				
		$sql = "INSERT INTO cadastro( 
										agendamento,
										hora,
										nomeP,
										email,
										telefone,
										nascimento,
										estadocivil,
										sexo,
										doenca_cronica,
										rg,
										carteirinha,
										numero_carteirinha,
										sit_med)
										
							VALUES(	
										'$agendamento',
										'$hora',
										'$nomeP',
										'$email',
										'$telefone',
										'$nascimento',
										'$estadocivil',
										'$sexo',
										'$doenca_cronica',
										'$rg',
										'$carteirinha',
										'$numero_carteirinha',
										'$sit_med')";
										
		mysqli_query($con, $sql) or
			die("Erro na inserção do paciente: " .
				mysqli_error($con) );	

						
		echo "<hr> Paciente $nomeP cadastrado com sucesso!<hr>";
		
										
										
		if ($rg<>"")
		{
			$destino="ARQUIVOS\\$rg";
			echo "Transferindo de $nomeTemp para $destino...<br>";
			move_uploaded_file($nomeTemp, $destino) or
			die("Erro na transferência: ". $_FILES["file"]["error"]);
			
			
		}
		if ($carteirinha<>"")
		{
			$destino="ARQUIVOS\\$carteirinha";
			echo "Transferindo de $nomeTmp para $destino...<br>";
			move_uploaded_file($nomeTmp, $destino) or
			die("Erro na transferência: ". $_FILES["file"]["error"]);}


		
	?>
	Clique <a href="cadastro.html">aqui</a> para cadastrar um novo paciente.
	</body>
</html>