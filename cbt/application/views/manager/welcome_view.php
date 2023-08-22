<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/animate.css-master/animate.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">
</head>



<div class="container ">
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    
    
    <div class="container animated fadeInLeft">
		
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
                  <?php echo form_open('welcome/login','id="form-login" class="form-horizontal"')?>
                  <div class="box-body">
						<div id="form-pesan">
						</div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
		      			<input type="text" id="username" name="username" class="form-control rounded-left" placeholder="username" required>
		      		</div>		      		</div>

	            <div class="form-group d-flex">
                <label class="col-sm-4 control-label">Password</label>
                <div class="col-sm-8">
	              <input type="password" id="password" name="password" class="form-control rounded-left" placeholder="password" required>
	            </div>
                </div>

	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
</section><!-- /.content -->
</div>

    <div class="modal" id="modal-proses" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
                    Data Sedang diproses...
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<script type="text/javascript">
    $(function () {
        $('#username').focus();   
        
        $('#btn-login').click(function(){
            $('#form-login').submit();
        });
        
        $('#form-login').submit(function(){
            $("#modal-proses").modal('show');
                $.ajax({
                    url:"<?php echo site_url(); ?>/manager/welcome/login",
     			    type:"POST",
     			    data:$('#form-login').serialize(),
     			    cache: false,
      		        success:function(respon){
         		    	var obj = $.parseJSON(respon);
      		            if(obj.status==1){
      		                window.open("<?php echo site_url(); ?>/manager/dashboard","_self");
          		        }else{
                            $('#form-pesan').html(pesan_err(obj.error));
                            $("#modal-proses").modal('hide');
          		        }
         			}
      		});
            
      		return false;
        });    
    });
    
</script>

  <script src="<?php echo base_url(); ?>assets/login/js/popper.js"></script>
