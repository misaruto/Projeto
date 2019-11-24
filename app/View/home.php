<div class="nav-bar">
	{{nav-area}}
</div>
<div class="">
	<table class="table table-hover bg-light">
		<thead class="thead-dark">
			<th colspan="6">
				<center>
					Seus horários
				</center>
			</th>
		</thead>
		<tbody>
			{{dinamic-area}}
		</tbody>
	</table>
</div>
<div id="modalEdit" class="modal" tabindex="-1" role="dialog" hidden>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formEditar" class="form">
					<label>
						Nome: <input type="text" name="nome" id="nome">
					</label>
					<br>
					<label>
						Hora Inicial/Final:

						<input type="date"  name="h-inicial" id="h-inicial"> / 
						<input type="date" name="h-final" id="h-final">
					</label>
					<br>
					<label>
						Data Inicial/Final

						<input type="date"  name="d-inicial" id="d-inicial"> / 
						<input type="date" name="d-final" id="d-final">
					</label>
					<br>
					<label>
						Descrição

						<textarea name="desc" class="form-control" id="desc"></textarea>
					</label>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{DIRJS}}home.js"></script>