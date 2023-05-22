jQuery(function($) {
    $('#categorySelect').change(function() {
        var tabId = $(this).val();
        $('.nav-tabs .nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');
        $('.nav-tabs [data-bs-target="#'+ tabId +'"]').addClass('active');
        $('#'+ tabId + '-tab-pane').addClass('show active');
        $('#'+ tabId + '-tab-pane').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');
        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: { 'category': tabId },
            success: function(response) {
                $('#'+ tabId + '-tab-pane').html($(response).find('#'+ tabId + '-tab-pane').html());
            },
            error: function() {
                $('#'+ tabId + '-tab-pane').html('<div class="alert alert-danger">Error loading products.</div>');
            }
        });
    });
});