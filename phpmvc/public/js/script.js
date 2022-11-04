$(function () {

    $('.tombolTambahData').on('click', function () {

        $('#formModalLabel').html('Tambah Data Mahasiwa')
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/tigabelas/public/mahasiswa/tambah')

    });


    $('.tampilModalUbah').on('click', function () {

        $('#forModalLabel').html('Ubah Data Mahasiwa')
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/tigasbelas/public/mahasiswa/ubah')

        const id = $(this).data('id');

        $.ajax({

            url: 'http://localhost/phpmvc/tigabelas/public/mahasiswa/getUbah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }

        });

    });
});
