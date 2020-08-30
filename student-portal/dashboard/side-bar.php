            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">         
                            
                            <div class="sb-sidenav-menu-heading">Student Info</div>

                            <a class="nav-link active" href="./">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Semester</div>

                            <a class="nav-link" href="../grade-viewing">
                                <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                                Grade Report
                            </a>

                            <div class="sb-sidenav-menu-heading">Manage</div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="sb-nav-link-icon"><i class="far fa-calendar"></i></div>
                                Schedule
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../schedule">View Schedule</a>
                                    <a class="nav-link" href="../create-schedule">Create Schedule</a>
                                </nav>
                            </div>                            

                            <a class="nav-link" href="../petition">
                                <div class="sb-nav-link-icon"><i class="far fa-file"></i></div>
                                Petition
                            </a>
                            
                            <a class="nav-link" href="../src/logout.php"><button type="button" class="btn btn-outline-danger float-right btn-sm w-100 mt-5"><i class="fas fa-sign-out-alt"></i> Log Out</button></a>                                    


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Welcome:</div>
                        <?php echo $_COOKIE['name']; ?>
                    </div>
                </nav>
            </div>