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
                Book Issued to Student
                <a href="admin.php?page=owt-lib-return-book-list" class="btn btn-danger pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Go to Return Book List</a>
                <a href="admin.php?page=owt-lib-create-book-issue" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Issue a Book</a>
                <a href="admin.php?page=owt-lib-staff-book-issue" class="btn btn-info pull-right owt-btn-right owt-btn-top wpowt-lib-btn">Book Issued to Staff</a>
            </div>
            <div class="panel-body">

                <table id="owt-tbl-book-list" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Issue ID</th>
                            <th>Class/Branch</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Book</th>
                            <th>Category</th>
                            <th>Days Count</th>
                            <th>Issued</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($params['issues']) && count($params['issues']) > 0) {
                            $count = 1;
                            foreach ($params['issues'] as $index => $issue) {
                                if (empty($issue['email'])) {
                                    $email = "<i>-- No email --</i>";
                                } else {
                                    $email = $issue['email'];
                                }
                                ?>
                                <tr>
                                    <td><?php echo $issue['issue_id']; ?></td>
                                    <td><?php echo ucfirst($issue['branch']); ?></td>
                                    <td><?php echo $issue['user_id']; ?></td>
                                    <td><?php echo $issue['name']; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo ucwords($issue['book']); ?></td>
                                    <td><?php echo ucwords($issue['category']); ?></td>
                                    <td><?php echo $issue['count_days']; ?></td>
                                    <td><?php echo $issue['created']; ?></td>
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
