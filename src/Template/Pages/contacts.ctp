<div class="contact-container">
    <div class="contact-img">
        <?= $this->Html->image('contact.png')?>
    </div>

    <div class="contact-text" style="color:#333">
        <p class="contact-title" style="color:#333">  Hi there, I am Gerry</p>
        I was born in Bulgaria and after I graduated in Photography from The National Academy of Art in Sofia, I decided to move to Denmark.
        Currently I work as a freelance portrait & event photographer in Aalborg and Nørresundby. I love capturing and creating beautiful stories and I believe the pictures speak for themselves. You can ask me anything on my <a style="text-decoration: none;color:royalblue" href="https://www.facebook.com/gergana.stories" target="_blank">Facebook page</a>.
        <p style="line-height: 1.2;font-size:22px;font-weight:500; font-family: 'Quintessential';">Thanks for stopping by!</p>
        You can also buy some of my <a style="text-decoration: none;color:royalblue" href="http://gerganastories.com/landscapes" target="_blank">LANDSCAPE</a> photos printed, framed and ready to hang on your wall. My event portfolio is on <a style="text-decoration: none;color:royalblue" href="https://www.behance.net/gkurukyuvlieva" target="_blank">Behance</a>.
    </div>

    <div class="contact-icons">
        <a href="https://www.facebook.com/gergana.stories" target="_blank"> <span class="fa fa-facebook fa-4x social-icons"></span></a>
        <a href="https://www.behance.net/gkurukyuvlieva" target="_blank"><span class="fa fa-behance fa-4x social-icons"></span></a>
        <a href="https://www.instagram.com/kurukyuvlieva" target="_blank"><span class="fa fa-instagram fa-4x social-icons"></span></a>
        <a href="mailto:radiaciq@gmail.com" target="_top"><span class="fa fa-envelope fa-4x social-icons"></span></a>

    </div>
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>

<script>
    function myMap() {
        var myLatLng = {lat: 57.045698, lng: 9.927302};

        var map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 15,
            center: myLatLng
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxmXlpA61Xt4pcO1z01PMD_7REwv2JqdU&callback=myMap"></script>
