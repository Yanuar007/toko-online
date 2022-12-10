<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        History Pembayaran
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500">
                    <input type="text" class="form-control w-48 box pr-10" placeholder="Search by invoice...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
                <select class="form-select box ml-2">
                    <option hidden>Status</option>
                    <option>Pending</option>
                    <option>Paid</option>
                </select>
                <button class="btn btn-sm btn-primary ml-2">Search</button>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">
                            <input class="form-check-input" type="checkbox">
                        </th>
                        <th class="whitespace-nowrap">ID PESANAN</th>
                        <th class="whitespace-nowrap">TRACKING NUMBER</th>
                        <th class="whitespace-nowrap">METODE PEMBAYARAN</th>
                        <th class="whitespace-nowrap">WAKTU TRANSAKSI</th>
                        <th class="whitespace-nowrap">TRANSAKSI SELESAI</th>
                        <th class="whitespace-nowrap">STATUS</th>
                        <th class="whitespace-nowrap">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bill as $row) : ?>
                        <tr class="intro-x">
                            <td class="w-10">
                                <input class="form-check-input" type="checkbox">
                            </td>
                            <td class="w-40 !py-4"> <a href="<?= site_url('bill/detail/' . $row->order_id) ?>" class="underline decoration-dotted whitespace-nowrap">#<?= $row->order_id ?></a> </td>
                            <td class="w-40 !py-4"> <a class="underline decoration-dotted whitespace-nowrap"><?= $row->tracking_id ?></a> </td>
                            <td class="w-40">
                                <a href="" class="font-medium text-primary whitespace-nowrap"><?= $row->payment_method ?></a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap"><?= $row->transaction_time ?></a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap"><?= $row->payment_limit ?></a>
                            </td>
                            <td>
                                <div class="flex items-center whitespace-nowrap text-success"> Paid </div>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-rounded-success text-white">Verified</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>