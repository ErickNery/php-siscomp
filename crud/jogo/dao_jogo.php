<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_jogo()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query='SELECT j.id_jogo, j.fk_rodada AS rodada_jogo, s.descricao AS status_jogo, j.gols_marcados, DATE_FORMAT(hora_inicio,\'%H:%i\') AS hora_inicio, DATE_FORMAT(hora_fim,\'%H:%i\') AS hora_fim from jogo j INNER JOIN status_jogo s ON j.fk_status_jogo = s.id_status_jogo';
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>Id</th>
			<th>Rodada</th>
			<th>Status</th>
			<th>Gols Marcados</th>
			<th>Hora Inicio</th>
			<th>Hora Termino</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['id_jogo'] .' 
			</td>
			<td class="select_table">'
			. $rw['rodada_jogo'] .' 
			</td>
			<td class="select_table">' 
			. $rw['status_jogo'] . '
			</td>
			<td class="select_table">'
			. intval($rw['gols_marcados']) .' 
			</td>
			<td class="select_table">'
			. $rw['hora_inicio'] .' 
			</td>
			<td class="select_table">'
			. $rw['hora_fim'] .' 
			</td>
			<td class="select_table">
			<a href="/admin/admin_jogo.php?opcao=3&id=' . $rw['id_jogo'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=jogo&option=4&id=' . $rw['id_jogo'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_jogo($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query='SELECT id_jogo,fk_rodada,fk_status_jogo, DATE_FORMAT(hora_inicio,\'%H:%i\') AS hora_inicio ,DATE_FORMAT(hora_fim,\'%H:%i\') AS hora_fim FROM jogo where id_jogo = ' . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

function seleciona_rodada_jogo($id_rodada = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="select r.id_rodada, r.fk_status_rodada,c.nome from rodada r inner join competicao c on r.fk_competicao = c.id_competicao where r.fk_status_rodada NOT IN (3,4)"; // esteja em um status valido
	$rs=mysqli_query($conn,$query);

	$result = '<select name="rodada_jogo">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_rodada == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_rodada'] . '">' . $rw['id_rodada'] . ' - ' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_rodada'] . ' " ';
			if($rw['id_rodada'] == $id_rodada) $result = $result . 'selected="selected" ';
			$result = $result . '>' . $rw['id_rodada'] . ' - ' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_jogo($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');

	$query="select id_status_jogo,descricao from status_jogo";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_jogo">';
	
	if($id_status == 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_jogo'] . '" >' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_jogo'] . '" ';
			if($rw['id_status_jogo'] == $id_status)
			{
				$result = $result . 'selected="selected" ';
			}
			$result = $result . '>' . $rw['descricao'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

?>