<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php //echo $this->session->userdata('namaUser'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
            <a href="<?php echo site_url('Master'); ?>">
                <i class="fa fa-home"></i>
                <span>Home</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php //echo site_url(''); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Data Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('master/village'); ?>"><i class="fa fa-circle-o"></i> Data Desa</a></li>
                <li><a href="<?php echo site_url('master/district'); ?>"><i class="fa fa-circle-o"></i> Data Kecamatan</a></li>
                <li><a href="<?php echo site_url('master/candidate'); ?>"><i class="fa fa-circle-o"></i> Data Calon</a></li>
                <li><a href="<?php echo site_url('master/candidate'); ?>"><i class="fa fa-circle-o"></i> Data Petugas</a></li>
              </ul>
            </li>
           
           <li class="treeview">
            <a href="<?php echo site_url('App/Voice'); ?>">
                <i class="fa fa-users"></i>
                <span>Data Suara</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
            <a href="<?php echo site_url('App/Voter'); ?>">
                <i class="fa fa-th"></i>
                <span>Data Pemilih</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->      
</aside>
