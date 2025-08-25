const kelas = document.getElementById("kelas");

kelas.addEventListener("change", (event) => {
  const value = event.target.value;

  fetch("../model/add/keterlambatan.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "kelas=" + value,
  })
    .then((r) => r.text())
    .then((data) => {
      document.getElementById("siswa").innerHTML = data;
    });
});
