<div class="container">
            <div class="row">
        <form action="<?php echo base_url('assignbowser/save'); ?>" method="post">
        <div class="form-group row">
            <label for="invoicenum" class="col-4 col-form-label">Invoice Num</label> 
            <div class="col-8">
            <input id="invoicenum" name="invnum" type="text" class="form-control" value="<?php echo $orderdata[0]->invoicenum ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="fuelstationname" class="col-4 col-form-label">Fuelstation Name</label> 
            <div class="col-8">
            <input id="fuelstationname" name="fuelstationname" type="text" class="form-control" value="<?php echo $orderdata[0]->fillingstation_name ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="vehiclenum" class="col-4 col-form-label">Vehicle Number</label> 
            <div class="col-8">
            <select id="vehiclenum" name="vehiclenum" class="form-control">
                <?php foreach($vehicledata as $vehicle){ ?>
                    <option value="<?php echo $vehicle->vehicle_number; ?>"><?php echo $vehicle->vehicle_number; ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="driver" class="col-4 col-form-label">Driver</label> 
            <div class="col-8">
            <select id="driver" class="form-control" name="drivernum">
                <?php foreach($driverdata as $driver){ ?>
                    <option value="<?php echo $driver->epf; ?>"><?php echo $driver->epf; ?></option>
                <?php } ?>
            </select>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>