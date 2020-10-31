$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('.sidebar-fixed').toggleClass('active');
    });

    $('.sidebar-close').on('click', function () {
        $('.sidebar-fixed').toggleClass('active');
    });
    
});
