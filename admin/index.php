<?php include "includes/header.php" ?>

    <div id="wrapper">

   <?php if($connection) echo "Conn" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Bienvenido Al Sistema
                            <small>Sistemas</small>

                            <?php echo $_SESSION['username'] ?>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <?php include "includes/navigation.php" ?>
        </div>



        <!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>