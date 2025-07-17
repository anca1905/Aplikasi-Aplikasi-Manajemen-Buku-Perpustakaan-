$(document).ready(function () {
    loadData();
});

function loadData() {
    var url = $('#tabelKategori').data('url');

    $('#tabelKategori').DataTable({
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
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {
            data: 'kategori',
            name: 'kategori',
        },
        {
            data: 'deskripsi',
            name: 'deskripsi',
        },
        {
            data: 'jumlah',
            name: 'jumlah',
        },
        {
            data: 'aksi',
            name: 'aksi ',
        },
        ]
    })
}