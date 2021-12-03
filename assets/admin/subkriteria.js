function tambahsubkriteria(base_url){
    document.getElementById('modal_title').innerHTML = "Form Tambah Sub Kriteria";
    document.getElementById('id_sub_kriteria').value = "";
    document.getElementById('id_kriteria').value = "";
    document.getElementById('sub_kriteria').value = "";
    document.getElementById('bobot').value = "";
    document.getElementById('form').action = base_url;
    document.getElementById('button').innerHTML = "Tambah Data";
}
function updatesubkriteria(base_url,id1,id2,sub,bobot){
    document.getElementById('modal_title').innerHTML = "Form Update Sub Kriteria";
    document.getElementById('id_sub_kriteria').value = id1;
    document.getElementById('id_kriteria').value = id2;
    document.getElementById('sub_kriteria').value = sub;
    document.getElementById('bobot').value = bobot;
    document.getElementById('form').action = base_url;
    document.getElementById('button').innerHTML = "Update Data";
}
function hapussubkriteria(base_url){
    document.getElementById('buttondelete').href = base_url;
}