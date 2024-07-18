jQuery(document).ready(function($) {
    $('#resource-filter-form').on('submit', function(e) {
        e.preventDefault();

        var type = $('#resource-type').val();
        var topic = $('#resource-topic').val();
        var keyword = $('#resource-keyword').val();

        $.ajax({
            url: rfp_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'rfp_filter_resources',
                type: type,
                topic: topic,
                keyword: keyword
            },
            success: function(response) {
                $('#resource-list').html(response);
            }
        });
    });
});
