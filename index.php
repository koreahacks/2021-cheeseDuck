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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CheeseDuck Writing Service</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href = "newfont.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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
                    <div class="row">

                          <!-- What is the CheeseDuck -->
                          <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary text-center">What is the CheeseDuck?</h6>
                              </div>
                              <div class="card-body">
                                  <p class="mb-3">코로나19로 인해 많은 대학교가 비대면으로 수업을 진행하게 되었습니다.
                                   비대면 수업의 특성상 자연스레 pdf 또는 ppt 형식의 온라인 강의자료를 활용해 강의를 진행하는 경우가 많아졌고,
                                   아이패드와 같이 필기가 가능한 태블릿이 없는 학생들은 수업 중 필기에 대해 여러가지 애로사항이 발생하게 되었습니다.
                                   이러한 문제점을 인식한 저희 치즈덕은 대안책으로써 수업 중에 실시간으로 웹사이트를 통해서 손쉽고 간단하게 강의자료 위에
                                   강조 표시나 메모와 같은 필기가 가능하도록 도와주는 서비스를 개발하고자 했습니다.</p>
                                   <p class="mb-2 font-weight-bold text-center">그것이 바로 CheeseDuck Writing Service!</p>
                              </div>
                          </div>


                            <!-- Member of CheeseDuck -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Member of CheeseDuck</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/Cheeseduck_1.png" alt="">
                                    </div>
                                    <p class="mb-0 font-weight-bold text-center">Jimin Shin - Team leader</p>
                                    <p class="mb-0 font-weight-bold text-center">Gwonil Joo - Backend</p>
                                    <p class="mb-0 font-weight-bold text-center">Jaerin Yoo - Backend</p>
                                    <p class="mb-0 font-weight-bold text-center">Jungdae Choi - Frontend
                                    </p>
                                </div>
                            </div>
                          </div>

                        <!-- Cheer up A+ -->
                        <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="img/Cheeseduck_2.jpg" alt="">
                                </div>
                                <p class="mb-0 font-weight-bold text-center">치즈덕은 여러분들의 A+을 응원합니다!</p>
                            </div>
                        </div>
                      </div>

                    </div>
                <!-- /.container-fluid -->
                </div>

              <!-- End of Main Content -->

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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
