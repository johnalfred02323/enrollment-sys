<?php require '../src/layout/head.php'; // require ('../../config/config.php'); ?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>
</head>
<body class="sb-nav-fixed">   
<?php require '../src/layout/top-nav.php'; ?>
<div id="layoutSidenav">
<?php require 'side-bar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" style="margin-top: 25px;">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  </ol>
                </nav>

                <!-- SPACER -->
                <div class="mx-auto" style="height: 50px;"></div>





                <!-- SPACER -->
                <div class="mx-auto" style="height: 50px;"></div>
            </div>
        </main>
<?php require '../src/layout/footer.php'; ?>
    </div>
</div>
    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
