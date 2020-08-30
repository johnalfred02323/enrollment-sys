            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Title 1</div>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                            >
                            <div class="sb-nav-link-icon"><i class="far fa-newspaper"></i></div>
                            Dropdown
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i>
                            </div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="">Sample 1</a>
                                <a class="nav-link" href="">Sampl 2</a></nav>
                            </div>                   

                            <hr class="sidebar-divider">


                            <a class="nav-link" href="../grade-viewing">
                                <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                                Semester Grade Report
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