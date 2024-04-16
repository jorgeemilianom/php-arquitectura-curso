<?php



?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Links Platform</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
      </ul>
      <?php if($btn_login): ?>
      <a class="btn btn-outline-success mx-1" aria-current="page" href="/login/">Login</a>
      <?php endif; ?>
      <a class="btn btn-outline-success mx-1" aria-current="page" href="/backoffice/">Backoffice</a>
    </div>
  </div>
</nav>