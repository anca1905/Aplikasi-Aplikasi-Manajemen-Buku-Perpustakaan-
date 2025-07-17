
$(document).ready(function () {
    loadData();
});

function loadData() {
    var url = $('#serverside').data('url');

    $('#serverside').DataTable({
        processing: true,
        pagination: true,
        responsive: false,
        serverSide: false,
        searching: true,
        ordering: false,
        ajax: {
            url: url
        },
        columns: [{
            data: 'nik',
            name: 'nik',        },
        {
            data: 'foto',
            name: 'foto',
        },
        {
            data: 'nama',
            name: 'nama',
        },
        {
            data: 'email',
            name: 'email',
        },
        {
            data: 'aksi',
            name: 'aksi ',
        },
        ]
    });
}

$(document).on('click', '.btn-danger', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var nama = $(this).data('nama');

    $('#formHapus').attr('action', '/admin/delete/' + id);
    $('#namaPengguna').text(nama);
    $('#modalHapus').modal('show');
});
