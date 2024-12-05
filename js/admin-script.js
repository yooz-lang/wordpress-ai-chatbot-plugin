jQuery(document).ready(function($) {
    $('.my-color-field').wpColorPicker();
});
jQuery(document).ready(function($) {
    $('.my-color-field').wpColorPicker();

    // تغییر تب‌ها با کلیک
    $('.nav-tab').click(function(e) {
        e.preventDefault();
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        
        $('.tab-content').hide();
        var activeTab = $(this).attr('href');
        $(activeTab).fadeIn();
    });
});
