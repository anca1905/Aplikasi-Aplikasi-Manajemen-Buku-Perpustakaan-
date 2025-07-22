
function loadData() {
    var url = $('#serverside').data('url');
    $('#serverside').DataTable({
        processing: true,
        pagination: true,
        responsive: false,
        serverSide: true,
        searching: true,
        ordering: false,
        ajax: {
            url: url
        },
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {
            data: 'user',
            name: 'user',
        },
        {
            data: 'buku',
            name: 'buku',
        },
        {
            data: 'noHp',
            name: 'noHp',
        },
        {
            data: 'tgl_pinjam',
            name: 'tgl_pinjam',
        },
        {
            data: 'tgl_kembali',
            name: 'tgl_kembali',
        },
        {
            data: 'denda',
            name: 'denda',
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


$(document).ready(function () {
    loadData();
});