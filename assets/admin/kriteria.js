function tambahkriteria(base_url) {
	document.getElementById("modal_title").innerHTML = "Form Tambah Kriteria";
	document.getElementById("id_kriteria").value = "";
	document.getElementById("kode").value = "";
	document.getElementById("kriteria").value = "";
	document.getElementById("bobot").value = "";
	document.getElementById("form").action = base_url;
	document.getElementById("button").innerHTML = "Tambah Data";
}
function updatekriteria(base_url, id, kode, kriteria, bobot) {
	document.getElementById("modal_title").innerHTML = "Form Update Kriteria";
	document.getElementById("id_kriteria").value = id;
	document.getElementById("kode").value = kode;
	document.getElementById("kriteria").value = kriteria;
	document.getElementById("bobot").value = bobot;
	document.getElementById("form").action = base_url;
	document.getElementById("button").innerHTML = "Update Data";
}
function deletekriteria(base_url){
    document.getElementById('buttondelete').href = base_url;
}
