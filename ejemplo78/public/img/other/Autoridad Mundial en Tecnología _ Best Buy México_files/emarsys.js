var ScarabQueue = ScarabQueue || [];
(function (subdomain, id) {
    if (document.getElementById(id))
        return;
    var js = document.createElement('script');
    js.id = id;
    js.src = subdomain + '.scarabresearch.com/js/17A476D76959E253/scarab-v2.js';
    var fs = document.getElementsByTagName('script')[0];
    fs.parentNode.insertBefore(js, fs);
})('https:' == document.location.protocol ? 'https://recommender' : 'http://cdn', 'scarab-js-api');