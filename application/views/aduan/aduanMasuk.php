<div class="container-fluid">
    <div class="form-radius p-3">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                <p>Silahkan klik kolom nim untuk menampilkan kembali data anda!</p>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-lg-3 text-center">
                <h3 class="text-bem"><b>NIM</b></h3>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user text-center" id="nimCheck" onclick="checkNim()" onkeyup="checkNim()" name="nimCheck" placeholder="Masukkan NIM Anda" value="<?= set_value('nimPost'); ?>">
                </div>
                <!-- <div class="form-group">
                    <button type="button" class="btn btn-red btn-user mx-auto d-block checkNim">
                        <b>Lanjutkan</b>
                    </button>
                </div> -->
            </div>
        </div>
        <div id="takTerdaftar">
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-5 border rounded  mr-2 p-4">
                    <div class="row mb-2">
                        <h5 class="text-black">Anda Tak Terdaftar Sebagai Mahasiswa Universitas Negeri Semarang</h5>
                    </div>
                    <div class="row text-black">
                        <p>Apabila anda adalah mahasiswa Universitas Negri Semarang pastikan anda memasukan NIM
                            dengan benar, atau hubungi admin untuk memvalidasi data anda.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="terdaftar">
            <?= form_open_multipart('aduan/aduanmasuk'); ?>
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-5 border rounded  mr-2 p-4">
                    <div class="row mb-2">
                        <h5 class="text-black"><b>Anda Terdaftar</b></h5>
                    </div>
                    <div class="row text-black">
                        <div class="col-lg-5">NIM</div>
                        <div class="col-lg-5">
                            <p id="nim"></p>
                        </div>
                        <input type="number" name="nimPost" id="nimPost" hidden>
                    </div>
                    <div class="row text-black">
                        <div class="col-lg-5">Nama Lengkap</div>
                        <div class="col-lg-5">
                            <p id="nama"></p>
                        </div>
                        <input type="text" name="namaPost" id="namaPost" hidden>
                    </div>
                    <div class="row text-black">
                        <div class="col-lg-5">Jurusan</div>
                        <div class="col-lg-5">
                            <p id="jurusan"></p>
                        </div>
                        <input type="text" name="jurusanPost" id="jurusanPost" hidden>
                    </div>
                    <div class="row text-black">
                        <div class="col-lg-5">Tahun</div>
                        <div class="col-lg-5">
                            <p id="tahun"></p>
                        </div>
                        <input type="text" name="tahunPost" id="tahunPost" hidden>
                    </div>
                </div>
                <div class="col-lg-5 border rounded  p-3">
                    <div class="row">
                        <h5 class="text-bem"><b>Pilih Kategori Aduan</b></h5>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih Aduan</option>

                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['jenis_aduan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-lg-5">
                    <div class="col-lg-12 text-bem">
                        <b>Email</b>
                    </div>
                    <div class="col-lg-12">
                        <div class=" form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email.." value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="col-lg-12 text-bem">
                        <b>Nomor Handphone</b>
                    </div>
                    <div class="col-lg-12">
                        <div class=" form-group">
                            <input type="number" class="form-control" id="noPhone" name="noPhone" placeholder="Your Number Phone.." value="<?= set_value('noPhone'); ?>">
                            <?= form_error('noPhone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-lg-10 form-group">
                    <h5 class="text-bem"><b>Isi Aduan</b></h5>
                    <textarea name="isiAduan" id="isiAduan" class="col-lg-12 rounded" rows="10"><?= set_value('isiAduan'); ?></textarea>
                    <?= form_error('isiAduan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row form-group mt-2 justify-content-center">
                <div class="col-lg-10">
                    <div class="row text-bem">
                        <b>Image</b>
                    </div>
                    <div class="row">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image'); ?>">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <?= form_error('image', '<small class="text-danger pl-3">', '<br></small>'); ?>
                        <p class="text-bem">*Format file .png .jpg .jpeg</p>
                    </div>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-lg-10">
                    <div class="form-group">
                        <!-- <button class="btn btn-red btn-user text-right" id="validasi" onclick="prosesValidasi()">
                            <b>validasi</b>
                        </button> -->

                        <button class="btn btn-red btn-user text-right" id="submit">
                            <b>Submit</b>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff" fill-opacity="1" d="M0,32L16,53.3C32,75,64,117,96,138.7C128,
    160,160,160,192,149.3C224,139,256,117,288,138.7C320,160,352,224,384,240C416,256,448,224,480,208C512,192,544,192,576,192C608,192,640,192,672,
    165.3C704,139,736,85,768,96C800,107,832,181,864,224C896,267,928,277,960,240C992,203,1024,117,1056,90.7C1088,64,1120,96,1152,138.7C1184,181,1216,
    235,1248,234.7C1280,235,1312,181,1344,165.3C1376,149,1408,171,1424,181.3L1440,192L1440,320L1424,320C1408,320,1376,320,1344,320C1312,320,1280,320,
    1248,320C1216,320,1184,320,1152,320C1120,320,1088,320,1056,320C1024,320,992,320,960,320C928,320,896,320,864,
    320C832,320,800,320,768,320C736,320,704,320,672,320C640,320,608,320,576,320C544,320,512,320,480,320C448,320,416,320,384,320C352,320,320,320,
    288,320C256,320,224,320,192,320C160,320,128,320,96,320C64,320,32,320,16,320L0,320Z">
    </path></svg>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    // $('.checkNim').on('click', function()
    function checkNim() {
        var nim = $("#nimCheck").val();
        $.ajax({
            url: "<?= base_url(); ?>aduan/getdata",
            data: "nim=" + nim,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);

                if (obj.nim == null) {
                    document.getElementById("terdaftar").style.display = "none"
                    document.getElementById("takTerdaftar").style.display = "block";
                } else {
                    //for show interface
                    $('#nim').html(': ' + obj.nim);
                    $('#nama').html(': ' + obj.nama);
                    $('#jurusan').html(': ' + obj.jurusan);
                    $('#tahun').html(': ' + obj.tahun);

                    //for input post
                    $('#nimPost').val(obj.nim);
                    $('#namaPost').val(obj.nama);
                    $('#jurusanPost').val(obj.jurusan);
                    $('#tahunPost').val(obj.tahun);
                    document.getElementById("takTerdaftar").style.display = "none"
                    document.getElementById("terdaftar").style.display = "block";
                }
            }
        });
    };

    //validasi email
    function validEmail() {
        var rs = document.getElementById('email').value;
        var atps = rs.indexOf("@");
        var dots = rs.lastIndexOf(".");
        if (atps < 1 || dots < atps + 2 || dots + 2 >= rs.length) {
            alert("Alamat email tidak valid.");
            return false;
        } else {
            return true;
        }
    }

    //function untuk memvalidasi data
    function prosesValidasi() {
        var kategoriAduan = document.getElementById('kategori').value;
        var noPhone = document.getElementById('noPhone').value;
        var isiAduan = document.getElementById('isiAduan').value;
        var image = document.getElementById('image').value;

        if (kategoriAduan != "" && image != "" && noPhone != "" && isiAduan != "") {
            if (validEmail() == true) {
                document.getElementById('submit').style.display = "block";
                document.getElementById('validasi').style.display = "none";
            }
        } else {
            prompt('Anda harus mengisi data dengan lengkap !');
        }
    }

    document.getElementById("image").addEventListener("change", validateFile)

    function validateFile() {
        const allowedExtensions = ['jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG'],
            sizeLimit = 3000000; // 3 megabyte

        // destructuring file name and size from file object
        const {
            name: fileName,
            size: fileSize
        } = this.files[0];

        /*
         * if filename is apple.png, we split the string to get ["apple","png"]
         * then apply the pop() method to return the file extension
         *
         */
        const fileExtension = fileName.split(".").pop();

        /* 
          check if the extension of the uploaded file is included 
          in our array of allowed file extensions
        */
        if (!allowedExtensions.includes(fileExtension)) {
            alert("Type file tidak diizinkan, Format file yang diizinkan [.png .jpg .jpeg]");
            this.value = null;
        } else if (fileSize > sizeLimit) {
            alert("Size file tersebut terlalu besar, maksimal file yang bisa diupload adalah 3 megabyte/")
            this.value = null;
        }
    }
</script>