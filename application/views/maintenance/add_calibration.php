<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if ($this->session->flashdata('msg' )): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <div class="col-xs-12">
                <div class="box col-sm-12">
                    <div class="box-header" >
                        <h3 class="box-title">Add calibration</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form id="calibration" class="form-horizontal"  action="<?php echo base_url()?>Maintenance/save_calibration" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Vehicle</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="vehicle" selected="selected" required>
                                        <option value="">Select Options</option>
                                        <?php  if(!empty($vehicle)){
                                            foreach ($vehicle as $c){ ?>
                                                <option value="<?php  echo  $c["id"];?>"   >
                                                    <?php  echo  $c["heading"];?>
                                                </option>
                                            <?php }} ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">calibration Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="calibration" type="text" class="form-control"  required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Issue Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="start_date" type="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Expiry Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="end_date" type="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Notification Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="notification_date" type="date" class="form-control" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Scan Documents
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="image" type="file" class="form-control"  multiple>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Fee<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="fee" type="text" class="form-control" '>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Remarks<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="remarks" type="text" class="form-control" '>
                                </div>
                            </div>

                            <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
                                <input type="submit" value="Add" class="btn btn-primary" >
                                <input type="reset" value="Reset" class="btn btn-success" >
                                <a class="btn btn-danger" href="<?php echo base_url() ?>maintenance/view_calibration">Cancel</a>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</section>


<script type="text/javascript">
    $(document).ready(function() {
        $('#calibration')
            .on('init.form.bv', function(e, data) {
                //console.log(data);
            })
            .bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    calibration: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Field is required'
                            },
                            regexp: {
                                regexp: /([A-Za-z0-9\-\_]+)/,
                                message: 'The full name can consist of alphabetical characters, Numbers and Dashes only'
                            }
                        }
                    },

                    remarks: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Field is required'
                            },
                            regexp: {
                                regexp: /^[a-z\s]+$/i,
                                message: 'The full name can consist of alphabetical characters and spaces only'
                            }
                        }
                    },

                    fee: {
                        trigger:'blur',
                        validators: {
                            notEmpty: {
                                message: 'The Field is required'
                            },
                            integer: {
                                message: 'The value is not an integer'
                            }
                        }
                    }



                }
            });
    });



</script>