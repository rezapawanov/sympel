<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $judul; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-book"></i> Laporan</a></li>
            <li class="active"><?php echo $judul; ?></li>
        </ol>
    </section>
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>laporan/buku_excel" target="_blank"><i class="fa fa-download"> </i> Export Excel</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Lokasi Penyimpanan</th>
                                    <th>Jumlah Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($buku->result_array() as $data) { ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['kode_buku']; ?></td>
                                    <td><?php echo $data['judul_buku']; ?></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['lokasi']; ?></td>
                                    <td><?php echo $data['jumlah_buku']; ?></td>
                                   
                                </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

