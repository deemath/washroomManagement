<?php include('partials/menu.php'); ?>


    <!--Main content section strat-->
    <div class="main-content">
      <div class="wrapper">
          <h1>Dashboard</h1>

          <br><br>

          <?php
            if(isset($_SESSION['login']))
            {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
            } 
          
          ?>
          <br><br>

          <div class="col-4 text-center">
            <h1>2</h1>
            <br /> 
            Main Locations
          </div>

          <div class="col-4 text-center">
            <h1>23</h1>
            <br /> 
            Sub Locations
          </div>

          <div class="col-4 text-center">
            <h1>95</h1>
            <br /> 
            Washrooms
          </div>

          <div class="col-4 text-center">
            <h1>0000</h1>
            <br /> 
            Record
          </div>

          <div class="clearfix"></div>

      </div>
    </div>
    <!--Main content section end-->

<?php include('partials/footer.php') ?>