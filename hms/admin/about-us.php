<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

  	if(isset($_POST['submit']))
  {
   
     $pagetitle=$_POST['pagetitle'];
$pagedes=$con->real_escape_string($_POST['pagedes']);
     $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    if ($query) {
 
    echo '<script>alert("Trang giới thiệu đã được cập nhật.")</script>';
  }
  else
    {
      echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại.")</script>';
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quản trị viên | Giới thiệu </title>

  <link
    href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
    rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
  <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
  <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/plugins.css">
  <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
  </script>
</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php');?>
    <div class="app-content">
      <?php include('include/header.php');?>
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h1 class="mainTitle">Quản trị viên | Giới thiệu</h1>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Quản trị viên </span>
                </li>
                <li class="active">
                  <span>Giới thiệu</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">


            <div class="row">
              <div class="col-md-12">


                <form class="forms-sample" method="post">
                  <?php
                
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Tiêu đề</label>
                    <input id="pagetitle" name="pagetitle" type="text" class="form-control" required="true"
                      value="<?php  echo $row['PageTitle'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea class="form-control" name="pagedes" id="pagedes"
                      rows="12"><?php  echo $row['PageDescription'];?></textarea>
                  </div>

                  <?php } ?>
                  <button type="submit" class="btn btn-primary mr-2" name="submit">Xác nhận</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php include('include/footer.php');?>

    <?php include('include/setting.php');?>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/modernizr/modernizr.js"></script>
  <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="vendor/switchery/switchery.min.js"></script>

  <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
  <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
  <script src="vendor/autosize/autosize.min.js"></script>
  <script src="vendor/selectFx/classie.js"></script>
  <script src="vendor/selectFx/selectFx.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/form-elements.js"></script>
  <script>
  jQuery(document).ready(function() {
    Main.init();
    FormElements.init();
  });
  </script>
</body>

</html>
<?php } ?>