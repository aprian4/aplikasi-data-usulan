 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-info elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url(); ?>" class="brand-link">
         <img src="<?= base_url('assets/'); ?>img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">BKPP TANGSEL</span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-1 mb-1 d-flex">
             <a href="<?= base_url('user/profile'); ?>">
                 <div class="image mt-2">
                     <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info" style="color: white;">
                     <?= $user['nama_user']; ?>
                     <p style="color : white; font-size: 10px;"><i style="color: #adff2f;size: 1px;" class="fas fa-circle"></i> Online</p>
             </a>
         </div>
     </div>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


             <!-- QUERY MENU-->
             <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
        FROM `user_menu` JOIN `user_access_menu`
        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
        WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` ASC
        ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

             <!-- LOOPING MENU -->
             <?php foreach ($menu as $m) : ?>
                 <!-- Heading -->
                 <li class="nav-header pt-3"><?=
                                                $m['menu'];
                                                ?></li>


                 <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                 <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            WHERE `user_sub_menu`.`menu_id` = $menuId
            AND `user_sub_menu`.`is_active` = 1
            ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>


                 <?php if ($m['id'] == 1) : ?>
                     <li class="nav-item">
                         <?php if ($title == 'Dashboard') {
                                $nav = "nav-link active";
                            } else {
                                $nav = "nav-link";
                            } ?>
                         <a class="<?= $nav; ?>" href="<?= base_url('user'); ?>">
                             <i class="<?= 'nav-icon fas fa-tachometer-alt'; ?>"></i>
                             <span><?= 'Dashboard'; ?></span></a>
                     </li>

                     <?php if (($title == 'Kartu Pegawai') || ($title == 'Kartu Istri') || ($title == 'Kartu Suami') || ($title == 'Kartu Tanda Pengenal')) {
                            $nav1 = "nav-link active";
                            $class = "nav-item has-treeview menu-open";
                        } else {
                            $class = "nav-item has-treeview menu-close";
                            $nav1 = "nav-link";
                        } ?>
                     <li class="<?= $class; ?>">
                         <a href="#" class="<?= $nav1; ?>">
                             <i class="far fa-id-card nav-icon"></i>
                             <p>
                                 Layanan Kartu
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview ml-3">
                             <li class="nav-item">
                                 <?php if ($title == 'Kartu Pegawai') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karpeg/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kartu Pegawai</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Kartu Istri') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karis/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kartu Istri</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Kartu Suami') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karsu/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kartu Suami</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Kartu Tanda Pengenal') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('idcard/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Kartu Tanda Pengenal</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <?php if (($title == 'Cuti Tahunan Esselon II') || ($title == 'Cuti Karena Alasan Penting') || ($title == 'Cuti Besar') || ($title == 'Cuti di Luar Tanggungan Negara')) {
                            $nav1 = "nav-link active";
                            $class = "nav-item has-treeview menu-open";
                        } else {
                            $class = "nav-item has-treeview menu-close";
                            $nav1 = "nav-link";
                        } ?>
                     <li class="<?= $class; ?>">
                         <a href="#" class="<?= $nav1; ?>">
                             <i class="nav-icon fas fa-file"></i>
                             <p>
                                 Layanan Cuti
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview ml-3">
                             <li class="nav-item">
                                 <?php if ($title == 'Cuti Besar') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karsu/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p style="font-size: 15px;">Cuti Besar</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Cuti Tahunan Esselon II') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karpeg/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p style="font-size: 14px;">Cuti Tahunan Esselon II</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Cuti Karena Alasan Penting') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('karis/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p style="font-size: 13px;">Cuti Karena Alasan Penting</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Cuti di Luar Tanggungan Negara') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('idcard/home'); ?>" class="<?= $nav2; ?>">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p style="font-size: 11px;">Cuti di Luar Tanggungan Negara</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <li class="nav-item">
                         <?php if ($title == 'Laporan') {
                                $nav = "nav-link active";
                            } else {
                                $nav = "nav-link";
                            } ?>
                         <a class="<?= $nav; ?>" href="<?= base_url('laporan'); ?>">
                             <i class="<?= 'nav-icon fas fa-chart-bar'; ?>"></i>
                             <span><?= 'Laporan'; ?></span></a>
                     </li>
                 <?php endif; ?>

                 <?php foreach ($subMenu as $sm) : ?>
                     <li class="nav-item">
                         <?php if ($title == $sm['title']) {
                                $nav = "nav-link active";
                            } else {
                                $nav = "nav-link";
                            } ?>
                         <a class="<?= $nav; ?>" href="<?= base_url($sm['url']); ?>">
                             <i class="<?= $sm['icon']; ?>"></i>
                             <span><?= $sm['title']; ?></span></a>
                     </li>
                 <?php endforeach; ?>
                 <?php if ($m['id'] == 1) : ?>
                     <?php if (($title == 'Data API') || ($title == 'Whatsapp Blast') || ($title == 'Email Blast')) {
                            $nav1 = "nav-link active";
                            $class = "nav-item has-treeview menu-open";
                        } else {
                            $class = "nav-item has-treeview menu-close";
                            $nav1 = "nav-link";
                        } ?>
                     <li class="<?= $class; ?>">
                         <a href="#" class="<?= $nav1; ?>">
                             <i class="nav-icon fas fa-tools"></i>
                             <p>
                                 Tools
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview ml-3">
                             <li class="nav-item">
                                 <?php if ($title == 'Data API') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('dataapi'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fas fa-folder"></i>
                                     <p>Data API</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Whatsapp Blast') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('whatsapp/blast'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fab fa-whatsapp-square"></i>
                                     <p>Whatsapp Blast</p>
                                 </a>
                             </li>

                             <li class="nav-item">
                                 <?php if ($title == 'Email Blast') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('email/blast'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fas fa-envelope-square"></i>
                                     <p>Email Blast</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <?php if (($title == 'My Profile') || ($title == 'Edit Profile') || ($title == 'Ganti Password')) {
                            $nav1 = "nav-link active";
                            $class = "nav-item has-treeview menu-open";
                        } else {
                            $class = "nav-item has-treeview menu-close";
                            $nav1 = "nav-link";
                        } ?>
                     <li class="<?= $class; ?>">
                         <a href="#" class="<?= $nav1; ?>">
                             <i class="nav-icon fas fa-user-circle"></i>
                             <p>
                                 Akun User
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview ml-3">
                             <li class="nav-item">
                                 <?php if ($title == 'My Profile') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('user/profile'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fas fa-user"></i>
                                     <p>My Profile</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Edit Profile') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('user/edit'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fas fa-user-edit"></i>
                                     <p>Edit Profile</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <?php if ($title == 'Ganti Password') {
                                        $nav2 = "nav-link active";
                                    } else {
                                        $nav2 = "nav-link";
                                    } ?>
                                 <a href="<?= base_url('user/gantipassword'); ?>" class="<?= $nav2; ?>">
                                     <i class="nav-icon fas fa-key"></i>
                                     <p>Ganti Password</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 <?php endif; ?>

             <?php endforeach; ?>

             <div class="dropdown-divider"></div>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                     <i class="nav-icon fas fa-sign-out-alt"></i>
                     <span>Logout</span></a>
             </li>
             <br>
             <br>

         </ul>
     </nav>
     <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>