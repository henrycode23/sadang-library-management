<div class="container">
    <div class="row owt-inner-row owt-lib-breadcrumb-top">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-manage">Library Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-book-issue-list">Book Issue List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Issue a Book</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row owt-inner-row">
        <div class="panel panel-primary">
            <div class="panel-heading wpowt-lib-bg">
                Issue a Book
                <a href="admin.php?page=owt-lib-book-issue-list" class="btn btn-danger pull-right owt-btn-right owt-btn-top wpowt-lib-btn"><i class="mdi mdi-arrow-left-bold-circle-outline"></i> Back</a>
            </div>
            <div class="panel-body">
                <form action="javascript:void(0)" id="wpowt-frm-book-issue" method="post">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="dd-category">Issue Date (y-m-d)</label>
                            <input type="text" readonly="" value="<?php echo date("Y-m-d"); ?>" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="dd-category">Book Category*</label>
                            <select class="form-control" id="wpowt-dd-category" name="txt_category">
                                <option value="-1">Choose category</option>
                                <?php
                                foreach ($params['categories'] as $index => $category) {
                                    ?>
                                    <option value="<?php echo $category->id ?>"><?php echo $category->name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dd-book-id">Select Book*</label>
                            <select class="form-control" id="wpowt-dd-books" name="dd_book">
                                <option value="-1">Choose book</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dd-category">For how many days?</label>
                            <input type="number" max="30" required="" min="3" name="txt_days_count" placeholder="Issue days" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="dd-user-type-id">User Type*</label>
                            <select class="form-control" id="wpowt-dd-types" name="dd_user_type_id">
                                <option value="-1">Choose type</option>
                                <?php
                                foreach ($params['staff_types'] as $index => $staff_type) {
                                    ?>
                                    <option value="<?php echo $staff_type->id ?>"><?php echo ucfirst($staff_type->type); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="wpowt-lib-student-section" style="display: none;">
                            <div class="form-group wpowt-lib-dd-branch">
                                <label for="dd-student-branch-id">Select Branch*</label>
                                <select class="form-control" id="wpowt-student-branch-dd" name="dd_st_branch_id">
                                    <option value="-1">Choose branch</option>
                                    <?php
                                    foreach ($params['branches'] as $index => $branch) {
                                        ?>
                                        <option value="<?php echo $branch->id ?>"><?php echo ucfirst($branch->name); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group wpowt-lib-dd-student-list" style="display: none;">
                                <label for="dd-student-id">Select Student*</label>
                                <select class="form-control" id="wpowt-students-dd-list" name="dd_student_id">
                                    <option value="-1">Choose student</option>
                                </select>
                            </div>
                        </div>

                        <div class="wpowt-lib-staff-section" style="display: none;">
                            <div class="form-group">
                                <label for="dd-staff-id">Select Staff*</label>
                                <select class="form-control" id="wpowt-lib-stafflist" name="dd_staff_id">
                                    <option value="-1">Choose staff</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group"> 
                        <input type="hidden" id="wpowt-hidden-type" name="wpowt_hidden_type"/>
                        <div class="col-sm-12 owt-text-align">
                            <button type="submit" class="btn btn-success wpowt-lib-btn"><i class="mdi mdi-check-outline"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>


