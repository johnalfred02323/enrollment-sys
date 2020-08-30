    <!-- Sidebar -->
    <ul class="navbar-nav side-bar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../">
      <div class="sidebar-brand-icon">
          <img src="../../../src/img/grc-header.png" width="150px;">
        </div>
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

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentlist" aria-expanded="true" aria-controls="studentlist">
          <i class="fas fa-users"></i>
          <span>Students</span>
        </a>
        <div id="studentlist" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="sub-nav py-2 collapse-inner">
            <h6 class="collapse-header">Type</h6>
            <a class="collapse-item" href="../shifting-students/"> Shifting</a>
            <a class="collapse-item" href="../transferee-students/"> Transferee</a>
          </div>
        </div>
      </li>



      <!-- Subjects -->
      <li class="nav-item active">
        <a class="nav-link" href="./">
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
            <?php 
           $query = "SELECT DISTINCT course_abbreviation, course_name FROM course WHERE status = 'Active'";
           $result = mysqli_query($conn, $query); 
            if($count=mysqli_num_rows($result) > 0)  
            {
            while($rows=mysqli_fetch_array($result))
            {
              echo "<a class='collapse-item' href='../curriculum/index?Course=".$rows['course_abbreviation']."&Title=".$rows['course_name']."'>".$rows['course_abbreviation']."</a>";
            }
            }
            ?>
          </div>
        </div>
      </li>


      <!-- Schedule -->
      <li class="nav-item">
        <a class="nav-link" href="../schedule/">
          <i class="far fa-calendar-alt"></i>
          <span>Schedule</span></a>
      </li>  


      <!-- Course -->
      <li class="nav-item ">
        <a class="nav-link" href="../course/">
          <i class="fas fa-award"></i>
          <span>Course</span></a>
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
            <a class="collapse-item" href="../report-per-student/">Student</a>
            <a class="collapse-item" href="../report-per-subject/"> Subject</a>
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