<div class="nav-bar">
	{{nav-area}}
</div>
<div class="">
	<table class="table table-hover bg-light">
		<thead class="thead-dark">
			<tr>
				<th colspan="6">
					<center>
						Seus horários
					</center>
				</th>
			</tr>
			<tr>
				<th>
					<center>
						Nome
					</center>
				</th>
				<th>
					<center>
						Data Inicial
					</center>
				</th>
				<th>
					<center>
						Data Final
					</center>
				</th>
				<th>
					<center>
						Hora Inicial
					</center>
				</th>
				<th>
					<center>
						Hora Final
					</center>
				</th>
				<th>
					<center>
						Ação
					</center>
				</th>
			</tr>
		</thead>
		<tbody id="tbody">
			{{dinamic-area}}
		</tbody>
	</table>
</div>
<div id="modalEdit" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="mx-auto" style="width: 50%">
					<form id="formEdit" class="form">
						<input type="hidden" name="idSchedule" id="idSchedule">
						<table class="table">
							<tr>
								<td>
									<label for="nome">
										Nome: 
									</label>
								</td>
								<td>
									<input type="text" name="nome" id="nome">
								</td>
							</tr>
							<tr>
								<td>
									<label for="h-inicial">
										Hora Inicial:
									</label>
								</td>
								<td>
									<input type="time"  name="h-inicial" id="h-inicial"> 
								</td>
							</tr>
							<tr>
								<td>
									<label for="h-final">
										Hora Final:

									</label>
								</td>
								<td>
									<input type="time" name="h-final" id="h-final">
								</td>

							</tr>
							<tr>
								<td>
									<label for="d-inicial">
										Data Inicial:
									</label>
								</td>
								<td>
									<input type="date"  name="d-inicial" id="d-inicial">
								</td>
							</tr>
							<tr>
								<td>
									<label for="d-final">
										Data Final: 
									</label>
								</td>
								<td>
									<input type="date" name="d-final" id="d-final">
								</td>
							</tr>
							<tr>
								<td>
									<label for="desc">
										Descrição
									</label>
								</td>
								<td>
									<textarea name="desc" class="form-control" id="desc"></textarea>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button id="btnEditSave" type="button" class="btn btn-primary">Salvar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
<div id="modalDelete" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Deletar Horários</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					Tem certeza que quer <b>deletar</b> esse Horário??
				</p>
			</div>
			<div class="modal-footer">
				<button id="btnConfirmDelete" type="button" class="btn btn-outline-danger btn-block">
					Sim
				</button>
				<button type="button" class="btn btn-outline-success btn-block" data-dismiss="modal">
					Não
				</button>
			</div>
		</div>
	</div>
</div>
<div id="modalDetalhes" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detalhes do horário <p id="name"></p></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-striped">
					<tr>
						<td>
							<center>
								Nome: 
							</center>
						</center>

					</td>
					<td>
						<center>
							<p id="nomeVer"></p>
						</center>

					</td>
				</tr>
				<tr>
					<td>
						<center>
							Hora Inicial:
						</center>

					</td>
					<td>
						<center>
							<p id="h-inicialVer"></p>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							Hora Final:	
						</center>
					</td>
					<td>
						<center>
							<p id="h-finalVer"></p>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							Data Inicial:
						</center>
					</td>
					<td>
						<center>
							<p id="d-inicialVer"></p>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							Data Final: 
						</center>
					</td>
					<td>
						<center>
							<p id="d-finalVer"></p>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							Descrição
						</center>
					</td>
					<td>
						<center>
							<p id="descVer"></p>
						</center>
					</td>
				</tr>
			</table>
		</div>
		<div class="modal-footer">
			<button id="btnEditar" type="button" class="btn btn-outline-primary">
				Editar
			</button>
			<button class='btn btn-outline-danger' id="btnApagar">
				Deletar
			</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">
				Close
			</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="{{DIRJS}}home.js"></script>