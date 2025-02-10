console.log ('log de banner.js');
document.addEventListener('DOMContentLoaded', function() {
   var banner = document.getElementById('banner-top');
   var btnCloseBanner = document.getElementById('btnCloseBanner');

   if (banner && btnCloseBanner) {
       if (sessionStorage.getItem('bannerClosed') !== 'true') {
           banner.style.display = 'block';
       } else {
           banner.style.display = 'none';
       }

       btnCloseBanner.addEventListener('click', function() {
           banner.style.display = 'none';
           sessionStorage.setItem('bannerClosed', 'true');
       });
   }
   
});