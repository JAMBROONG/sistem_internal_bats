<h4 class="text-center p-5 bg-info rounded mb-3">Global Tax Rules</h4>
<table id="example1" class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Flag</th>
            <th>Tax Rules</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $country    = ["Algeria","Armenia","Australia","Austria","Bangladesh","Belarus","Barbados","Belgium","Bermuda","Bolivia","Bonaire","Botswana","Brazil","British Virgin Islands","Brunei Darussalam","Bulgaria","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Chad","Chile","China Mainland","Colombia","Congo, Replublic","Congo, The Democratic Republic","Costa Rica","Cote D'Ivoire","Croatia","Curacao","Cyprus","Czech Republic","Denmark","Dominican Replublic","Ecuador","Egypt","El Salvador","Estonia","Eswatini","Fiji","Finland","France","Georgia","Germany","Ghana","Gibraltar","Greece","Guam","Guatemala","Guernsey, Channel Islands","Guinea","Guyana","Honduras","Hongkong","Hungary","Iceland","India","Indonesia","Iraq","Ireland, Republic of","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey, Channel Islands","Jordan","Kazakhstan","Kenya","Korea (South)","Korea Democratic Peoople Republic of Korea","Kosovo","Kroasia (Replublic of Croatia)","Kuwait","Laos","Latvia","Lebanon","Lesotho","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Madagascar","Malawi","Malaysia","Maldives","Malta","Mauritania","Marocco","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro, Republic of","Rusia","Morocco","Mozambique","Namibia","Netherlands","New Celedonia","New Zealand","Nicaragua","Nigeria","North Macedonia","Northern Mariana","Norway","Oman","Pakistan","Palestinian Authority","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Romania","Rwanda","Saba","Saint-Martin","São Tomé and Príncipe","Saudi Arabia","Senegal","Serbia, Republic of","Singapore","Sint Eustatius","Sint Maarten","Slovak Republic","Slovenia","South Africa","South Sudan","Spain","Sri Lanka","St. Lucia","Suriname","Sweden","Switzerland","Taiwan","Tanzania","Thailand","Trinidad and Tobago","Tunisia","Turkey","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","US Virgin Islands","Uzbekistan","Venezuela","Vietnam","Zambia","Zimbabwe"];
            
            foreach ($country as $key) {?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                <td><?= $key ?></td>
                <td><img style="width: 30px;" src="https://bats-consulting.com/assets/img/taxrules/<?=$key?>.png" alt=""></td>
                <td>
                    <a href="https://bats-consulting.com/assets/pdf/taxrules/<?=$key?>.pdf" class="btn btn-sm btn-default" download target="_blank"><i class="fa fa-file-download mr-2"></i>download</a>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
</table>
<script>
    document.getElementById('gtr').className = "card bg-light";
</script>