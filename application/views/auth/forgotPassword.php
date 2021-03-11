   <div class="container">

       <!-- Outer Row -->
       <div class="row justify-content-center">

           <div class="col-xl-10 col-lg-12 col-md-9">

               <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto registrasi">
                   <div class="card-body p-0">
                       <!-- Nested Row within Card Body -->
                       <div class="row">
                           <div class="col-lg">
                               <div class="p-5">
                                   <div class="text-center">
                                       <h1 class="h4 900 mb-4 text-white">Forgot Your password?</h1>
                                   </div>

                                   <?= $this->session->flashdata('message'); ?>
                                   <form class="user" method="POST" action="<?= base_url('auth/forgotpassword'); ?> ">
                                       <div class="form-group">
                                           <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                           <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                       </div>
                                       <button type="submit" class="btn btn-reset btn-user btn-block">
                                           Reset Password
                                       </button>
                                   </form>
                                   <hr class="bg-white">
                                   <div class="text-center">
                                       <a class="small text-white" href="<?= base_url('auth') ?> ">Back to login!</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>

   </div>