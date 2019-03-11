<div class="container">
    <div class="row owt-inner-row owt-lib-breadcrumb-top">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php?page=owt-lib-manage">Library Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Settings</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row owt-inner-row">
        <div class="panel panel-primary">
            <div class="panel-heading wpowt-lib-bg">
                Settings Panel
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="Javascript:;" id="wpowt-frm-settings-panel" method="post">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dd-country">Country*</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="dd-country" name="txt_country">
                                <option value="-1">Select country</option>
                                <?php
                                if (isset($params['countries'])) {

                                    if (count($params['countries']) > 0) {

                                        $saved_country = get_option('owt_lib_country_setup');

                                        foreach ($params['countries'] as $country) {
                                            $selected = '';
                                            if ($country->id == $saved_country) {
                                                $selected = 'selected="selected"';
                                            }
                                            ?>
                                            <option value="<?php echo $country->id ?>" <?php echo $selected; ?>><?php echo $country->name ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dd-currency">Currency Code*</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="dd-currency" name="txt_currency">
                                <option value="-1">Select currency</option>
                                <?php
                                if (isset($params['currencies'])) {

                                    if (count($params['currencies']) > 0) {

                                        $saved_currency = get_option('owt_lib_currency_code');

                                        foreach ($params['currencies'] as $country) {
                                            $selected = '';
                                            if ($country->currency_code == $saved_currency) {
                                                $selected = 'selected="selected"';
                                            }
                                            ?>
                                            <option value="<?php echo $country->currency_code ?>" <?php echo $selected; ?>><?php echo $country->country . " ( " . $country->currency_code . ")"; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt-amount">Late Fine Amount Per day (Book Return):</label>
                        <div class="col-sm-4">
                            <input type="number" value="<?php echo get_option('owt_lib_book_late_fine'); ?>" required="" min="1" max="100" class="form-control" id="txt-amount" name="txt_amount" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default wpowt-lib-btn"><i class="mdi mdi-check-outline"></i> Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // ob_start();
    // include_once OWT_LIBRARY_PLUGIN_DIR_PATH . 'admin/views/report/owt-lib-contact-details.php';
    // $template = ob_get_contents();
    // ob_end_clean();
    // echo $template;
    ?>
</div>