<?php
if (!isset($_SESSION)) {
  session_start();
}?>
<nav>
  <div class="sidebar-btn">
    <i class="bx bx-menu sidebarBtn"></i>
    <span>
      <?php if (isset($title)) {
        echo $title;
      } ?>
    </span>
  </div>

  <div class="profile-details">
    <i class="bx bx-user circle-icon"></i>
    <span class="admin-name">Admin Panel</span>
  </div>
</nav>

<script>
  let sidebar = document.querySelector('.sidebar');
  let sidebarBtn = document.querySelector('.sidebar-btn');
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle('active');
    if (sidebar.classList.contains('active')) {
      sidebarBtn.classList.replace('bx-menu', 'bx-menu-alt-right');
    } else sidebarBtn.classList.replace('bx-menu-alt-right', 'bx-menu');
  };
</script>