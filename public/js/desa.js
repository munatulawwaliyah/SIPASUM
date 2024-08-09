$(document).ready(function() {
    $('#kecamatans_id').on('change', function() {
        var kecamatanId = $(this).val();
        if(kecamatanId) {
            $.ajax({
                url: '/perumahan/' + kecamatanId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data); 
                    $('#desas_id').empty();
                    $('#desas_id').append('<option value="">Pilih Desa</option>');
                    $.each(data, function(_key, value) {
                        $('#desas_id').append('<option value="'+ value.id +'">'+ value.nama_desa +'</option>');
                    });
                },
                error: function(_xhr, status, error) {
                    console.error("AJAX Error: " + status + error);
                }
            });
        } else {
            $('#desas_id').empty();
            $('#desas_id').append('<option value="">Pilih Desa</option>');
        }
    });
});