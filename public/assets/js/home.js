$(document).ready(function(){
    var $navbar = $('.navbar');
    var $navlink = $('.nav-link');
    var $vline = $('.v-line');

    $navbar.toggleClass('', $(document).scrollTop() < $navbar.height());
    $navbar.toggleClass('scrolled', $(document).scrollTop() > $navbar.height());

    $navlink.toggleClass('', $(document).scrollTop() < $navbar.height());
    $navlink.toggleClass('scrolled', $(document).scrollTop() > $navbar.height());

    $vline.toggleClass('', $(document).scrollTop() < $navbar.height());
    $vline.toggleClass('black', $(document).scrollTop() > $navbar.height());

    $(document).scroll(function(){
        $navbar.toggleClass('', $(document).scrollTop() < $navbar.height());
        $navbar.toggleClass('scrolled', $(document).scrollTop() > $navbar.height());

        $navlink.toggleClass('', $(document).scrollTop() < $navbar.height());
        $navlink.toggleClass('scrolled', $(document).scrollTop() > $navbar.height());

        $vline.toggleClass('', $(document).scrollTop() < $navbar.height());
        $vline.toggleClass('black', $(document).scrollTop() > $navbar.height());
    });
});