    <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
        <div class="sidebar-brand-icon">
          <img src="../../../src/img/logo-white.png" width="50px;">
        </div>
        <div class="sidebar-brand-text mx-3">GRC <!-- <sup>admin</sup> --></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="../">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Subjects -->
      <li class="nav-item">
        <a class="nav-link" href="../subjects">
          <i class="fas fa-book"></i>
          <span>Subjects</span></a>
      </li>      


      <!-- Curriculum -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-graduation-cap"></i>
          <span>Curriculum</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="sub-nav py-2 collapse-inner">
            <h6 class="collapse-header">Courses</h6>
            <a class="collapse-item" href="../curriculum/index?Course=ALL&Title=All Courses">ALL</a>
            <a class="collapse-item" href="../curriculum/index?Course=BSIT&Title=Bachelor of Science in Information Technology">BSIT</a>
            <a class="collapse-item" href="../curriculum/index?Course=BSBA&Title=Bachelor of Science in Business Administration">BSBA</a>
            <a class="collapse-item" href="../curriculum/index?Course=BSA&Title=Bachelor of Science in Accountancy">BSA</a>
            <a class="collapse-item" href="../curriculum/index?Course=BSED&Title=Bachelor of Secondary Education">BSEd</a>
            <a class="collapse-item" href="../curriculum/index?Course=BEED&Title=Bachelor of Elementary Education">BEEd</a>
          </div>
        </div>
      </li>



      <!-- Schedule -->
      <li class="nav-item active">
        <a class="nav-link" href="./">
          <i class="far fa-calendar-alt"></i>
          <span>Schedule</span></a>
      </li>  

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Reports
      </div>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterlist" aria-expanded="true" aria-controls="masterlist">
          <i class="fas fa-list"></i>
          <span>Master List</span>
        </a>
        <div id="masterlist" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="sub-nav py-2 collapse-inner">
            <h6 class="collapse-header">Reports</h6>
            <a class="collapse-item" href="../report-per-section">Section</a>
            <a class="collapse-item" href="../report-per-subject/">Subject</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="../report-enrollment/">
          <i class="fas fa-file"></i>
          <span>Enrollment List</span></a>
      </li>  


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->