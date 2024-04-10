<?php  include './template/Layout/Nav.php'; ?>

<div>

<?php if(!empty($_SESSION['error'])): ?>

<div class="alert alert-danger mt-3" role="alert">
    <?= $_SESSION['error'] ?>
</div>

<?php endif;
        unset($_SESSION['error']) 
?>


    <form class="mt-4">
        <div class="form-floating mb-3 text-dark">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3 text-dark">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="btn btn-primary">Ingresar</div>
    </form>
</div>