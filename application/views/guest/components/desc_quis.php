
<div id="pertanyaan" class="card">
<div class="card-header text-white"   style="background-color: #2F2F2F;">
        <div class="card-title">
            2. Questions
        </div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="example1" class="table table-striped mt-5 table-light table-hover">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Question</th>
                    <th class="text-center">Answer</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">File</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($thc_guest_answer as $key) {?>
                <tr>
                <td class="text-center"><?= $no ?></td>
                <td><?= $key['question'] ?></td>
                <td><?= $key['answer_guest'] ?></td>
                <td><?= $key['description'] ?></td>
                <td class="text-center"><?= ($key['files_guest'] != "file tidak ada") ? '<a href="'.base_url('').'assets/upload/question/'.$key['files_guest'].'" class="btn btn-sm btn-success"><i class="fa fa-download mr-2"></i>download</a>': '<small><i>no file</i></small>'  ?></td>
                </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>