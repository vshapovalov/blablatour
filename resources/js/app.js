// убираем все H1, кроме одного (в футере) для SEO
$(window).load(function() {
    $('h1').each(function() {
        if (this.className != 'footer_brand'){
            console.log(this.className);
            let clName = 'class="' + (this.className ? this.className : 'h1toh2') + '"';
            $(this).replaceWith('<h2 ' + clName + '> ' + $(this).html() + ' </h1>');
        }    
 });
});