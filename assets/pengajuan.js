function readDetailPengajuan(id_mobil,gaji,status,tanggungan,jangka,kredit,usia,base_url){

    readDetail(gaji,base_url,'gaji');
    readDetail(status,base_url,'status');
    readDetail(tanggungan,base_url,'tanggungan_table');
    readDetail(jangka,base_url,'jangka_waktu');
    readDetail(kredit,base_url,'kredit');
    readDetail(usia,base_url,'usia_table');
    // readDetailMobil(id_mobil,base_url,'mobil');
}

function readDetail(nilai,base_url,element){
    $.ajax({
        type    : "GET",
        url     : base_url + 'pengajuan/readDetailPengajuan/'+nilai,
        dataType : 'html',
        success: function(response){
            var data = JSON.parse(response);
                document.getElementById(element).innerHTML = data.sub_kriteria;
        }
    })
}
function readDetailValue(nilai,base_url,element){
    $.ajax({
        type    : "GET",
        url     : base_url + 'pengajuan/readDetailPengajuan/'+nilai,
        dataType : 'html',
        success: function(response){
            var data = JSON.parse(response);
                    document.getElementById(element).value = data.sub_kriteria;
              
        }
    })
}
function readDetailStatus(nilai,base_url,element){
    $.ajax({
        type    : "GET",
        url     : base_url + 'pengajuan/readDetailPengajuan/'+nilai,
        dataType : 'html',
        success: function(response){
            var data = JSON.parse(response);
             
                return data.sub_kriteria;
              
        }
    })
}
function updateDetail(nilai,base_url,element){
    console.log(element);
    $.ajax({
        type    : "GET",
        url     : base_url + 'pengajuan/readDetailPengajuan/'+nilai,
        dataType : 'html',
        success: function(response){
            var data = JSON.parse(response);
                document.getElementById(element).value = data.id_sub_kriteria;
        }
    })
}
function readDetailMobil(id_mobil,base_url,mobil){
    $.ajax({
        type    : "GET",
        url     : base_url + 'pengajuan/readDetailMobil/'+id_mobil,
        dataType : 'html',
        success: function(response){
            var data = JSON.parse(response);
                document.getElementById(mobil).innerHTML = data.nama_mobil;
        }
    })
}

