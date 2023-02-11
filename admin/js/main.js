$(document).ready(function () {
        $('#main_content').load('../sections/dashboard.php')
    }),
    $('nav a').on('click', function () {
        $('nav a').removeClass('active'),
            $(this).addClass('active')
    })

$('.status nav a').on('click', function () {
    $('.status nav a').removeClass('active'),
        $(this).addClass('active')
})