document.addEventListener('DOMContentLoaded', function() {
   var banner = document.getElementById('banner-top');
   var btnCloseBanner = document.getElementById('btnCloseBanner');

   if (banner && btnCloseBanner) {
       if (sessionStorage.getItem('bannerClosed') == 'true') {
           banner.style.display = 'none';
        }

       btnCloseBanner.addEventListener('click', function() {
           sessionStorage.setItem('bannerClosed', 'true');
       });
   }
   
});