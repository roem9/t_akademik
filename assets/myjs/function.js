function formFormatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function formatRupiah(angka, prefix) {
  // Check if angka is a negative number
  var isNegative = angka < 0;
  angka = Math.abs(angka);

  var number_string = angka.toString().replace(/[^,\d]/g, ""),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // Add a dot (.) if the input is already a thousand separator
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;

  // Enclose the value in parentheses if it's negative
  if (isNegative) {
    rupiah = "(" + rupiah + ")";
  }

  return prefix === undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function dateIndo(date) {
  var tglBaru = date.split("-").reverse().join("-");

  return tglBaru;
}
