function tambahmerk(base_url){
    document.getElementById('modal_title').innerHTML = "Form Tambah Merk";
    document.getElementById('id_merk').value = "";
    document.getElementById('nama_merk').value = "";
    document.getElementById('button').innerHTML = "Tambah Data";
    document.getElementById('form').action = base_url;
}
function updatemerk(base_url,id,nama){
    document.getElementById('modal_title').innerHTML = "Form Update Merk";
    document.getElementById('id_merk').value = id;
    document.getElementById('nama_merk').value = nama;
    document.getElementById('button').innerHTML = "Update Data";
    document.getElementById('form').action = base_url;
}
function deletemerk(base_url){
    document.getElementById('buttondelete').href = base_url;
}