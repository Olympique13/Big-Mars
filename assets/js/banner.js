document.addEventListener('DOMContentLoaded', function() {
   var banner = document.getElementById('banner-top');
   var btnCloseBanner = document.getElementById('btnCloseBanner');

   if (banner && btnCloseBanner) {
       if (sessionStorage.getItem('bannerClosed') == 'true') {
            // setTimeout(() => {
                banner.style.display = 'none';
            // }, 500)
           
        }

       btnCloseBanner.addEventListener('click', function() {
           sessionStorage.setItem('bannerClosed', 'true');
       });
   }
   
});