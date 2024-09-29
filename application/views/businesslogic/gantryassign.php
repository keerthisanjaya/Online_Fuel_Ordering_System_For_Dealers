<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <form action="<?php echo base_url('gantry/fuel/'.$orderid.''); ?>" method="post">
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
            <button name="submit" type="submit" class="btn btn-primary">Select to Fuel</button>
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
      <form action="<?php echo base_url('gantry/fuel/complete'); ?>" method="post">
        <input type="hidden" name="idorderitems" value="<?php echo $ordertable[0]->idorderitems; ?>">
        <div class="form-group row">
          <label for="invnumber" class="col-4 col-form-label">Invoice number</label> 
          <div class="col-8">            
            <input id="invnumber" name="invnumber" type="text" class="form-control" value="<?php echo $bouserassign[0]->invnum; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="sealnumber" class="col-4 col-form-label">Seal Number</label> 
          <div class="col-8">            
            <input id="sealnumber" name="sealnumber" type="text" class="form-control" value="<?php echo $bouserassign[0]->sealnumber; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="Bourser" class="col-4 col-form-label">Bourse Assign</label> 
          <div class="col-8">
            <input type="text" class="form-control" value="<?php echo $vehicles[0]->vehicle_number; ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="driveravailable" class="col-4 col-form-label">Driver Assigned</label> 
          <div class="col-8">
            <input type="text" class="form-control" value="<?php echo $drivers[0]->epf; ?>" readonly>
          </div>
        </div> 
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Gantry Filling Completed</button>
          </div>
        </div>
      </form>      
    </div>
  </div>
</div>
<?php } ?>