function updateDetailPengajuan(id_mobil,gaji,status,tanggungan,jangka,kredit,usia,id,base_url){
    updateDetail(gaji,base_url,'form_gaji');
    updateDetail(status,base_url,'form_status');
    updateDetail(tanggungan,base_url,'form_tanggungan');
    updateDetail(jangka,base_url,'form_jangka');
    updateDetail(kredit,base_url,'form_kredit');
    updateDetail(usia,base_url,'form_usia');
  document.getElementById('id_penilaian').value = id;
}
function detailPengajuan(base_url,nik,usia,foto_ktp,tanggal_lahir,phone_1,phone_2,gaji,foto_gaji,tanggungan,foto_tanggungan,status,foto_status,jangka,dp,foto_npwp,foto_buku,id_penilaian,c_ktp,c_tgllahir,c_usia,c_phone1,c_phone2,c_gaji,c_tanggungan,c_status,c_npwp,c_tabungan,cicilan,pernikahan,c_pernikahan,alamat_kantor,no_kantor,c_alamatkantor,c_nokantor,gaji_awal,gaji_akhir,kredit){
    document.getElementById("ktp1").value = nik;
    document.getElementById("tanggal_lahir1").value = tanggal_lahir;
    document.getElementById("status_pernikahan1").value = pernikahan;
    document.getElementById("alamat_kantor1").value = alamat_kantor;
    document.getElementById("no_kantor1").value = no_kantor;
    readDetailValue(usia,base_url,'usia1');
    document.getElementById("foto_ktp1").href = base_url + "assets/admin/buktipengajuan/" + foto_ktp;
    document.getElementById("phone_11").value = phone_1;
    document.getElementById("phone_21").value = phone_2;
    readDetailValue(gaji,base_url,'besar_gaji1');
    readDetailValue(kredit,base_url,'kredit_ke1');
    document.getElementById("foto_gaji1").href = base_url + "assets/admin/buktipengajuan/" + foto_gaji;
    readDetailValue(tanggungan,base_url,'tanggungan1');
    document.getElementById("foto_kk1").href = base_url + "assets/admin/buktipengajuan/" + foto_tanggungan;
    readDetailValue(status,base_url,'status_rumah1');
    document.getElementById("cicilan1").value = "Rp " + cicilan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById("nilai_gaji").value = "Rp " + gaji_awal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    if(gaji_akhir == 0){
        document.getElementById("form_gajiakhir").hidden = true;
    }else{
        document.getElementById("form_gajiakhir").hidden = false;

        document.getElementById("gaji_akhir").value = "Rp " + gaji_akhir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    if(foto_status == ""){

        document.getElementById("foto_status1").hidden = true;
    }else{
        document.getElementById("foto_status1").href = base_url + "assets/admin/buktipengajuan/" + foto_status;
    }
    readDetailValue(jangka,base_url,'tenor1');
    document.getElementById('dp1').value = "Rp " + dp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById("foto_buku1").href = base_url + "assets/admin/buktipengajuan/" + foto_buku;
    document.getElementById("foto_npwp1").href = base_url + "assets/admin/buktipengajuan/" + foto_npwp;  
    document.getElementById("check_ktp1").checked = checkData(c_ktp);
    document.getElementById("check_tanggal1").checked = checkData(c_tgllahir);
    document.getElementById("check_usia1").checked = checkData(c_usia);
    document.getElementById("check_phone11").checked = checkData(c_phone1);
    document.getElementById("check_phone21").checked = checkData(c_phone2);
    document.getElementById("check_gaji1").checked = checkData(c_gaji);
    document.getElementById("check_tanggungan1").checked = checkData(c_tanggungan);
    document.getElementById("check_statusrumah1").checked = checkData(c_status);
    document.getElementById("check_npwp1").checked = checkData(c_npwp);
    document.getElementById("check_tabungan1").checked = checkData(c_tabungan);
    document.getElementById("check_pernikahan1").checked = checkData(c_pernikahan);
    document.getElementById("check_alamatkantor1").checked = checkData(c_alamatkantor);
    document.getElementById("check_nokantor1").checked = checkData(c_nokantor);
  
}

function checkData(value){
    if(value == 1){
        var cek = true;
    }else{
        var cek = false;
    }
    return cek;
}

function confirmPengajuan(base_url,nik,usia,foto_ktp,tanggal_lahir,phone_1,phone_2,gaji,foto_gaji,tanggungan,foto_tanggungan,status,foto_status,jangka,dp,foto_npwp,foto_buku,id_penilaian,status_pernikahan,alamat_kantor,no_kantor,cicilan,gaji_awal){
    document.getElementById("ktp").value = nik;
    document.getElementById("phone_1").value = phone_1;
    document.getElementById("phone_2").value = phone_2;
    document.getElementById("tanggal_lahir").value = tanggal_lahir;
    document.getElementById("status_pernikahan").value = status_pernikahan;
    document.getElementById("alamat_kantor").value = alamat_kantor;
    document.getElementById("no_kantor").value = no_kantor;
    document.getElementById("foto_ktp").href = base_url + "assets/admin/buktipengajuan/" + foto_ktp;
    document.getElementById("foto_gaji").href = base_url + "assets/admin/buktipengajuan/" + foto_gaji;
    document.getElementById("foto_kk").href = base_url + "assets/admin/buktipengajuan/" + foto_tanggungan;
    if(foto_status == ""){

        document.getElementById("foto_status").hidden = true;
    }else{
        document.getElementById("foto_status").href = base_url + "assets/admin/buktipengajuan/" + foto_status;

    }
    document.getElementById("foto_npwp").href = base_url + "assets/admin/buktipengajuan/" + foto_npwp;
    document.getElementById("foto_buku").href = base_url + "assets/admin/buktipengajuan/" + foto_buku;
    readDetailValue(usia,base_url,'usia');
    readDetailValue(gaji,base_url,'besar_gaji');
    readDetailValue(tanggungan,base_url,'tanggungan');
    readDetailValue(tanggungan,base_url,'tanggungan');
    readDetailValue(status,base_url,'status_rumah');
    readDetailValue(jangka,base_url,'tenor');
    document.getElementById("form").action = base_url + "pengajuan/confirmPengajuan/"+id_penilaian;
    document.getElementById('dp').value = "Rp " + dp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");  
    document.getElementById("cicilan").value = "Rp " + cicilan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById("nilai_gaji2").value = "Rp " + gaji_awal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    document.getElementById("gaji_perhitungan").value = gaji_awal;
}

function getAge(){
    var birthDate = document.getElementById("tgl_lahir").value;
    var age = _calculateAge(birthDate);

    if(age >= 18 && age <= 25){
        document.getElementById("selectUsia").value = 19;
        document.getElementById("notifUsia").hidden = true;
        document.getElementById("selectUsiaForm").value = 19;
    }else if(age >=26 && age <= 30 ){
        document.getElementById("selectUsia").value = 20;
        document.getElementById("selectUsiaForm").value = 20;
        document.getElementById("notifUsia").hidden = true;
    }else if(age >= 31 && age <= 35){
        document.getElementById("selectUsia").value = 21;
        document.getElementById("selectUsiaForm").value = 21;
        document.getElementById("notifUsia").hidden = true;
    }else if(age >= 36 && age <= 40){
        document.getElementById("selectUsia").value = 34;   
        document.getElementById("selectUsiaForm").value = 34;   
        document.getElementById("notifUsia").hidden = true;
    }else if(age >= 41){
        document.getElementById("selectUsia").value = 35;
        document.getElementById("selectUsiaForm").value = 35;
        document.getElementById("notifUsia").hidden = true;
    }else if(age < 18){
        document.getElementById("notifUsia").hidden = false;
    }
}

function _calculateAge(dateString) { // birthday is a date
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
    // console.log(age);
}
function menyetujuiPengajuan(base_url,id){
    document.getElementById("link_pengajuan").href = base_url + "pengajuan/menyetujuipengajuan/"+id;
}

function sendEmail(id,normalisasi,base_url){
    document.getElementById("kirim_email").href = base_url + 'email/sendEmail/'+id+"/"+normalisasi;
}

function batalPengajuan(base_url){
    document.getElementById('batal_pengajuan').href = base_url;
}

function changeActivePengajuan(){
    document.getElementById("pills-pengajuan-tab").setAttribute("class","nav-link active show");
    document.getElementById("pills-pengajuan-tab").setAttribute("aria-selected","true");
    document.getElementById("pills-pengajuan").setAttribute("class","tab-pane fade active show");
    document.getElementById("pills-home").setAttribute("class","tab-pane fade");
    document.getElementById("pills-home-tab").setAttribute("class","nav-link");
    document.getElementById("pills-home-tab").setAttribute("aria-selected","false");
    
}

function changeActiveBukti(){
    document.getElementById("pills-pengajuan").setAttribute("class","tab-pane");
    document.getElementById("pills-pengajuan-tab").setAttribute("class","nav-link");
    document.getElementById("pills-pengajuan-tab").setAttribute("aria-selected","false");
    document.getElementById("pills-bukti-tab").setAttribute("class","nav-link active show");
    document.getElementById("pills-bukti-tab").setAttribute("aria-selected","true");
    document.getElementById("pills-bukti").setAttribute("class","tab-pane fade active show");
}


function hitungDp(base_url,harga){
    var selectDp = $("#dp option:selected").text();
    var selectTenor = $("#tenor option:selected").text();

    if(selectTenor != "--Pilih Tenor--"){
        if(selectTenor == "1 Tahun"){
            var pajak = 0.08;
            var tenor = 12;
        }else if(selectTenor == "2 Tahun"){
            var pajak = 0.085;
            var tenor = 24;
        }else if(selectTenor == "3 Tahun"){
            var pajak = 0.09;
            var tenor = 36;
        }else if(selectTenor == "4 Tahun"){
            var pajak = 0.095;
            var tenor = 48;
        }else if(selectTenor == "5 Tahun"){
            var pajak = 0.1;
            var tenor = 60;
        }

        if(selectDp == "25%"){
            var dp = 0.25;
        }else if(selectDp == "50%"){
            var dp = 0.5;
        }else if(selectDp == "75%"){
            var dp = 0.75;
        }

        var hargaPajak = harga * pajak;
        var totalAfterPajak = parseInt(harga) + parseInt(hargaPajak);
        var hargaDp = totalAfterPajak * dp;
        var hargaAfterDp = totalAfterPajak - hargaDp;
        var cicilan = parseInt(hargaAfterDp) / parseInt(tenor);
        if(cicilan.toString().length > 8){
            var SplitCicilan = cicilan.toString().split('.');
            var cicilan2 = SplitCicilan[0];
            cicilan = cicilan2;
        }else{
            cicilan = cicilan;
        }
        // console.log(cicilan.toString().length);


        document.getElementById("hargaDpSee").value = "Rp " + hargaDp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("harga_dp").value = hargaDp;

        document.getElementById("cicilanSee").value = "Rp " + cicilan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("cicilan").value = cicilan;


    }
    
}

