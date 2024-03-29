<div class="container">
    <div class="row owt-inner-row owt-lib-breadcrumb-top">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-manage">Library Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Book Issue</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row owt-inner-row">
        <div class="panel panel-primary">
            <div class="panel-heading wpowt-lib-bg">
                List of Book Return by Student
                <a href="admin.php?page=owt-lib-book-issue-list" class="btn btn-danger pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Go to Issue Book Page</a>
                <a href="admin.php?page=owt-lib-create-book-return" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Return a Book</a>
                <a href="admin.php?page=owt-lib-staff-book-return" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Return Book by Staff</a>
            </div>
            <div class="panel-body">
                <table id="owt-tbl-book-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Book</th>
                            <th>Category</th>
                            <th>Issue(Y-m-d)</th>
                            <th>Return(Y-m-d)</th>
                            <th>Fine Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($params['book_returns']) && count($params['book_returns']) > 0) {

                            foreach ($params['book_returns'] as $index => $bk_return) {
                                $email = !empty($bk_return['email']) ? $bk_return['email'] : '<i>-- No email --</i>';
                                $phone = !empty($bk_return['phone']) ? $bk_return['phone'] : '<i>-- No phone --</i>';
                                ?>
                                <tr>
                                    <td><?php echo $bk_return['id']; ?></td>
                                    <td><?php echo $bk_return['name']; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td><?php echo $bk_return['book_name']; ?></td>
                                    <td><?php echo $bk_return['cat_name']; ?></td>
                                    <td><?php echo $bk_return['issued_date']; ?></td>
                                    <td><?php echo $bk_return['returned_date']; ?></td>
                                    <td>
                                        <?php
                                        if ($bk_return['fine_status']) {
                                            ?>
                                            <a href="Javascript:;" data-id="<?php echo $bk_return['return_id']; ?>" class="btn btn-danger wpowt-lib-fine-modal wpowt-lib-btn"><i class="mdi mdi-eye-outline"></i> View fine details</a>
                                            <?php
                                        } else {
                                            echo '<i>-- No fine --</i>';
                                        }
                                        ?>
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

<div id="wpowt-fine-details-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fine details...</h4>
            </div>
            <div class="modal-body">
                <p><i>Note*: Fine payment will be done by <b>Cash Payment</b>. If User submitted, please <b>Mark Paid</b> for paid.</i></p>
                <form class="form-horizontal" action="Javascript:;" method="post" id="wpowt-lib-pay-fine">
                    <input type="hidden" id="wpowt-lib-return-id" name="wpowt_lib_return_id"/>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Extra days:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly="" class="form-control" id="wpowt-txt-extra-days">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Per day fine (<?php echo OWT_LIBRARY_PLUGIN_BOOK_CURRENCY; ?>):</label>
                        <div class="col-sm-8">
                            <input type="text" readonly="" class="form-control" value="<?php echo OWT_LIBRARY_PLUGIN_BOOK_LATE_FINE; ?>" id="wpowt-txt-per-day-fine">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Total fine amount (<?php echo OWT_LIBRARY_PLUGIN_BOOK_CURRENCY; ?>):</label>
                        <div class="col-sm-8">
                            <input type="text" readonly="" class="form-control" id="wpowt-txt-total-fine">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-success wpowt-lib-btn"><i class="mdi mdi-check-outline"></i> Mark Paid</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
