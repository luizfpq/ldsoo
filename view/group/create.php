
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Grupo de Usuários</h2>
    <p class="lead">Grupos de Usuários.</p>
  </div>

  <div class="row">
    
    <div class="col-md-8 order-md-1">
     
      <form action="index.php?controller=Group&action=create" method="POST" class="needs-validation" novalidate>
        
        <div class="mb-3">
          <label for="name">Nome</label>
          <input type="text" name="name" class="form-control" id="name" required>
          <div class="invalid-feedback">
            Nome
          </div>
        </div>

        <div class="mb-3">
          <label for="description">Descrição</label>
          <input type="text" name="description" class="form-control" id="description" required>
          <div class="invalid-feedback">
            Descrição
          </div>
        </div>

        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="active" id="active">
          <label class="custom-control-label" for="active">Ativo</label>
        </div>
        
        <hr class="mb-4">
        <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
      </form>
    </div>
  </div>