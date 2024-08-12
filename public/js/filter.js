$(document).ready(function() {
    // When a kecamatan is selected
    $('#kecamatans').on('change', function() {
        var kecamatanId = $(this).val();
        
        // Fetch desa options based on kecamatan
        $.ajax({
            url: '/getDesa/' + kecamatanId,
            type: 'GET',
            success: function(data) {
                var desaSelect = $('#desas');
                desaSelect.empty();
                desaSelect.append('<option value="">Choose...</option>');
                $.each(data, function(_key, value) {
                    desaSelect.append('<option value="'+ value.id +'">'+ value.nama_desa +'</option>');
                });
            }
        });
    });

    // Submit the form automatically when desa is selected
    $('#desas').on('change', function() {
        $('#filter-form').submit();
    });
});

