<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weekly Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" as="style" crossorigin="anonymous">
    <style>
        .loader {
            font-size: 20px;
            position: fixed;
            width: 4em;
            height: 1em;
            margin: 100px auto;
        }

        .dot {
            width: 0.8em;
            height: 0.8em;
            border-radius: 0.5em;
            background: rgb(104, 104, 104);
            position: absolute;
            animation-duration: 0.8s;
            animation-timing-function: ease;
            animation-iteration-count: infinite;
        }

        .dot1,
        .dot2 {
            left: 0;
        }

        .dot3 {
            left: 1.5em;
        }

        .dot4 {
            left: 3em;
        }

        @keyframes reveal {
            from {
                transform: scale(0.001);
            }

            to {
                transform: scale(1);
            }
        }

        @keyframes slide {
            to {
                transform: translateX(1.5em)
            }
        }


        .dot1 {
            animation-name: reveal;
        }

        .dot2,
        .dot3 {
            animation-name: slide;
        }

        .dot4 {
            animation-name: reveal;
            animation-direction: reverse;
            /* thx @HugoGiraudel */
        }

        #preloader {
            position: fixed;
            inset: 0;
            z-index: 999999;
            overflow: hidden;
            background: #373b3f;
            transition: all 0.6s ease-out;
        }


        @keyframes loader {

            0% {
                width: 0;
            }

            20% {
                width: 10%;
            }

            25% {
                width: 24%;
            }

            43% {
                width: 41%;
            }

            56% {
                width: 50%;
            }

            66% {
                width: 52%;
            }

            71% {
                width: 60%;
            }

            75% {
                width: 76%;

            }

            94% {
                width: 86%;
            }

            100% {
                width: 100%;
            }

        }
    </style>
</head>

