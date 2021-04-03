<!DOCTYPE html>
<html>
<head>
<title>Dashboard </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Isian Indeks Massa Tubuh (BMI)
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="form-group row">
                            <label class="col-4 col-form-label" for="nama">Nama</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user-circle-o"></i>
                                        </div>
                                    </div>
                                    <input id="nama" name="nama" type="text" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berat" class="col-4 col-form-label">Berat</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-anchor"></i>
                                        </div>
                                    </div>
                                    <input id="berat" name="berat" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">Kg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-arrows-v"></i>
                                        </div>
                                    </div>
                                    <input id="tinggi" name="tinggi" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">cm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="umur" class="col-4 col-form-label">Umur</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-bell"></i>
                                        </div>
                                    </div>
                                    <input id="umur" name="umur" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">Thn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Jenis Kelamin</label>
                            <div class="col-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Laki - Laki">
                                    <label for="radio_0" class="custom-control-label">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Perempuan">
                                    <label for="radio_1" class="custom-control-label">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="proses" type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Hasil Evaluasi
                </div>
                <div class="card-body">
                    <?php
                    require_once "bmipasien.php";
                    if (isset($_POST['proses'])) {
                        $nama = $_POST['nama'];
                        $berat = $_POST['berat'];
                        $tinggi = $_POST['tinggi'];
                        $umur = $_POST['umur'];
                        $gender = $_POST['gender'];
                        $pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $gender);


                        echo 'Nama : ' . $pasien1->name . '</br>';
                        echo 'Berat Badan : ' . $pasien1->weight . '</br>';
                        echo 'Tinggi Badan : ' . $pasien1->height . '</br>';
                        echo 'Umur : ' . $pasien1->age . '</br>';
                        echo 'Gender : ' . $pasien1->gender . '</br>';
                        echo 'BMI : ' . round($pasien1->hasilBMI()) . '</br>';
                        echo 'Status : ' . $pasien1->statusBMI() . '</br>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
    <h3 class="mb-2 h3">Data Hasil BMI</h3>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Berat (Kg)</th>
                        <th scope="col">Tinggi (cm)</th>
                        <th scope="col">BMI</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                $pasien2 = new BMIPasien("Maya Catherine Yolanda", 50, 155, 19, "Perempuan");
                $pasien3 = new BMIPasien("Sultan syahbie", 69, 177, 19, "Laki - Laki");
                $pasien4 = new BMIPasien("Rayyan Azka", 50, 159, 21, "Laki - Laki");
                $pasien5 = new BMIPasien("Umair", 65, 164, 19, "Laki - Laki");
                $pasien6 = new BMIPasien("Syahrifal Anwar", 51, 165, 21, "Laki - Laki");
                $pasien7 = new BMIPasien("Caca Alayyub", 80, 168, 19, "Laki - Laki");
                $pasien8 = new BMIPasien("Faza tadzkia", 65, 164, 19, "Perempuan");
                $pasien9 = new BMIPasien("Yusman", 55, 178, 24, "Laki - Laki");
                $pasien10 = new BMIPasien("Daffa", 62, 165, 25, "Laki - Laki");
                $ar_nilai = [$pasien2, $pasien3, $pasien4, $pasien5, $pasien6, $pasien7, $pasien8, $pasien9,$pasien10];
                if (isset($_POST['proses'])) {
                    array_push($ar_nilai, $pasien1);
                }
                $no = 1;
                foreach ($ar_nilai as $ns) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $ns->name; ?></td>
                        <td><?= $ns->gender; ?></td>
                        <td><?= $ns->age; ?></td>
                        <td><?= $ns->weight; ?></td>
                        <td><?= $ns->height; ?></td>
                        <td><?= $ns->hasilBMI(); ?></td>
                        <td><?= $ns->statusBMI(); ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>