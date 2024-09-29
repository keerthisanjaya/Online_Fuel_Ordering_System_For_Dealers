<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <form action="<?php echo base_url('orders/assign/toorder/'.$orderid.''); ?>" method="post">
        <div class="form-group row">
          <label for="invnumber" class="col-4 col-form-label">Invoice number</label> 
          <div class="col-8">            
            <input id="invnumber" name="invnumber" type="text" class="form-control" value="<?php echo $ordertable[0]->invoicenum; ?>" readonly="">
          </div>
        </div>

        <div class="form-group row">
           <label for="materialname" class="col-4 col-form-label">Material name</label> 
          <div class="col-8">
            <select  id="materialname" name="materialname" type="text" class="form-control">
              <?php foreach($ordertable as $order){ ?>
                <option value="<?php echo $order->idorderitems; ?>"><?php echo $order->itemname." | ".$order->qty." Litre"; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
         
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Show All Available Bousers & Drivers</button>
          </div>
        </div>
      </form>      
    </div>
  </div>
</div>

<?php if(isset($materialname)==true){ ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <form action="<?php echo base_url('orders/assign/driver'); ?>" method="post">
        <div class="form-group row">
          <label for="invnumber" class="col-4 col-form-label">Invoice number</label> 
          <div class="col-8">            
            <input id="invnumber" name="invnumber" type="text" class="form-control" value="<?php echo $ordertable[0]->invoicenum; ?>" readonly="">
          </div>
        </div>


        <input type="hidden" name="orderitemid" value="<?php echo $orderid; ?>">

        <div class="form-group row">
          <label for="Bourser" class="col-4 col-form-label">Bourse Available</label> 
          <div class="col-8">
            <select id="Bourser" name="Bourser" class="form-control">
              <?php foreach($vehicles as $vehicle){ ?>
                <option value="<?php echo $vehicle->idvehicle; ?>"><?php echo $vehicle->vehicle_number." | ".$vehicle->vehicle_capacity; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="driveravailable" class="col-4 col-form-label">Driver available</label> 
          <div class="col-8">
            <select id="driveravailable" name="driveravailable" class="form-control">
              <?php foreach($drivers as $driver){ ?>
                <option value="<?php echo $driver->idemployee; ?>"><?php echo $driver->epf; ?></option>
              <?php } ?>
            </select>
          </div>
        </div> 
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Assign Driver</button>
          </div>
        </div>
      </form>      
    </div>
  </div>
</div>
<?php } ?>




