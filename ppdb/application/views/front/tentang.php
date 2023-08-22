<div class="col-lg-8">
    <div class="card card-teal">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-file-user"></i> TENTANG KAMI</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?php echo base_url(); ?>portal/cek_pengumuman" method="post" enctype="multipart/form-data">
            <div class="card-body">

                <?php
                if (!empty($tentang)) {
                    echo nl2br($tentang);
                }
                ?>
            </div>

            <!-- /.card-body -->
        </form>
    </div>

</div>