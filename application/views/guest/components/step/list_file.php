
                    <h5 class="mt-5 text-muted">Project files</h5>
                    <ul class="list-unstyled">
                        <?php
                    if ($thc_guest['lk_audited'] != "") {
                    ?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['lk_audited']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Laporan Keuangan Audited</a>
                        </li>
                        <?php
                    } if ($thc_guest['gl'] != "") {
                    ?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['gl']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Buku Besar</a>
                        </li>
                        <?php
                    } if ($thc_guest['spt_masa_ppn'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_masa_ppn']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Masa PPN</a>
                        </li>
                        <?php
                    } if ($thc_guest['spt_masa_pph'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_masa_pph']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Masa PPh</a>
                        </li>
                        <?php
                    }
                    if ($thc_guest['spt_tahunan'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_tahunan']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Tahunan PPh Badan</a>
                        </li>
                        <?php
                    }if ($thc_guest['daftar_penyusutan'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['daftar_penyusutan']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Kertas Kerja Perhitungan Aset Tetap beserta Penyusutan Fiskal</a>
                        </li>
                        <?php
                    }if ($thc_guest['sp2dk'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['sp2dk']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Dokumen SP2DK/SPHP</a>
                        </li>
                        <?php
                    }if ($thc_guest['tp_doc'] != "not yet") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['tp_doc']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                PT Doc</a>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>