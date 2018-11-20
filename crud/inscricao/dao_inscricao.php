<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_inscricao()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query='SELECT matricula,fk_equipe,fk_competicao,saldo_gols,empates,derrotas,vitorias FROM inscricao WHERE fk_equipe <> 4 AND fk_competicao <> 5';
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>Equipe</th>
			<th>Competicao</th>
			<th>Gols</th>
			<th>Vitorias</th>
			<th>Empates</th>
			<th>Derrotas</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['fk_equipe'] .' 
			</td>
			<td class="select_table">'
			. $rw['fk_competicao'] .' 
			</td>
			<td class="select_table">' 
			. intval($rw['saldo_gols']) . '
			</td>
			<td class="select_table">'
			. intval($rw['vitorias']) .' 
			</td>
			<td class="select_table">'
			. intval($rw['empates']) .' 
			</td>
			<td class="select_table">'
			. intval($rw['derrotas']) .' 
			</td>
			<td class="select_table">
			<a href="/admin/admin_inscricao.php?opcao=3&id=' . $rw['matricula'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=inscricao&option=4&id=' . $rw['matricula'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_participacao($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_participacao,fk_jogo,fk_equipe,gols_jogo,vencedor FROM participacao where id_participacao = " . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

function seleciona_competicao_inscricao($id_competicao = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_competicao,nome FROM competicao WHERE fk_status_competicao NOT IN (3,4,5)";
	$rs=mysqli_query($conn,$query);

	$result = '<select name="competicao_inscricao">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_competicao == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_competicao'] . '">' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_competicao'] . ' " ';
			if($rw['id_competicao'] == $id_competicao) $result = $result . 'selected="selected" ';
			$result = $result . '>' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

function seleciona_equipe_inscricao($nome_item,$id_equipe = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_equipe, nome FROM equipe WHERE fk_status_equipe <> 4";
	$rs=mysqli_query($conn,$query);

	$result = '<select name="' . $nome_item . '">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_equipe == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_equipe'] . '" >' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_equipe'] . '" ';
			if($rw['id_equipe'] == $id_equipe)
			{
				$result = $result . 'selected="selected" ';
			}
			$result = $result . '>' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_rodada($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');

	$query="select id_status_rodada,descricao from status_rodada";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_rodada">';
	
	if($id_status == 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_rodada'] . '" >' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_rodada'] . '" ';
			if($rw['id_status_rodada'] == $id_status)
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