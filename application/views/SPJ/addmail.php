<?php
$nama = array();
$i = 0;
if ($karyawan != null) {
    foreach ($karyawan as $a) {
        $nama[$i] = $a['nama'];
        $i++;
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">

        <div class="col-lg-6">

            <?= form_error('nomor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tujuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_berangkat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_kembali', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditujukan_kepada', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penandatanganan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nomor_spj', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_spj', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tipe_keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jenis_kendaraan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('no_polis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('pengemudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditanggung_perusahaan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('lain_lain', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


            <div class="card">
                <div class="card-header">
                    Add mail
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <!--						<form method="post" action="--><? //= base_url('surat_masuk/addmail')
                                                                                    ?>
                        <!--" enctype="multipart/form-data">-->
                        <?php echo form_open_multipart() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor" name="nomor" readonly value="<?= $spj['nomor'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly value="<?= $spj['tanggal'] ?>">
                        </div>
                        <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="myInput" type="text" name="nama" readonly value="<?= $spj['nama'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" readonly value="<?= $spj['jabatan'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="golongan" name="golongan" readonly value="<?= $spj['golongan'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" readonly value="<?= $spj['tujuan'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" readonly value="<?= $spj['keperluan'] ?>">
                        </div>


                        <!-- <div class="row form-group">

                            <div class="col"><input type="text" class="form tambahForm" id="nama_rombongan" name="nama_rombongan[]" placeholder="Nama Rombongan">
                            </div>
                            <div class="col"><button id="tambahInput" type="button" href="">tambah</button></div>
                            <div class="col"><button type="button" id="resetInput" href="">reset</button></div>

                            <div class="col" id="insert-form"></div>
                            <input type="hidden" id="jumlah-form" value="1">

                        </div> -->

                        <?php $i = 1;
                        $j = 1;
                        foreach ($pdl_rombongan as $dataRombongan) : ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" readonly class="form-control form tambahForm" id="<?php echo ($i == 1 ? 'nama_rombongan' : 'tambahForm' . $i) ?>" placeholder="Cari Nama Rombongan">
                                    </div>
                                    <div class="col">
                                        <select id="show-list<?php echo ($i >= 2 ?  $i : null) ?>" class="form-control show-list" name="nama_rombongan[]">
                                            <option><?= $dataRombongan['nama_peserta'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="<?php echo ($i == 1 ? 'jabatan_rombongan' : 'jabatanRombongan' . $i) ?>" name="jabatan_rombongan[]" placeholder="Jabatan Rombongan" readonly value="<?= $dataRombongan['jabatan_rombongan'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="golonganRombongan<?php echo ($i >= 2 ?  $i : null) ?>" name="golongan_rombongan[]" placeholder="Golongan Rombongan" readonly value="<?= $dataRombongan['golongan_rombongan'] ?>">
                            </div>
                            <div class="col" id="insert-form"></div>
                            <input type="hidden" id="jumlah-form" value="<?php echo $j += 1; ?>">

                            <?php $i++ ?>
                        <?php endforeach ?>




                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" readonly value="<?= $spj['tanggal_berangkat'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" readonly value="<?= $spj['tanggal_kembali'] ?>">
                        </div>

                        <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="myInput2" type="text" name="ditujukan_kepada" readonly value="<?= $spj['ditujukan_kepada'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_penandatanganan" name="jabatan_penandatanganan" readonly value="<?= $spj['jabatan_penandatanganan'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor_spj" name="nomor_spj" placeholder="Nomor SPJ" value="<?= $spj['nomor_spj'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_spj" name="tanggal_spj" readonly value="<?= date("Y-n-d"); ?>">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="tipe_keperluan" name="tipe_keperluan">
                                <option>Dinas</option>
                                <option>Sosial</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $spj['jenis_kendaraan'] ?>">
                                <option>Mobil</option>
                                <option>Motor</option>
                                <option>Pesawat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="no_polis" name="no_polis" placeholder="No Polis" value="<?= $spj['no_polis'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="pengemudi" name="pengemudi" placeholder="Pengemudi" value="<?= $spj['pengemudi'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ditanggung_perusahaan" name="ditanggung_perusahaan" placeholder="Ditanggung Perusahaan" value="<?= $spj['ditanggung_perusahaan'] ?>">
                        </div>




                        <div class="form-group">
                            <input type="text" class="form-control" id="lain_lain" name="lain_lain" placeholder="Lain-Lain" value="<?= $spj['lain_lain'] ?>">
                        </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                        <?php echo form_close() ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    // var namaKaryawan = ['asdf', 'zxcv', 'qwer', 'sdf'];
    var namaKaryawan = [<?php
                        for ($i = 0; $i < count($nama); $i++) {
                            if ($i != count($nama) - 1) {
                                echo '"' . $nama[$i] . '"' . ',';
                            } else {
                                echo '"' . $nama[$i] . '"';
                            }
                        }
                        ?>];
    var count = namaKaryawan;

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), count);
    autocomplete(document.getElementById("myInput2"), count);
    autocomplete(document.getElementById("penandatangan_spj"), count);
    autocomplete(document.getElementById("nama_rombongan"), count);
</script>