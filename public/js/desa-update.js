$(document).ready(function() {
    // Event listener untuk dropdown kecamatan di modal create
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

    // Event listener dinamis untuk dropdown kecamatan di modal update
    $(document).on('change', '[id^=kecamatans_id-]', function() {
        var modalId = $(this).attr('id').split('-')[1];
        var kecamatanId = $(this).val();
        if(kecamatanId) {
            $.ajax({
                url: '/perumahan/' + kecamatanId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var desaSelect = $('#desas_id-' + modalId);
                    desaSelect.empty();
                    desaSelect.append('<option value="">Pilih Desa</option>');
                    $.each(data, function(_key, value) {
                        desaSelect.append('<option value="'+ value.id +'">'+ value.nama_desa +'</option>');
                    });
                },
                error: function(_xhr, status, error) {
                    console.error("AJAX Error: " + status + error);
                }
            });
        } else {
            $('#desas_id-' + modalId).empty();
            $('#desas_id-' + modalId).append('<option value="">Pilih Desa</option>');
        }
    });
});
