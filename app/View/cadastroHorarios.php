<br>
<div class="mx-auto" style="width: 50%">
  <form class="form">
    <table class="table table-striped bg-light" style="width: 100%">
      <thead class="thead-dark">
        <th colspan="2">Cadastro de Horários</th>
      </thead>
      <tbody>
        <tr>
          <td>
            <label for="nome">
              Nome:
            </label>
          </td>
          <td>
            <input type="text" name="nome" id="nome" class="form-control">
          </td>
        </tr>
        <tr>
          <td>
            <label for="hora">
              Hora inicial / Hora Final
            </label>
          </td>
          <td>
            <input type="time" id="hora" name="h-inicial"> / 
            <input type="time" name="h-final">
          </td>
        </tr>
        <tr>
          <td>
            Data Inicil/Final
          </td>
          <td>
            <input type="date"  name="d-inicial"> / 
            <input type="date" name="d-final">
          </td>
        </tr>
        <tr>
          <td>
            Descrição
          </td>
          <td>
            <textarea name="desc" class="form-control"></textarea>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">
            <div style="height: 34px;">
              <button style="height: 40px" class="btn btn-outline-info btn-block btn-signup">Cadastrar</button>
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>