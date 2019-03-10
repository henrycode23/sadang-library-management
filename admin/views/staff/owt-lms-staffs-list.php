<div class="container">
    <div class="row owt-inner-row owt-lib-breadcrumb-top">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-manage">Library Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Staff</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row owt-inner-row">
        <div class="panel panel-primary">
            <div class="panel-heading wpowt-lib-bg">
                Staff List
                <a href="admin.php?page=owt-lib-create-staff" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Add Teacher/Staff</a>
                <a href="Javascript:Void(0)" data-toggle="modal" data-target="#wpowt-staff-type-modal" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn"> Add Staff Type</a>
                <a href="Javascript:Void(0)" data-toggle="modal" data-target="#wpowt-view-all-stafftype-modal" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">View All Staff Type</a>
            </div>
            <div class="panel-body">
                <table id="owt-tbl-book-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Type</th>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($params['staffs']) && count($params['staffs']) > 0) {
                            $staff_count = 1;
                            foreach ($params['staffs'] as $index => $staff) {
                                ?>
                                <tr>
                                    <td><?php echo $staff_count++; ?></td>
                                    <td><?php echo ucwords($this->owt_library_get_usertype_info($staff->staff_type_id)); ?></td>
                                    <td><?php echo $staff->staff_id; ?></td>
                                    <td><?php echo $staff->name; ?></td>
                                    <td><?php echo $staff->email; ?></td>
                                    <td><?php echo $staff->phone_no; ?></td>
                                    <td>
                                        <a href="admin.php?page=owt-lib-create-staff&action=edit&stfid=<?php echo $staff->id ?>" class='btn btn-info wpowt-lib-btn'><i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript:void(0)" class='btn btn-danger wpowt-lib-del-staff wpowt-lib-btn' data-id="<?php echo $staff->id; ?>"><i class="mdi mdi-trash-can-outline"></i></a>
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

<!-- Modal -->
<div id="wpowt-staff-type-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adding Staff type...</h4>
            </div>
            <div class="modal-body">
                <form action="Javascript:Void(0)" id="wpowt-frm-add-type" method="post">
                    <div class="form-group">
                        <label for="txtbranch">Staff Type</label>
                        <input type="text" required="" class="form-control" placeholder="Enter Staff Title" id="wpowt-type" name="wpowt_type">
                    </div>
                    <button type="submit" class="btn btn-primary wpowt-lib-btn"> <i class="mdi mdi-check-outline"></i> Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>

<div id="wpowt-view-all-stafftype-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Showing all Staff Types...</h4>
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
                        if (isset($params['staff_types']) && count($params['staff_types']) > 0) {
                            $staff_count = 1;
                            foreach ($params['staff_types'] as $index => $type) {
                                ?>
                                <tr class="warning wpowt-stafftypes-tr-row">
                                    <td><?php echo $staff_count++; ?></td>
                                    <td class="wpowt-stafftypes-edit-name"><?php echo $type->type; ?></td>
                                    <td><?php echo $type->status == 1 ? '<i>Active</i>' : '<i>Inactive</i>'; ?></td>
                                    <td class="wpowt-stafftypes-btns">
                                        <div class="wpowt-stafftypes-action-btns">
                                            <a href="Javascript:;" class="btn btn-info wpowt-edit-staff-name wpowt-lib-btn"><i class="mdi mdi-pencil"></i></a>
                                            <a href="Javascript:;" class="btn btn-danger wpowt-delete-staff wpowt-lib-btn" data-id="<?php echo $type->id; ?>"><i class="mdi mdi-trash-can-outline"></i></a>
                                        </div>
                                        <div class="wpowt-stafftypes-save-btn" style="display: none;">
                                            <a href="Javascript:;" class="btn btn-info wpowt-save-stafftypes wpowt-lib-btn" data-type="<?php echo $type->type; ?>" data-id="<?php echo $type->id; ?>"><i class="mdi mdi-check-outline"></i> Save</a>
                                            <a href="Javascript:;" class="btn btn-danger wpowt-cancel-stafftypes-update wpowt-lib-btn"><i class="mdi mdi-close"></i></a>
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