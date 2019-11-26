<?php 
function reloadBody()
{
	require_once 'app/Model/Schedules.php';
	$id = $_SESSION['id'];
	$schedules = new Schedules;
	$center = $schedules->select($id);
	$itens = "";
	if ($center == NULL) {
		$itens = "
		<tr>
		<td colspan=6>
		<div class='alert alert-info'>
		<center>
		<b>
		Nenhum horário encontrado
		</b>
		</center>
		</div>
		</td>
		</tr>";
	}
	else{
		foreach ($center as $value) {
			$data_inicio = date('d/m/Y',strtotime($value->initial_date));
			$data_fim = date('d/m/Y',strtotime($value->final_date));
			$itens = $itens."
			<tr class='tr' >
			<td onclick='detalhar(".$value->id.")' title='Clique duas vezes para editar'>
			<center>".$value->name."</center>
			</td>
			<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
			<center>".$data_inicio."</center>
			</td>
			<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
			<center>".$data_fim."</center>
			</td>
			<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
			<center>".$value->initial_time."</center>
			</td>
			<td onclick='detalhar(".$value->id.")' title='Clique para editar'>
			<center>".$value->final_time."</center>
			</td>
			<td>
			<button onclick='deletar(".$value->id.")' class='btn btn-outline-danger btn-block'>
			Deletar
			</button>
			</td>
			</tr>";
		}
	}
	return $itens;

}
?>