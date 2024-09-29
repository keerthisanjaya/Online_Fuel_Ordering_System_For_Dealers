<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">

        <!-- error message start-->
                  <?php if ($this->session->flashdata('message')) { ?>
                	<div class="row col-md-12 row justify-content-center mt-3" >
                		<div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
                			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                			<strong>Successfull:</strong> <?php echo $this->session->flashdata('message'); ?>
                		</div>
                		</div>
            	<?php } ?>

            	<?php if ($this->session->flashdata('error')) { ?>
            	<div class="row col-md-12 row justify-content-center mt-3" >
            	
            		<div class="alert alert-danger alert-dismissible fade show col-md-4" role="alert">
            			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            			<strong>Failed!</strong> <?php echo $this->session->flashdata('error'); ?>
            		</div>
            		</div>
            	<?php } ?>
		<!-- error message end--> 

        <h5 class="card-header">Mark Dip</h5>

        <hr class="my-0">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url(); ?>index.php/dailydip/markdip/save">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="iddailydip" name="iddailydip" class="form-control"
                            placeholder="Iddailydip" maxlength="11" required>

                        <div class="form-group mb-3">
                            <label for="petrol" class="form-label">Petrol:</label>
                            <input type="number" id="petrol" name="petrol" class="form-control" placeholder="Petrol"
                                minlength="0" maxlength="11">
                        </div>

                        <div class="form-group mb-3">
                            <label for="diesel" class="form-label">Diesel:</label>
                            <input type="number" id="diesel" name="diesel" class="form-control" placeholder="Diesel"
                                minlength="0" maxlength="11">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="superdiesel" class="form-label">Superdiesel:</label>
                            <input type="number" id="superdiesel" name="superdiesel" class="form-control"
                                placeholder="Superdiesel" minlength="0" maxlength="11">
                        </div>

                        <div class="form-group mb-3">
                            <label for="superpetrol" class="form-label">Superpetrol:</label>
                            <input type="number" id="superpetrol" name="superpetrol" class="form-control"
                                placeholder="Superpetrol" minlength="0" maxlength="11">
                        </div>

                        <div class="form-group mb-3">
                            <label for="fillingstation_idfillingstation" class="form-label">Filling station: <span class="text-danger">*</span></label>
                            <select id="fillingstation_idfillingstation" name="fillingstation_idfillingstation"
                                class="form-select" required>
                                <?php foreach($fillingstations as $data){ ?>
                                    <option value="<?php echo $data->idfillingstation; ?>"><?php echo $data->fillingstation_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save</button>
                    <a href="<?php echo base_url('dailydip'); ?>" class="btn btn-secondary">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
</script>