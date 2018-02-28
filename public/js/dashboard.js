console.log('Dashboard ho');

$(document).ready(function() {
    var url = window.location;
    jQuery('ul.nav a[href="' + url + '"]').parent().addClass('active');
    jQuery('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});