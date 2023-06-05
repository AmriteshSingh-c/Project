<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_coordinator'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b>
                      <?php echo $_SESSION['name']; ?>
                    </b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> Update Profile</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Post Drive</a></li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> Current Drives</a></li>
                    <li class="active"><a href="job-applications.php"><i class="fa fa-file-o"></i> Drive
                        Applications</a></li>
                    <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <form method="POST">
                <?php 
                $sql1="SELECT companyname FROM job_post WHERE job_post.id_coordinator=$_SESSION[id_coordinator]";
                $result1=$conn->query($sql1);
                ?>
                <div class="form-group text-center option">
                  <!-- <label>Select Company </label> -->

                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1"
                    aria-hidden="true" class="input" name="company">
                    <option value="" selected>Select Company</option>
                    <?php
                    if ($result1->num_rows > 0) {
                      while ($row1 = $result1->fetch_assoc()) {


                        ?>
                        <option class="option1" name="option1" id="option1" value="<?php echo $row1['companyname']; ?>"
                          <?php if (isset($_POST['company']) && $_POST['company'] == $row1['companyname'])
                            echo "selected='selected'" ?>><?php echo $row1['companyname']; ?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1"
                    aria-hidden="true" class="input" name="gender">
                    <option value="" selected>Select Gender</option>
                    <option class="option1" name="option1" id="option1" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male')
                      echo "selected='selected'" ?>>Male</option>
                      <option class="option1" name="option1" id="option1" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female')
                      echo "selected='selected'" ?>>Female
                      </option>
                    </select>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1"
                      aria-hidden="true" class="input" name="stream">
                      <option value="" selected>Select Stream</option>
                      <option class="option1" name="option1" id="option1" value="CE" <?php if (isset($_POST['stream']) && $_POST['stream'] == 'CE')
                      echo "selected='selected'" ?>>CE</option>
                      <option class="option1" name="option1" id="option1" value="ME" <?php if (isset($_POST['stream']) && $_POST['stream'] == 'E')
                      echo "selected='selected'" ?>>ME
                      </option>
                      <option class="option1" name="option1" id="option1" value="CSE" <?php if (isset($_POST['stream']) && $_POST['stream'] == 'CSE')
                      echo "selected='selected'" ?>>CSE
                      </option>
                      <option class="option1" name="option1" id="option1" value="ECE" <?php if (isset($_POST['stream']) && $_POST['stream'] == 'ECE')
                      echo "selected='selected'" ?>>ECE
                      </option>
                      <option class="option1" name="option1" id="option1" value="EE" <?php if (isset($_POST['stream']) && $_POST['stream'] == 'EE')
                      echo "selected='selected'" ?>>EE
                      </option>
                    </select>
                    

                  <input name="submit" type="submit" value="Submit">
                  <form method="POST" action=""></form>


              </form>
            </div>

            <?php

                    if (isset($_POST['submit'])) {


                      $company_option = mysqli_real_escape_string($conn, $_POST['company']);






                      ?>
                                          <!-- <h3>Drive Applications</h3> -->
                                          <div class="row margin-top-20">
                                              <div class="col-md-13">
                                                  <div class="box-body table-responsive no-padding">
                                                      <table id="example2" class="table table-hover">
                                                          <thead>
                                                              <th>Student Name</th>
                                                              <th>Gender</th>
                                                              <th>Stream</th>
                                                              <!-- <th>Email</th> -->
                                                              <th>HSC</th>
                                                              <th>SSC</th>
                                                              <th>UG</th>
                                                              <th>Passing Year</th>
                                                              <th>Current Status</th>
                                                              <th>Mark as Placed</th>
                                                              <th>Mark as Not Placed</th>
                                                          </thead>
                                                          <tbody>
                                                              <?php
                                                              // selecting student record via option 
                                                            
                                                              $sql2 = "select id_jobpost from job_post where companyname = '$company_option'";

                                                              $result2 = $conn->query($sql2);


                                                              if ($result2->num_rows > 0) {
                                                                while ($row2 = $result2->fetch_assoc()) {
                                                                  $jobid = $row2['id_jobpost'];



                                                                  $sql = "select * from users  ";
                                                                  $company_condition = "inner join apply_job_post on users.id_user = apply_job_post.id_user where id_jobpost = '$jobid'";
                                                                  $final_sql = $sql . $company_condition;
                                                                  if (isset($_POST['gender'])) {
                                                                    $gender_option = mysqli_real_escape_string($conn, $_POST['gender']);
                                                                    if ($gender_option != "") {
                                                                      $gender_condition = " and users.gender='$gender_option'";
                                                                      $final_sql = $final_sql . $gender_condition;
                                                                    }
                                                                  }
                                                                  if (isset($_POST['stream'])) {
                                                                    $stream_option = mysqli_real_escape_string($conn, $_POST['stream']);
                                                                    if ($stream_option != "") {
                                                                      $stream_condition = " and users.stream='$stream_option'";
                                                                      $final_sql = $final_sql . $stream_condition;
                                                                    }
                                                                  }


                                                                  $_SESSION['QUERY'] = $final_sql;
                                                                  $result = $conn->query($final_sql);

                                                                  if ($result->num_rows > 0) {

                                                                    while ($row = $result->fetch_assoc()) {

                                                                      // $skills = $row['skills'];
                                                                      // $skills = explode(',', $skills);
                                                                      ?>
                                                                                                                      <tr>
                                                                                                                        <td>
                                                                                                                          <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                                                                                                        </td>
                                                                                                            
                                                                                                            
                                                                                                                        <td>
                                                                                                                          <?php echo $row['gender']; ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <?php echo $row['stream']; ?>
                                                                                                                        </td>
                                                                                                            
                                                                                                            
                                                                                                                        <!-- <td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <?php echo $row['email']; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td> -->
                                                                                                            
                                                                                                                        <td>
                                                                                                                          <?php echo $row['hsc']; ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <?php echo $row['ssc']; ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <?php echo $row['ug']; ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <?php echo $row['passingyear']; ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <!-- current status -->
                                                                                                                          <?php
                                                                                                                          if ($row['status'] == 1) {
                                                                                                                            echo '<div class="col-md-3 "><h3 class="btn btn-info bg-green" >Placed</a> </div>';

                                                                                                                          } else {

                                                                                                                            echo '<div class="col-md-3"><h3 class="btn btn-info bg-red" > Not Placed</a> </div>';

                                                                                                                          } ?>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <!-- mark as placed -->
                                                                                                            
                                                                                                                          <a href="under-review.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $jobid ?>"
                                                                                                                            class="btn btn-success">Mark as Placed</a>
                                                                                                            
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                          <!-- mark as unplaced -->
                                                                                                                          <a href="reject.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $jobid; ?>" class="btn btn-danger">Mark
                                                                                                                            as Not
                                                                                                                            Placed</a>
                                                                                                                        </td>
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                                      </tr>
                                                                                                            
                                                                                                            
                                                                                                                      <?php

                                                                    }
                                                                  }
                                                                }
                                                              } ?>
                                                          </tbody>

                                                      </table>
                                                  </div>
                                              </div>
                                          </div>



                                <?php

                    }
                    ?>

          </div>
        </div>
      </section>



    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Copyright &copy; 2022 <a href="scsit@Davv">Placement Portal</a>.</strong> All rights
        reserved.
      </div>
    </footer>



  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>

</body>

</html>