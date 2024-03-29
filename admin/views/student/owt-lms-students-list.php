<!-- Page Wrapper -->
<div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tables</h1>
      <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
            <table class="table table-bordered" id="owt-tbl-book-list" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
                <tr>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>Tokyo</td>
                  <td>63</td>
                  <td>2011/07/25</td>
                  <td>$170,750</td>
                </tr>
              </tbody>
            </table>
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
        <span>Copyright &copy; Your Website 2019</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <a class="btn btn-primary" href="login.html">Logout</a>
    </div>
  </div>
</div>
</div>


<!-- ------------------------------------------------------------- -->



<div class="container">
    <div class="row owt-inner-row owt-lib-breadcrumb-top">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-manage">Library Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Student</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row owt-inner-row">
        <div class="panel panel-primary">
            <div class="panel-heading wpowt-lib-bg">
                Students List
                <a href="admin.php?page=owt-lib-create-student" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Add Student</a>
                <a href="Javascript:;" data-toggle="modal" data-target="#wpowt-branch-modal" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Add Branch</a>
                <a href="Javascript:;" data-toggle="modal" data-target="#wpowt-view-all-branch-modal" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">View All Branch</a>
            </div>
            <div class="panel-body">
                <!-- <table id="owt-tbl-book-list" class="display" style="width:100%"> -->
                <table id="" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Reg ID</th>
                            <th>Class/Branch</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($params['students'])) {

                            if (count($params['students']) > 0) {

                                $count = 1;
                                foreach ($params['students'] as $student) {
                                    
                                    if (!empty($student->phone_no)) {
                                        $phone = $student->phone_no;
                                    } elseif (!empty($student->parent_phone_no)) {
                                        $phone = $student->parent_phone_no." (parent)";
                                    } else {
                                        $phone = '<i>-- No phone --</i>';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $student->name; ?></td>
                                        <td><?php echo $student->student_id; ?></td>
                                        <td><?php echo $this->owt_library_get_branch_info($student->branch_id); ?></td>
                                        <td><?php echo!empty($student->email) ? $student->email : '<i>-- No email --</i>'; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td>
                                            <a href="admin.php?page=owt-lib-create-student&action=edit&stid=<?php echo $student->id; ?>" class='btn btn-info wpowt-lib-btn'><i class="mdi mdi-pencil"></i></a>
                                            <a href="javascript:void(0)" class='btn btn-danger wpowt-lib-del-student wpowt-lib-btn' data-id="<?php echo $student->id; ?>"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table> 
            </div>
        </div>

    </div>
</div>

<div id="wpowt-branch-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adding Class/Branch...</h4>
            </div>
            <div class="modal-body">
                <form action="Javascript:Void(0)" id="wpowt-frm-add-frm" method="post">
                    <div class="form-group">
                        <label for="txtbranch">Class/Branch Title</label>
                        <input type="text" required="" class="form-control" placeholder="Enter Branch Title" id="wpowt-branch" name="wpowt_branch">
                    </div>
                    <button type="submit" class="btn btn-primary wpowt-lib-btn"><i class="mdi mdi-check-outline"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="wpowt-view-all-branch-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Showing all Branches...</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($params['branches']) && count($params['branches']) > 0) {
                            $branch_count = 1;
                            foreach ($params['branches'] as $index => $branch) {
                                ?>
                                <tr class="warning wpowt-branch-tr-row">
                                    <td><?php echo $branch_count++; ?></td>
                                    <td class="wpowt-branch-edit-name"><?php echo $branch->name; ?></td>
                                    <td><?php echo $branch->status == 1 ? '<i>Active</i>' : '<i>Inactive</i>'; ?></td>
                                    <td class="wpowt-branch-btns">
                                        <div class="wpowt-branch-action-btns">
                                            <a href="Javascript:;" class="btn btn-info wpowt-edit-name wpowt-lib-btn"><i class="mdi mdi-pencil"></i></a>
                                            <a href="Javascript:;" class="btn btn-danger wpowt-delete-branch wpowt-lib-btn" data-id="<?php echo $branch->id; ?>"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </div>
                                        <div class="wpowt-branch-save-btn" style="display: none;">
                                            <a href="Javascript:;" class="btn btn-info wpowt-save-branch wpowt-lib-btn" data-branch="<?php echo $branch->name; ?>" data-id="<?php echo $branch->id; ?>"><i class="mdi mdi-check-outline"></i> Save</a>
                                            <a href="Javascript:;" class="btn btn-danger wpowt-cancel-update wpowt-lib-btn"><i class="mdi mdi-close"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>