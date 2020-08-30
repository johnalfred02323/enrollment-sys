            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">              
                            <br>
                            <a class="nav-link" href="../dashboard">
                                <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link active" href="./">
                                <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                                Semester Grade Report
                            </a>

                            <a class="nav-link" href="../petition">
                                <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                                Petition
                            </a>

 
                            <a class="nav-link" href="../src/logout.php"><button type="button" class="btn btn-outline-danger float-right btn-sm w-100 mt-5"><i class="fas fa-sign-out-alt"></i> Log Out</button></a>                                    


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Welcome:</div>
                        <?php echo $_SESSION['name']; ?>
                    </div>
                </nav>
            </div>