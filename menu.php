<?php $page = $_GET['page'] ?? 'home'; ?>

<nav class="navbar navbar-expand-lg shadow-sm px-4" style="background:white;">
  <div class="container-fluid">

    <a class="navbar-brand fw-bold" href="index.php" style="color:#6366f1;">
      MyWeb
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">

      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link <?= $page=='home'?'fw-bold text-primary':'' ?>" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page=='about'?'fw-bold text-primary':'' ?>" href="?page=about">About Me</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= $page=='contact'?'fw-bold text-primary':'' ?>" href="?page=contact">Contact Me</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= in_array($page,['level','studies'])?'fw-bold text-primary':'' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Studies
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?= $page=='level'?'active':'' ?>" href="?page=level">Level</a></li>
            <li><a class="dropdown-item <?= $page=='studies'?'active':'' ?>" href="?page=studies">Studies</a></li>
          </ul>
        </li>

      </ul>

      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['user']['nama']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><span class="dropdown-item-text">Role: <?= $_SESSION['user']['role'] ?? 'User'; ?></span></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-sm text-white" style="background:#6366f1;" href="?page=login">
              Login
            </a>
          </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>