$(document).ready(function () {
    loadData();
});

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
            data: 'ISBN',
            name: 'ISBN',
        },
        {
            data: 'judul',
            name: 'judul',
        },
        {
            data: 'penulis',
            name: 'penulis',
        },
        {
            data: 'tahun',
            name: 'tahun',
        },
        {
            data: 'kategori',
            name: 'kategori',
        },
        {
            data: 'aksi',
            name: 'aksi',
        },
        ]
    });
}

// Handle klik tombol delete
$(document).on('click', '.btn-danger', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var judul = $(this).data('judul');

    $('#formHapus').attr('action', '/admin/delete_buku/' + id);
    $('#namaBuku').text(judul);
    $('#modalHapus').modal('show');
});
