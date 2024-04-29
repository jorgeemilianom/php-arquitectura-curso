<h1>Backoffice</h1>

<h2><?= $Context->Data['TEST']; ?></h2>
<h2><?= $Context->Data['product']; ?></h2>

<hr>

<form class="col-4" method="POST">
    <div class="form-floating mb-3 text-dark">
        <input type="text" class="form-control" name="name_link" placeholder="name@example.com">
        <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating text-dark">
        <input type="text" class="form-control" name="link" placeholder="Password">
        <label for="floatingPassword">Link</label>
    </div>
    <button class="btn btn-primary mt-2">Guardar</button>
</form>