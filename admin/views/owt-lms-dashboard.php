<!-- Page Wrapper -->
<div id="wrapper">


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid" style="background-color: white;">

      <!-- Page Heading -->
      <div class="jumbotron">
        <h1 class="display-2 text-gray-800">Library System Dashboard</h1>
      </div>

      <div class="row" style="padding-bottom: 20px;">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Manage Students</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Total Students: <?php echo $params['students']; ?></div>
                </div>
                <div class="col-auto">
                  <a href="admin.php?page=owt-lib-manage-students">
                  <style>.fa-user:hover{color:#4E73DF;}</style>
                    <span style="color: #6484E3;">
                      <i class="fas fa-user fa-6x"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Manage Staffs</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Total Staffs: <?php echo $params['staffs']; ?></div>
                </div>
                <div class="col-auto">
                  <a href="admin.php?page=owt-lib-manage-staffs">
                  <style>.fa-user-tie:hover{color:#19B27B;}</style>
                    <span style="color: #1CC88A;">
                      <i class="fas fa-user-tie fa-6x"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-info text-uppercase mb-1">Manage Books</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Total Books: <?php echo $params['books']; ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                <style>.fa-book:hover{ color: #2FA8B9; }</style>
                  <a href="admin.php?page=owt-lib-manage-books">
                    <span style="color: #36B9CC;">
                      <i class="fas fa-book fa-6x"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Borrow/Return</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Students: <?php echo $params['issue_to_students']; ?></div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Staffs: <?php echo $params['issue_to_staffs']; ?></div>
                </div>
                <div class="col-auto">
                <style>.fa-book-reader:hover{ color: #F5BA26; }</style>
                  <a href="admin.php?page=owt-lib-book-issue-list">
                    <span style="color: #F6C23E;">
                      <i class="fas fa-book-reader fa-6x"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



