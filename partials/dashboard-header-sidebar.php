<?php

require_once "./../../application/init.php";

$role = $_SESSION["user"]["role"];
$status = $_SESSION["user"]["status"];
?>

<!-- Header -->
<header>
    <nav>
      <ul>
        <li><a href="<?= BASE_PATH . 'dashboard/logout.php'; ?>">Logout</a></li>
      </ul>
    </nav>
  </header>

  <!-- Sidebar -->
  <aside>
    <div class="company-profile">
        <div class="company-logo">
            <img src="<?= BASE_PATH . 'assets/img/logo-website.png' ?>" alt="logo">
        </div>
        <h1 class="company-name">
            PT. Solusi Teknologi Inovatif
        </h1>
    </div>
    <ul>
        <?php if($status == "anggota" && $role == "admin"): ?>
            <li><a href="<?= BASE_PATH . 'dashboard/admin'; ?>">Admin</a></li>
            <li><a href="<?= BASE_PATH . 'dashboard/users'; ?>">Users</a></li>
            <li><a href="<?= BASE_PATH . 'dashboard/artikel'; ?>">Artikel</a></li>
            <li><a href="<?= BASE_PATH . 'dashboard/gallery'; ?>">Gallery</a></li>
        <?php elseif($status == "anggota" && $role == "anggota"): ?>
            <li><a href="<?= BASE_PATH . 'dashboard/artikel'; ?>">Artikel</a></li>
            <li><a href="<?= BASE_PATH . 'dashboard/gallery'; ?>">Gallery</a></li>
        <?php endif; ?>
        </ul>
  </aside>
