            <div class="container pt-5">
                <div class="card shadow-none">
                    <div class="card-body">
                        <div class="jumbotron text-center text-md-left">
                            <p class="lead text-center text-danger">data is not yet available, please enter data to see a chart or diagram that will be displayed according to the data entered!</p>
                            <hr class="my-4">
                            <small><?= $user['name'] ." from ". $user['company'] ?></small> <br>
                            <small><?= $company_type['type'] ?></small> <br> <br>
                            <a href="<?= base_url('SuperAdmin/finance_manage/'. $user_id) ?>" type="button" class="btn btn-success btn-sm" style="color: data entry;">input data <i class="ml-2 fa fa-notes-medical"></i></a>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>