<?php

include_once('definitions.php');
session_start();

function inserir_classe()
{
	include('conecta.php');
	switch($_GET['class'])
	{
		case Definitions::atleta:
			if( isset($_POST['cpf_atleta'],$_POST['nome_atleta'],$_POST['idade_atleta'],$_POST['equipe_atleta']) )
			{
				$inputs = '(\'' . $_POST['cpf_atleta'] . '\',\'' . $_POST['nome_atleta'] . '\',\'' . $_POST['idade_atleta'] . '\',0,1,' . $_POST['equipe_atleta'] . ');'; 
				$query = 'INSERT INTO atleta (cpf,nome,idade,cartoes,fk_status_atleta,fk_equipe) VALUES ';
				$query = $query . $inputs;
				mysqli_query($conn,$query) or die(mysqli_error($conn));
			}
			break;
		case Definitions::equipe:
		    if( isset($_POST['nome_equipe']) )
			{
				$inputs = $_POST['nome_equipe'] . '\')';
				$query = 'INSERT INTO equipe (fk_status_equipe,nome) VALUES ((SELECT id_status_equipe from status_equipe where descricao = \'Inscrito\'),\'';
				$query = $query . $inputs;
				
				mysqli_query($conn,$query);				
			}
			break;
		case Definitions::competicao:
		    if( isset($_POST['nome_competicao'],$_POST['data_inicio'],$_POST['data_fim']) )
			{
				$inputs = '(\'' . $_POST['nome_competicao'] . '\',\'' . $_POST['data_inicio'] . '\',\'' . $_POST['data_fim'] . '\',1,0)';
				$query = 'INSERT INTO competicao (nome,data_inicio,data_termino,fk_status_competicao,qtd_inscritos) VALUES ';
				$query = $query . $inputs;
				
				mysqli_query($conn,$query);				
			}
			break;
		case Definitions::rodada:
		    if( isset($_POST['competicao_rodada'],$_POST['data_inicio'],$_POST['data_fim']) )
			{
				$inputs = '(\'' . $_POST['competicao_rodada'] . '\',1,0,\'' . $_POST['data_inicio'] . '\',\'' . $_POST['data_fim'] . '\')';
				$query = 'INSERT INTO rodada (fk_competicao,fk_status_rodada,qtd_jogos_rodada,data_inicio,data_fim) VALUES ';
				$query = $query . $inputs;
				
				mysqli_query($conn,$query);				
			}
			break;
		case Definitions::jogo:
		    if( isset($_POST['rodada_jogo'],$_POST['hora_inicio'],$_POST['hora_fim']) )
			{
				$aux_hora_inicio = '1000-01-01 ' . $_POST['hora_inicio'];
				$aux_hora_fim = '1000-01-01 ' . $_POST['hora_fim'];
				
				$inputs = '(\'' . $_POST['rodada_jogo'] . '\',1,0,\'' . $aux_hora_inicio . '\',\'' . $aux_hora_fim . '\')';
				$query = 'INSERT INTO jogo (fk_rodada,fk_status_jogo,gols_marcados,hora_inicio,hora_fim) VALUES ';
				$query = $query . $inputs;
								
				mysqli_query($conn,$query);
				
				$query = 'SELECT qtd_jogos_rodada FROM rodada WHERE id_rodada = ' . $_POST['competicao_rodada'];
				$rs=mysqli_query($conn,$query);
				$rw=mysqli_fetch_assoc($rs);
				$aux_qtd_jogos = $rw['qtd_jogos_rodada'];
				$aux_qtd_jogos++;
				$query = 'UPDATE rodada SET qtd_jogos_rodada = \'' . $aux_qtd_jogos . '\' WHERE id_rodada = ' . $_POST['competicao_rodada'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::participacao:
		    if( isset($_POST['jogo_participacao'],$_POST['equipe_participacao'],$_POST['gols_equipe']) )
			{	
				if((!isset($_POST['vencedor'])) || ($_POST['vencedor'] == NULL)) $_POST['vencedor'] = '0';
				if($_POST['vencedor'] == 'on') $_POST['vencedor'] = '1'; 
				
				$inputs = '(\'' . $_POST['equipe_participacao'] . '\',\'' . $_POST['jogo_participacao'] . '\',\'' . $_POST['gols_equipe'] . '\',\''. $_POST['vencedor'] . '\')';
				$query = 'INSERT INTO participacao (fk_equipe,fk_jogo,gols_jogo,vencedor) VALUES ';
				$query = $query . $inputs;
				
				mysqli_query($conn,$query) or die(mysqli_error($conn));
				
				$query = 'SELECT COUNT(*) AS numero_participacoes FROM participacao WHERE fk_jogo = ' . $_POST['jogo_participacao'];
				$rs=mysqli_query($conn,$query);
				$rw=mysqli_fetch_assoc($rs);
				if (intval($rw['numero_participacoes']) == 2)
				{
					$query = 'UPDATE jogo SET gols_marcados = (SELECT SUM(gols_jogo) FROM participacao WHERE fk_jogo = ' . $_POST['jogo_participacao'] . ') WHERE id_jogo = ' . $_POST['jogo_participacao'];
				}
			}
			break;
		case Definitions::inscricao:
		    if( isset($_POST['competicao_inscricao'],$_POST['equipe_inscricao']) )
			{	

				$inputs = '(\'' . $_POST['equipe_inscricao'] . '\',\'' . $_POST['competicao_inscricao'] . '\',0,0,0,0,0)';
				$query = 'INSERT INTO inscricao (fk_equipe,fk_competicao,posicao,vitorias,empates,derrotas,saldo_gols) VALUES ';
				$query = $query . $inputs;
				
				mysqli_query($conn,$query) or die(mysqli_error($conn));
				
			}
			break;
		default:
			echo "Erro, informações inválidas";
			header_remove();
			exit();
	}
	mysqli_close($conn);
}


function atualizar_classe()
{
	include('conecta.php');
	switch($_GET['class'])
	{
		case Definitions::atleta:
			if( isset($_POST['cpf_atleta'],$_POST['nome_atleta'],$_POST['idade_atleta'],$_POST['equipe_atleta'],$_POST['cartoes_atleta'],$_POST['status_atleta']) )
			{
				$query = 'UPDATE atleta SET cpf = \'' . $_POST['cpf_atleta'] .  '\',nome = \'' . $_POST['nome_atleta'] . '\',idade = \'' . $_POST['idade_atleta'] . '\',cartoes= \'' . $_POST['cartoes_atleta'] . '\',fk_status_atleta= \'' . $_POST['status_atleta'] . '\',fk_equipe= \'' . $_POST['equipe_atleta'] . '\' WHERE id_atleta = ' . $_POST['id_atleta'];
				mysqli_query($conn,$query) or die(mysqli_error($conn));
			}
			break;
		case Definitions::equipe:
		    if( isset($_POST['id_equipe'],$_POST['nome_equipe'],$_POST['status_equipe'],$_POST['capitao']) )
			{
				if ($_POST['capitao'] == 0) $_POST['capitao'] = 'NULL';
				$query = 'UPDATE equipe SET  fk_status_equipe =' . $_POST['status_equipe'] . ', nome = \'' . $_POST['nome_equipe'] . '\', fk_capitao = ' . $_POST['capitao'] . ' WHERE id_equipe = ' . $_POST['id_equipe'];
				
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::competicao:
		    if( isset($_POST['id_competicao'],$_POST['nome_competicao'],$_POST['data_inicio'],$_POST['data_fim'],$_POST['status_competicao']) )
			{
				$query = 'UPDATE competicao SET  nome =\'' . $_POST['nome_competicao'] . '\', data_inicio = \'' . $_POST['data_inicio'] . '\', data_termino = \'' . $_POST['data_fim'] .  '\', fk_status_competicao = \'' . $_POST['status_competicao'] . '\' WHERE id_competicao = ' . $_POST['id_competicao'];

				mysqli_query($conn,$query);
			}
			break;
		case Definitions::rodada:
		    if( isset($_POST['id_rodada'],$_POST['competicao_rodada'],$_POST['data_inicio'],$_POST['data_fim'],$_POST['status_rodada']) )
			{
				$query = 'UPDATE rodada SET  fk_competicao =\'' . $_POST['competicao_rodada'] . '\', data_inicio = \'' . $_POST['data_inicio'] . '\', data_fim = \'' . $_POST['data_fim'] .  '\', fk_status_rodada = \'' . $_POST['status_rodada'] . '\' WHERE id_rodada = ' . $_POST['id_rodada'];

				mysqli_query($conn,$query);
			}
			break;
		case Definitions::jogo:
		    if( isset($_POST['id_jogo'],$_POST['rodada_jogo'],$_POST['hora_inicio'],$_POST['hora_fim'],$_POST['status_jogo']) )
			{
				$aux_hora_inicio = '1000-01-01 ' . $_POST['hora_inicio'];
				$aux_hora_fim = '1000-01-01 ' . $_POST['hora_fim'];
				
				$query = 'UPDATE jogo SET  fk_rodada =\'' . $_POST['rodada_jogo'] . '\', hora_inicio = \'' . $aux_hora_inicio . '\', hora_fim = \'' . $aux_hora_fim .  '\', fk_status_jogo = \'' . $_POST['status_jogo'] . '\' WHERE id_jogo = ' . $_POST['id_jogo'];

				
				
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::participacao:
		    if( isset($_POST['id_participacao'],$_POST['jogo_participacao'],$_POST['equipe_participacao'],$_POST['gols_jogo'],$_POST['vencedor']) )
			{
				if($_POST['vencedor'] == 'on') $_POST['vencedor'] = '1'; 
					
				$query = 'UPDATE participacao SET  fk_jogo =\'' . $_POST['jogo_participacao'] . '\', fk_equipe = \'' . $_POST['equipe_participacao'] . '\', gols_jogo = \'' . $_POST['gols_jogo'] .  '\', vencedor = \'' . $_POST['vencedor'] . '\' WHERE id_participacao = ' . $_POST['id_participacao'];
				
				mysqli_query($conn,$query);
			}
			break;
		default:
			mysqli_close($conn);
			header_remove();
			echo "Defeito inesperado";
			//problemas com o atributo classe inserido
			exit();
	}
	mysqli_close($conn);
}

function apagar_classe()
{
	include('conecta.php');
	switch($_GET['class'])
	{
		case Definitions::atleta:
			if(isset($_GET['id']))
			{
				$query = 'UPDATE atleta SET fk_status_atleta = 4 WHERE id_atleta = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::equipe:
			if(isset($_GET['id']))
			{
				$query = 'UPDATE equipe SET fk_status_equipe = 4 WHERE id_equipe = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::competicao:
			if(isset($_GET['id']))
			{
				$query = 'UPDATE competicao SET fk_status_competicao = 5 WHERE id_competicao = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::rodada:
			if(isset($_GET['id']))
			{
				$query = 'UPDATE rodada SET fk_status_rodada = 4 WHERE id_rodada = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::jogo:
			if(isset($_GET['id']))
			{
				$query = 'UPDATE jogo SET fk_status_jogo = 5 WHERE id_jogo = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		case Definitions::participacao:
			if(isset($_GET['id']))
			{
				$query = 'DELETE FROM participacao WHERE id_participacao = ' . $_GET['id'];
				mysqli_query($conn,$query);
			}
			break;
		default:
			mysqli_close($conn);
			header_remove();
			echo "Defeito inesperado";
			//problemas com o atributo classe inserido
			exit();
	}
	mysqli_close($conn);
}

//processamento padrao da pagina
if ( (isset($_GET['option'])) && ($_SESSION['profile'] == Definitions::perfil_jogador || $_SESSION['profile'] == Definitions::perfil_admin || $_SESSION['profile'] == Definitions::perfil_capitao ) )
{
	
	if( ($_GET['option'] == Definitions::inserir) && (isset($_GET['class'])) )
	{
		inserir_classe();
		header( 'Location: http://192.168.0.50/index.php' ) ;
	}
	else if( ($_GET['option'] == Definitions::atualizar) && (isset($_GET['class'])) )
	{
		atualizar_classe();
		header( 'Location: http://192.168.0.50/index.php' ) ;
	}
	else if( ($_GET['option'] == Definitions::apagar) && (isset($_GET['class'])) )
	{
		apagar_classe();
		header( 'Location: http://192.168.0.50/index.php' ) ;
	}
	else
	{
		echo "Informacões inválidas";
		exit();	
	}
}
else 
{
	echo "Informacões inválidas";
	exit();
}
?>