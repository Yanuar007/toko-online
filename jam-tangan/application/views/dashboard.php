<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Product List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">


            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <?php echo form_open('dashboard/search') ?>
                <input type="text" name="kata_kunci" class="form-control w-56 box pr-10" placeholder="Search...">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        <?php foreach ($product as $row) : ?>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box">
                <div class="p-5">
                    <div
                        class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                        <img alt="Midone - HTML Admin Template" class="rounded-md"
                            src="<?= base_url() . '/uploads/' . $row->gambar ?>">
                        <span
                            class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Featured</span>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
                                class="block font-medium text-base"><?= $row->nama_brg ?></a> <span
                                class="text-white/90 text-xs mt-3"><?= $row->kategori ?></span> </div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                        <div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Price: IDR
                            <?= number_format($row->harga, 0, ',', '.') ?> </div>
                        <div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i> Remaining
                            Stock: <?= number_format($row->stok, 0, ',', '.') ?> </div>
                        <div class="flex items-center mt-2"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i>
                            Status: Active </div>
                    </div>
                </div>
                <div class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60">
                    <a class="flex items-center btn btn-sm btn-primary mr-3"
                        href="<?= site_url('dashboard/cart/' . $row->id_brg) ?>"> <i data-lucide="shopping-cart"
                            class="w-4 h-4 mr-1"></i> add to cart </a>
                    <a class="flex items-center btn btn-sm btn-success mr-3"
                        href="<?= site_url('dashboard/detail/' . $row->id_brg) ?>"> <i data-lucide="alert-circle"
                            class="w-4 h-4 mr-1"></i> Detail </a>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- END: Users Layout -->
    </div>
</div>