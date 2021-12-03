function tambahtype(base_url){
    document.getElementById('modal_title').innerHTML = "Form Tambah Type";
    document.getElementById('id_type').value = "";
    document.getElementById('nama_type').value = "";
    document.getElementById('button').innerHTML = "Tambah Data";
    document.getElementById('form').action = base_url;
}
function updatetype(base_url,id,nama){
    document.getElementById('modal_title').innerHTML = "Form Update Type";
    document.getElementById('id_type').value = id;
    document.getElementById('nama_type').value = nama;
    document.getElementById('button').innerHTML = "Update Data";
    document.getElementById('form').action = base_url;
}
function deletetype(base_url){
    document.getElementById('buttondelete').href = base_url;
}