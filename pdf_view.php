<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
  session_start();

  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CheeseDuck Writing Service</title>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <!--  <script src="pdf_draw.js" type="text/javascript"></script>-->
  <script src="rect.js"></script>

  <style>
      #canvas_container {
          width: 99.5%;
          height: 750px;
          overflow: auto;
          display: block;
      }

      #canvas_container {
        background: #333;
        text-align: center;
        border: solid 3px;
        background-color: rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
      }

      html, body {width:100%;height:100%;margin:0;padding:0;}
      body {position:relative;}
      .box1 {position:absolute;top:50%; left:50%;margin-left:-505px;margin-top:-185px;}

  </style>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href = "newfont.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-pencil-alt fa-lg"></i>
            </div>
            <div class="sidebar-brand-text mx-1">CheeseDuck</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Introduce -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-cat"></i>
                <span>Introduce</span></a>
        </li>
>>>>>>> b6413d6dba08ae4cffad47d8d761d916af8c71fb:pdf_view_1.html

      <!-- Nav Item - Tutorial -->
      <li class="nav-item active">
          <a class="nav-link" href="index.php">
              <i class="fas fa-fw fa-dog"></i>
              <span>Tutorial</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Function
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
          <a class="nav-link" href="pdf_view.php">
              <i class="fas fa-fw fa-table"></i>
              <span>pdf_view</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Honey Tip</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Components:</h6>
                  <a class="collapse-item" href="buttons.html">Buttons</a>
                  <a class="collapse-item" href="cards.html">Cards</a>
              </div>
          </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Learning Tools
      </div>

      <!-- Nav Item - Conversion Link -->
      <li class="nav-item">
          <a class="nav-link" href="https://smallpdf.com/kr/ppt-to-pdf">
              <i class="fas fa-fw fa-file-pdf"></i>
              <span>Conversion PDF - PPT</span></a>
      </li>

      <!-- Nav Item - Grammarly Link -->
      <li class="nav-item">
          <a class="nav-link" href="https://www.grammarly.com/">
              <i class="fas fa-fw fa-spell-check"></i>
              <span>Grammarly</span></a>
      </li>

      <!-- Nav Item - Everytime Link -->
      <li class="nav-item">
          <a class="nav-link" href="https://everytime.kr/">
              <i class="fas fa-fw fa-clock"></i>
              <span>Everytime</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Search Google -->
      <form method=get action="http://www.google.co.kr/search" target="_blank" >
        <table bgcolor="#224abe">
          <tr>
            <td>
              <input type=text name=q size=25 maxlength=255 value="" /> <!-- 구글 검색 입력 창 -->
              <input type=submit name=btnG value="Google 검색" /> <!-- 검색 버튼 -->
            </td>
          </tr>
        </table>
      </form>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Logo -->
                <div class='container-fluid'>
                 <div class='row'>
                   <img src="img/logo.png" alt="" width = "110" class="img-responsive center-block" >
                 </div>
               </div>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <?php  if (isset($_SESSION['id'])) : ?>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['id']; ?></span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                  <?php endif ?>

                </ul>

            </nav>
            <!-- End of Topbar -->


              <!-- Begin Page Content -->
              <div class="container-fluid">
                <body onload="InitThis();">
                     <div id="my_pdf_viewer">
                        <div id="canvas_container">
                            <canvas id="pdf_renderer"></canvas>
                        </div>

                        <div id="navigation_controls">
                            <button id="go_previous">Previous</button>
                            <input id="current_page" value="1" type="number"/>
                            <button id="go_next">Next</button>
                        </div>

                        <div id="zoom_controls">
                            <button id="zoom_in">+</button>
                            <button id="zoom_out">-</button>
                        </div>
                        <button onclick="javascript:drawImage();return false;">Clear Area</button>
                        <button onclick="javascript:cUndo();return false;">Undo</button>
                        <button onclick="javascript:cRedo();return false;">Redo</button>
                    </div>

                    <script>
                        var myState = {
                            pdf: null,
                            currentPage: 1,
                            zoom: 1.3
                        }

                        pdfjsLib.getDocument('./5-5-tiled matrix mul_boundary_Q.pdf').then((pdf) => {

                            myState.pdf = pdf;
                            //drawImage();
                            render();

                        });

                        function render() {
                            myState.pdf.getPage(myState.currentPage).then((page) => {

                                var canvas = document.getElementById("pdf_renderer");
                                var ctx = canvas.getContext('2d');

                                var viewport = page.getViewport(myState.zoom);

                                canvas.width = viewport.width;
                                canvas.height = viewport.height;

                                page.render({
                                    canvasContext: ctx,
                                    viewport: viewport
                                });
                            });
                        }

                        document.getElementById('go_previous').addEventListener('click', (e) => {
                            if(myState.pdf == null || myState.currentPage == 1)
                              return;
                            myState.currentPage -= 1;
                            document.getElementById("current_page").value = myState.currentPage;
                            render();
                        });

                        document.getElementById('go_next').addEventListener('click', (e) => {
                            if(myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages)
                               return;
                            myState.currentPage += 1;
                            document.getElementById("current_page").value = myState.currentPage;
                            render();
                        });

                        document.getElementById('current_page').addEventListener('keypress', (e) => {
                            if(myState.pdf == null) return;

                            // Get key code
                            var code = (e.keyCode ? e.keyCode : e.which);

                            // If key code matches that of the Enter key
                            if(code == 13) {
                                var desiredPage =
                                document.getElementById('current_page').valueAsNumber;

                                if(desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                                    myState.currentPage = desiredPage;
                                    document.getElementById("current_page").value = desiredPage;
                                    render();
                                }
                            }
                        });

                        document.getElementById('zoom_in').addEventListener('click', (e) => {
                            if(myState.pdf == null) return;
                            myState.zoom += 0.5;
                            render();
                        });

                        document.getElementById('zoom_out').addEventListener('click', (e) => {
                            if(myState.pdf == null) return;
                            myState.zoom -= 0.5;
                            render();
                        });
                  </script>
                  <!-- End Page Content -->

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Cheeseduck 2021</span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

        </div>
      </div>
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="index.php?logout='1'">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
