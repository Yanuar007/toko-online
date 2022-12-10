<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Detail Produck</h2>
    <div style="width: 120px;height: 5px;background-color: #3352FF;" class="line-dec"></div>
    <div style="padding: 0px 22px;border-radius: 1.3rem;min-height: 50vh;min-width: 0px;flex: 1 1 0%;--tw-bg-opacity: 1;background-color: rgb(var(--color-slate-100) / var(--tw-bg-opacity));"
        class="container-fluid">
        <div style="flex: 1 1 auto;min-height: 1px;padding: 1.25rem;" class="card-body">

            <?php foreach($product as $row): ?>
            <div style="display: flex;flex-wrap: wrap;margin-right: -0.75rem;margin-left: -0.75rem;" class="row">
                <div style="flex: 0 0 33.33333%;max-width: 33.33333%;" class="col-md-4">
                    <img src="<?php echo base_url().'/uploads/'.$row->gambar ?>" class="card-img-top">
                </div>
                <div style="lex: 0 0 66.66667%;max-width: 66.66667%;margin-left:5rem;" class="col-md-8">
                    <table style="width: 100%;margin-bottom: 1rem;color: #858796;" class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?php echo $row->nama_brg ?></strong></td>
                        </tr>

                        <tr>
                            <td>Descripsi</td>
                            <td><strong><?php echo $row->keterangan ?></strong></td>
                        </tr>

                        <tr>
                            <td>kategori</td>
                            <td><strong><?php echo $row->kategori ?></strong></td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <td><strong><?php echo $row->stok ?></strong></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <div class="btn btn-sm btn-success">Rp.
                                        <?php echo number_format($row->harga,0,',','.') ?></div>
                                </strong></td>
                        </tr>

                    </table>

                    <?php echo anchor('dashboard/cart/' .$row->id_brg, '<div class="btn btn-sm btn-primary">Tambah Ke Keranjang</div>') ?>
                    <?php echo anchor('dashboard/index/' .$row->id_brg, '<div class="btn btn-sm btn-danger">Kembali</div>') ?>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="container-fluid">
            <h2 class="intro-y text-lg font-medium mt-10">
                Ulasan Product</h2>
            <div style="width: 123px;height:5px;background-color: #3352FF;" class="line-dec"></div>
        </div>
    </div>
</div>