<body>
    <div class="py-1 grid grid-cols-1 items-center md:grid-cols-1 md:gap-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="navbar bg-base-100 shadow flex flex-col md:flex-row justify-between">
            <h1 class="md:text-xl mb-1 sm:text-lg sm:leading-4 md:leading-5 lg:leading-6">
                <?php
                if ($filterTitle == 'all') {
                    echo 'Menampilkan Seluruh Laporan Mingguan BATS Consulting';
                } else {
                    echo "Menampilkan Laporan Mingguan BATS Consulting<br>
                    Pekan $filterTitle";
                }
                ?>
            </h1>
            <div class="flex justify-end items-start">
                <p class="mr-4">
                    <b><?= $user['employee_name'] ?></b><br>
                    <?= $user['position'] ?>
                </p>
                <div class="avatar">
                    <div class="w-[50px] rounded-full">
                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $user['image'] ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row lg:justify-between md:justify-between justify-center">
            <div class="flex my-2 lg:justify-start md:justify-start justify-center">
                <a href="<?= base_url('Employee') ?>" class="btn btn-outline btn-neutral btn-sm mr-1">Kembali</a>
                <button class="btn btn-outline btn-success btn-sm ml-1 actionBtn" type="button" data-id="add" value="add" id="addBtn">Tulis Laporan</button>
            </div>
            <div class="flex my-2 lg:justify-end md:justify-end justify-center">
                <label for="filter" class="mr-2 text-lg">Pekan&nbsp;:</label>
                <select id="filter" name="filter" class="select select-sm select-bordered w-full max-w-xs md:w-auto">
                    <option <?= $filter == 'all' ? 'selected' : '' ?> value="all">All</option>
                    <?php
                    $no = 1;
                    foreach ($weeks as $week) { ?>
                        <option <?= $filter == $week['start'] . " - " . $week['end'] ? 'selected' : '' ?> value="<?= $no++ == 1 ? null : $week['start'] . " - " . $week['end'] ?>"><?= date('d M Y', strtotime($week['start'])) . " - " . date('d M Y', strtotime($week['end'])) ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="overflow-auto lg:max-h-[79vh] md:max-h-[79vh] max-h-[75vh] shadow rounded">
            <table class="table table-zebra">
                <thead class="text-base">
                    <tr>
                        <th class="sticky top-0 z-50 bg-base-200">#</th>
                        <th class="sticky top-0 z-50 bg-base-200">Tanggal</th>
                        <th class="sticky top-0 z-50 bg-base-200">Nama</th>
                        <th class="sticky top-0 z-50 bg-base-200">Nama Klien</th>
                        <th class="sticky top-0 z-50 bg-base-200">Tim</th>
                        <th class="sticky top-0 z-50 bg-base-200">Jenis Pekerjaan</th>
                        <th class="sticky top-0 z-50 bg-base-200">Progres Pekerjaan</th>
                        <th class="sticky top-0 z-50 bg-base-200">Kendala</th>
                        <th class="sticky top-0 z-50 bg-base-200">Jadwal Meeting</th>
                        <th class="sticky top-0 z-50 bg-base-200">Target Penyelesaian</th>
                        <th class="sticky top-0 z-50 bg-base-200">Status</th>
                        <th class="sticky right-0 top-0 z-50 bg-base-200 text-center"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    if (count($report) > 0) {
                        $no = 1;
                        foreach ($report as $key => $value) {
                    ?>
                            <tr>
                                <th class="p-1 text-center"><?= $no++ ?></th>
                                <td><?= date('l, d F Y', strtotime($value['created_at'])) ?></td>
                                <td class="p-1">
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $value['image'] ?>" alt="Avatar Tailwind CSS Component" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold"><?= $value['employee_name'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-1">
                                    <?= $value['nama_klien'] ?>
                                </td>
                                <td class="p-1"><?= $value['tim'] ?></td>
                                <td class="p-1"><?= $value['jenis'] ?></td>
                                <td class="p-1"><?= $value['progres'] ?></td>
                                <td class="p-1"><?= $value['kendala'] ?></td>
                                <td class="p-1"><?= $value['jdwl_meet'] ? date('l, d F Y', strtotime($value['jdwl_meet'])) : '-' ?></td>
                                <td class="p-1"><?= $value['target'] ?></td>
                                <td class="text-nowrap p-1">
                                    <?php
                                    $status = [
                                        'On Progress' => 'badge-warning',
                                        'Pending' => 'badge-info',
                                        'Finished' => 'badge-success',
                                        'Fail' => 'badge-error text-white',
                                        'Repeat' => 'badge-neutral text-white',
                                    ];
                                    ?>
                                    <div class="badge <?= $status[$value['status']] ?> px-2 py-1"><?= $value['status'] ?></div>
                                </td>
                                <td class="sticky right-0 bg-base-<?= $no % 2 == 0 ? '100' : '200'; ?>">
                                    <?php
                                    if ($value['employee_id'] == $user['id']) { ?>
                                        <button type="button" value="edit" data-id="<?= $value['id'] ?>" class="btn btn-outline btn-info btn-xs m-1 actionBtn" id="editBtn"><i class="fas fa-edit"></i></button>
                                        <button type="button" value="delete" data-id="<?= $value['id'] ?>" class="btn btn-outline btn-error btn-xs m-1 actionBtn" id="deleteBtn"><i class="fas fa-trash"></i></button>
                                    <?php } ?>
                                </td>

                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="12" class="text-center text-xl">Belum Ada Laporan Pekan Ini!</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <dialog id="inputModal" class="modal">
            <div class="modal-box pt-6 pb-2 px-1 relative overflow-y-visible modal-bottom">
                <div class="mb-5">
                    <button id="closeModal" class="btn btn-sm btn-circle btn-ghost fixed right-3 top-2"><i class="fas fa-times"></i></button>
                    <h1 class="fixed left-5 top-3 text-xl" id="modalTitle"></h1>
                </div>
                <div class="relative max-h-[70vh] overflow-y-scroll px-5 py-3" id="formData">

                </div>
            </div>
            <form method="dialog" class="modal-backdrop cursor-default">
                <button class="cursor-default">close</button>
            </form>
        </dialog>

    </div>
    <div id="preloader" class="flex justify-center items-center">
        <img oncontextmenu="return false;" class="h-20 w-auto" src="<?= base_url() ?>assets/logobats.png" alt="">
        <div class="loader pt-24">
            <div class="dot dot1"></div>
            <div class="dot dot2"></div>
            <div class="dot dot3"></div>
            <div class="dot dot4"></div>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    const preloader = document.querySelector('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove();
        });
    }
    const filter = e => {
        const dateRangeString = e.target.value;
        // dateArray = dateRangeString.split(' - ');
        window.location = `<?= base_url('Employee/weeklyreport') ?>/${dateRangeString}`;
    }
    document.querySelector('#filter').addEventListener('change', filter);
    const modal = document.getElementById('inputModal'),
        actionBtn = document.querySelectorAll('.actionBtn'),
        closeModalBtn = document.getElementById('closeModal'),
        modalTitle = document.getElementById('modalTitle'),
        modalBackdrop = document.querySelector('.modal-backdrop'),
        formData = document.getElementById('formData');

    actionBtn.forEach(btn => {
        btn.addEventListener('click', async (e) => {
            const type = btn.value,
                oldtextcontent = btn.innerHTML;
            btn.disabled = true;
            btn.classList.add('cursor-not-allowed');
            btn.innerHTML = `<span class="loading loading-spinner"></span>`;
            let title = '';
            if (type == 'add') {
                title = 'Tulis Laporan Baru';
            } else if (type == 'edit') {
                title = 'Edit Laporan';
            } else if (type == 'delete') {
                title = 'Delete Laporan';
            }
            modalTitle.innerHTML = await title;
            const id = btn.getAttribute('data-id'),
                getData = await fetch(`<?= base_url('Employee/modalContentWeeklyReport') ?>/${type}/${id}`),
                data = await getData.text();
            formData.innerHTML = await data;

            modal.classList.add('modal-open');
            btn.disabled = false;
            btn.classList.remove('cursor-not-allowed');
            btn.innerHTML = oldtextcontent;
        });
    });

    const closeModal = () => {
        modal.classList.remove('modal-open');
    }
    closeModalBtn.addEventListener('click', closeModal);

    modalBackdrop.addEventListener('click', (event) => {
        if (modal.classList.contains('modal-open')) {
            closeModal();
        }
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>

</html>