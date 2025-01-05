$(document).ready(function () {
    // Load data alumni
    function loadData() {
        $.ajax({
            url: 'backend.php',
            method: 'GET',
            success: function (data) {
                const alumni = JSON.parse(data);
                let rows = '';
                alumni.forEach(function (alumnus) {
                    rows += `
                        <tr>
                            <td>${alumnus.id}</td>
                            <td>${alumnus.nama}</td>
                            <td>${alumnus.tahun_lulus}</td>
                            <td>${alumnus.pekerjaan}</td>
                            <td>${alumnus.kontak}</td>
                        </tr>
                    `;
                });
                $('#dataTable').html(rows);
            }
        });
    }

    loadData();

    // Tambah data alumni
    $('#addAlumni').on('click', function () {
        const nama = $('#nama').val();
        const tahun_lulus = $('#tahun_lulus').val();
        const pekerjaan = $('#pekerjaan').val();
        const kontak = $('#kontak').val();

        if (nama && tahun_lulus && pekerjaan && kontak) {
            $.ajax({
                url: 'backend.php',
                method: 'POST',
                data: { nama, tahun_lulus, pekerjaan, kontak },
                success: function (response) {
                    alert(response);
                    loadData();
                    $('#alumniForm')[0].reset();
                }
            });
        } else {
            alert('Semua kolom harus diisi!');
        }
    });
});
