 <div class="col-sm-12"> <!-- menampilkan form add event-->
				<section class="panel">
                    <div class="panel-body">

                        <a class="btn btn-compose" title="Change Password">Change Password</a>
                        <div class="box-body"	>
             
                      <div class="form-group">
                     
                        <form class="form-horizontal style-form" role="form" action="act/pass_change.php" method="post">
						<input type="text" class="form-control hidden" name="user" value="<?php echo $_SESSION['username'] ?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="passlama"><span style="color:red">*</span> Old Password</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" name="passlama" value="" placeholder="*****" required>
        </div>
        </div> 
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="passbaru"><span style="color:red">*</span> New Password</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" name="passbaru" value="" placeholder="*****" required>
        </div>
        </div> 
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="konfirm"><span style="color:red">*</span> Password Confirmation</label>
          <div class="col-sm-10">
          <input type="password" class="form-control" name="konfirm" value="" placeholder="*****" required>
        </div>
        </div> 
        <button type="submit" class="btn btn-primary pull-right" title="Change" onclick="show1()">Save <i class="fa fa-floppy-o"></i></button>  
</form>

                      </div>                   
                  </div>
                    </div>
                </section>
                 </div>