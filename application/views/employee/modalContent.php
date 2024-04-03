<?php if ($type == 'add') { ?>
    <form action="<?= base_url('employee/s_weeklyreport') ?>" method="post" id="formData">

        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Nama Klien</span>
            </div>
            <input type="text" name="nama_klien" placeholder="Type here" class="input input-bordered w-full " />
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Tim</span>
            </div>
            <input required type="text" name="tim" placeholder="cth: hajul, farhan, lana..." class="input input-bordered w-full " />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Jenis pekerjaan</span>
            </div>
            <input required type="text" name="jenis" placeholder="Type here" class="input input-bordered w-full " />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Progres pekerjaan</span>
            </div>
            <textarea required name="progress" class="textarea textarea-bordered" placeholder="..."></textarea>
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text">Kendala</span>
            </div>
            <textarea name="kendala" class="textarea textarea-bordered" placeholder="..."></textarea>
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text">Jadwal meeting</span>
            </div>
            <input name="jdwl_meet" type="date" placeholder="Type here" class="input input-bordered w-full " />
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Target penyelesaian</span>
            </div>
            <input required type="text" name="target" placeholder="Type here" class="input input-bordered w-full " />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Status</span>
            </div>
            <select required name="status" class="select select-bordered w-full">
                <option selected value="On Progress">On Progress</option>
                <option value="Finished">Finished</option>
                <option value="Fail">Fail</option>
                <option value="Pending">Pending</option>
                <option value="Repeat">Repeat</option>
            </select>
        </label>
        <button class="btn btn-outline btn-success btn-block mt-3" type="submit">Simpan</button>
    </form>
<?php } elseif ($type == 'edit') { ?>
    <form action="<?= base_url('Employee/updateWeeklyReport/' . $data['id']) ?>" method="post" id="formData">
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Nama Klien</span>
            </div>
            <input type="text" name="nama_klien" placeholder="Type here" class="input input-bordered w-full" value="<?= $data['nama_klien'] ?>" />
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Tim</span>
            </div>
            <input required type="text" name="tim" placeholder="cth: hajul, farhan, lana..." class="input input-bordered w-full" value="<?= $data['tim'] ?>" />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Jenis pekerjaan</span>
            </div>
            <input required type="text" name="jenis" placeholder="Type here" class="input input-bordered w-full" value="<?= $data['jenis'] ?>" />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Progres pekerjaan</span>
            </div>
            <textarea required name="progress" class="textarea textarea-bordered" placeholder="..."><?= $data['progres'] ?></textarea>
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text">Kendala</span>
            </div>
            <textarea name="kendala" class="textarea textarea-bordered" placeholder="..."><?= $data['kendala'] ?></textarea>
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"> Jadwal meeting</span>
            </div>
            <input name="jdwl_meet" type="date" placeholder="Type here" class="input input-bordered w-full" value="<?= $data['jdwl_meet'] ?>" />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Target penyelesaian</span>
            </div>
            <input required type="text" name="target" placeholder="Type here" class="input input-bordered w-full" value="<?= $data['target'] ?>" />
        </label>
        <label class="form-control w-full ">
            <div class="label">
                <span class="label-text"><small class="text-red-500">*</small> Status</span>
            </div>
            <select required name="status" class="select select-bordered w-full">
                <option <?= $data['status'] == 'On Progress' ? 'selected' : '' ?> value="On Progress">On Progress</option>
                <option <?= $data['status'] == 'Finished' ? 'selected' : '' ?> value="Finished">Finished</option>
                <option <?= $data['status'] == 'Fail' ? 'selected' : '' ?> value="Fail">Fail</option>
                <option <?= $data['status'] == 'Pending' ? 'selected' : '' ?> value="Pending">Pending</option>
                <option <?= $data['status'] == 'Repeat' ? 'selected' : '' ?> value="Repeat">Repeat</option>
            </select>
        </label>
        <button class="btn btn-outline btn-success btn-block mt-3" name="id" value="<?= $data['id'] ?>" type="submit">Update</button>
    </form>
<?php } elseif ($type == 'delete') { ?>
    <form action="<?= base_url('Employee/deleteWeeklyReport/' . $data['id']) ?>" method="post" id="formData">
        <h2 class="text-lg text-center">Apakah Anda yakin akan menghapus data laporan <b><?= $data['jenis'] ?></b> untuk klien <b><?= $data['nama_klien'] ?></b>?</h2>
        <div class="flex justify-end mt-5">
            <button type="submit" name="id" value="${data.id}" class="btn btn-outline btn-error btn-sm m-1">Ya, Hapus</button>
            <button type="button" class="btn btn-outline btn-neutral btn-sm m-1" onclick="closeModal()">Tidak, Batal</button>
        </div>
    </form>
<?php } ?>