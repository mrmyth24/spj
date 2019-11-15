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
            <?= form_error('namaKaryawan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('golongan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tujuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jenis_perjalanan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_berangkat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_kembali', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditujukan_kepada', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penandatanganan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


            <div class="card">
                <div class="card-header">
                    Add mail
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?php echo form_open_multipart() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Surat">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly value="<?= date("Y-n-d"); ?>">
                        </div>



                        <!-- <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="namaKaryawan" type="text" name="nama" placeholder="Nama">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Golongan">
                        </div> -->




                        <div class="form-group">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Kota">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="jenis_perjalanan" name="jenis_perjalanan">
                                <option value="Luar Daerah">Luar Daerah</option>
                                <option value="Dalam Daerah Dalam Mes">Dalam Daerah Dalam Mes</option>
                                <option value="Dalam Daerah Luar Mes">Dalam Daerah Luar Mes</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan">
                        </div>


                        <div class="col" id="insert-form">
                            <input type="hidden" id="jumlah-form" value="1">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-5">
                                    <input class="form-control" type="text" class="form tambahForm" id="nama_rombongan" placeholder="Nama Peserta">
                                </div>
                                <div class="col">
                                    <select id="show-list" class="form-control" name="nama_rombongan[]">
                                        <option>Tidak ada data</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="jabatan_rombongan" name="jabatan_rombongan[]" placeholder="Jabatan Peserta" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="golongan_rombongan" name="golongan_rombongan[]" placeholder="Golongan Peserta" readonly>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary add_field_button">Tambah Rombongan</button>
                        </div>

                        <div class="input_fields_wrap form-group">

                        </div>


                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="Tanggal Keberangkatan">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Berangkat">
                        </div>

                        <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="myInput2" type="text" name="ditujukan_kepada" placeholder="Penandatangan 1">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_penandatanganan" name="jabatan_penandatanganan" placeholder="Jabatan Penandatangan 1">
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
            a.setAttribute("class", "autocomplete-items");
            a.setAttribute("id", this.id + "autocomplete-list");
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
    // autocomplete(document.getElementById("myInput"), count);
    autocomplete(document.getElementById("myInput2"), count);
    // autocomplete(document.getElementById("nama_rombongan"), count);
</script>