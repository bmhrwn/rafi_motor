function tambahmobil(base_url){
    document.getElementById('modal_title').innerHTML = "Form Tambah Mobil";
    document.getElementById('id_mobil').value = "";
    document.getElementById('nama_mobil').value = "";
    document.getElementById('plat_mobil').value = "";
    document.getElementById('nama_type').value = "";
    document.getElementById('nama_merk').value = "";
    document.getElementById('tahun_mobil').value = "";
    document.getElementById('harga_mobil').value = "";
    document.getElementById('tipe_mobil').value = "";
    document.getElementById('cakupan_mesin').value = "";
    document.getElementById('transmisi').value = "";
    document.getElementById('penumpang').value = "";
    document.getElementById('kilometer').value = "";
    document.getElementById('warna').value = "";
    document.getElementById('bahan_bakar').value = "";
    document.getElementById('varian').value = "";
    document.getElementById('warna_chart').innerHTML = "";
    document.getElementById('foto_1').innerHTML = "Choose File";
    document.getElementById('foto_2').innerHTML = "Choose File";
    document.getElementById('foto_3').innerHTML = "Choose File";
    document.getElementById('warna_chart').value = "";
    document.getElementById('form').action = base_url;
    document.getElementById('button').innerHTML = "Tambah Data";
}
function deletemobil(base_url){
    document.getElementById('buttondelete').href = base_url;
}
function updatemobil(base_url,id,nama,type,merk,plat,tahun,harga,tipe,cakupan,transmisi,penumpang,kilometer,warna,bahan,varian,foto_1,foto_2,foto_3,warna_chart){
    document.getElementById('modal_title').innerHTML = "Form Update Mobil";
    document.getElementById('id_mobil').value = id;
    document.getElementById('nama_mobil').value = nama;
    document.getElementById('plat_mobil').value = plat;
    document.getElementById('nama_type').value = type;
    document.getElementById('nama_merk').value = merk;
    document.getElementById('tahun_mobil').value = tahun;
    document.getElementById('harga_mobil').value = harga;
    document.getElementById('tipe_mobil').value = tipe;
    document.getElementById('cakupan_mesin').value = cakupan;
    document.getElementById('transmisi').value = transmisi;
    document.getElementById('penumpang').value = penumpang;
    document.getElementById('kilometer').value = kilometer;
    document.getElementById('warna').value = warna;
    document.getElementById('bahan_bakar').value = bahan;
    document.getElementById('varian').value = varian;
    document.getElementById('warna_chart').value = warna_chart;
    document.getElementById('foto_1').innerHTML = foto_1;
    document.getElementById('foto_2').innerHTML = foto_2;
    document.getElementById('foto_3').innerHTML = foto_3;
    document.getElementById('form').action = base_url;
    document.getElementById('button').innerHTML = "Update Data";
    
}
function detailmobil(foto,nama_mobil,type,merk,tipe,tahun,harga,cakupan,transmisi,penumpang,kilometer,bahan,warna){
document.getElementById('title').innerHTML = "Form Detail Mobil";
document.getElementById('foto').src = foto;
document.getElementById('name_mobil').innerHTML = nama_mobil;
document.getElementById('type_1').innerHTML = type;
document.getElementById('merk_1').innerHTML = merk;
document.getElementById('tipe_mobil1').innerHTML = tipe;
document.getElementById('tahun_1').innerHTML = tahun;
document.getElementById('harga_1').innerHTML = harga;
document.getElementById('cakupan_1').innerHTML = cakupan;
document.getElementById('transmisi_1').innerHTML = transmisi;
document.getElementById('penumpang_1').innerHTML = penumpang;
document.getElementById('kilometer_1').innerHTML = kilometer;
document.getElementById('bahan_1').innerHTML = bahan;
document.getElementById('warna_1').innerHTML = warna;
}