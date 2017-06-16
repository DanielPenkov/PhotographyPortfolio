<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Penkov">
    <meta name="description" content="Aalborg based freelance photographer
            specializing in different kinds of photography - portraits, family, maternity,
            weddings, babies and events." />
    <meta name="keywords" content="fotograf,photo, photography, Aalborg, Nørresundby, photographer, Gergana Kurukyuvlieva, Gergana, Fotograf i Aalborg, fotograf, fotografer, børnefotografer, foto, børnebilleder, fotografering børn, portræt, familier, Konfirmationer, CV, foto, bryllup, REPORTAGE ERHVERVSPORTRÆTTER, Fotograf I Nørresundby, portrait,photography, children, event, maternity, wedding, couples, cv, photo, landscape, confirmation, party, photographer, christening"/>
    <title>Gergana - Fotograf i Aalborg</title>
    <link rel="canonical" href="http://gerganastories.com/<?= $this->request->url . '/'?>">
    <?php if($this->Url->build(null) === '/portraits/cv-linkedin') { ?>
        <meta property="og:image" content="http://gerganastories.com//img/thumbnails/veronika_thumbnail.png" />
   <?php } ?>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css([
        'gallery.css',
        'menu.css',
        'ionicons.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
    ]) ?>
    <?= $this->Html->script([
        'jquery-2.2.2.min.js',
        'menu.js',
        'jquery.snow.min.1.0.js'
    ]) ?>
</head>
<body>
<script>
    $(function() {
        $(document).keydown(function(event){
            if(event.keyCode==123){
                return false;
            }
            else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
                return false;
            }
        });

        $(document).on("contextmenu",function(e){
            e.preventDefault();
        });


        var name = window.location.pathname;

        if (name.indexOf('home') > -1) {
            $('#home').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('landscapes') > -1) {
            $('#landscapes').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('portraits') > -1) {
            $('#portraits').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
            $('#portraitsSubmenu').css('display', 'block');
            if (name.indexOf('cv-linkedin') > -1) {
                $('#cv-linkedin a').css('color', 'black');
                $('#cv-linkedin a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('women') > -1) {
                $('#women a').css('color', 'black');
                $('#women a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('women') === -1 && name.indexOf('men') > -1) {
                $('#men a').css('color', 'black');
                $('#men a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('couples') > -1) {
                $('#couples a').css('color', 'black');
                $('#couples a').css('border-bottom', ' 1px solid #B00000');
            }
        } else if (name.indexOf('children') > -1) {
            $('#children').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
            $('#childrenSubmenu').css('display', 'block');

            if (name.indexOf('spring') > -1) {
                $('#spring a').css('color', 'black');
                $('#spring a').css('border-bottom', ' 1px solid #B00000');
            }

            if (name.indexOf('christmas') > -1) {
                $('#christmas a').css('color', 'black');
                $('#christmas a').css('border-bottom', ' 1px solid #B00000');
            }

            if (name.indexOf('studio') > -1) {
                $('#studio a').css('color', 'black');
                $('#studio a').css('border-bottom', ' 1px solid #B00000');
            }

            if (name.indexOf('clients-place') > -1) {
                $('#clients-place a').css('color', 'black');
                $('#clients-place a').css('border-bottom', ' 1px solid #B00000');
            }

        } else if (name.indexOf('maternity') > -1) {
            $('#maternity').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('business') > -1) {
            $('#business').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
            $('#businessSubmenu').css('display', 'block');

            if (name.indexOf('product-photography') > -1) {
                $('#product-photography a').css('color', 'black');
                $('#product-photography a').css('border-bottom', ' 1px solid #B00000');
            }

            if (name.indexOf('property-photography') > -1) {
                $('#properyy-photography a').css('color', 'black');
                $('#property-photography a').css('border-bottom', ' 1px solid #B00000');
            }

            if (name.indexOf('other-business') > -1) {
                $('#other-business a').css('color', 'black');
                $('#other-business a').css('border-bottom', ' 1px solid #B00000');
            }
        } else if (name.indexOf('projects') > -1) {
            $('#projects').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('contacts') > -1) {
            $('#contacts').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('events') > -1) {
            $('#events').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
            $('#eventsSubmenu').css('display', 'block');
            if (name.indexOf('public_events') > -1) {
                $('#public_events a').css('color', 'black');
                $('#public_events a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('party') > -1) {
                $('#party a').css('color', 'black');
                $('#party a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('confirmation') > -1) {
                $('#confirmation a').css('color', 'black');
                $('#confirmation a').css('border-bottom', ' 1px solid #B00000');
            }
            if (name.indexOf('christening') > -1) {
                $('#christening a').css('color', 'black');
                $('#christening a').css('border-bottom', ' 1px solid #B00000');
            }
        } else if (name.indexOf('weddings') > -1) {
            $('#weddings').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        }
    });
</script>

<div class="header-logo">
    <p class="header-title"> <?=__("GERGANA KURUKYUVLIEVA")?></p>
    <H1 style="font-weight: 300" class="header-text"><span class="menu-line fa fa-camera-retro"></span> <?=("Fotograf i Aalborg")?></H1>
    <div class="menu">
        <ul style="width:150px">
            <li style="width:50px"><a class="menu-icon" href="https://www.instagram.com/kurukyuvlieva/" target="_blank"><span class="fa fa-instagram"></span></a></li>
            <li style="width:50px"><a class="menu-icon" href="https://www.behance.net/gkurukyuvlieva" target="_blank"><span class="fa fa-behance"</span></a></li>
            <li style="width:50px"> <a class="menu-icon" href="https://www.facebook.com/gergana.stories" target="_blank"><span class="fa fa-facebook"></span></a></li>
        </ul>
    </div>
</div>
<div class="menu-container">
    <div class="menu">
        <ul>
            <li id="home">
                <?= $this->Html->link('HOME', ['controller' => 'Home', 'action' => 'index']); ?>
            </li>

            <li id ='portraits'>
                <?= $this->Html->link('PORTRAITS', '/portraits'); ?>
                <ul id="portraitsSubmenu">
                    <li id ='cv-linkedin'>
                        <?= $this->Html->link('CV - LinkedIn', '/portraits/cv-linkedin'); ?>
                        <ul></ul>
                    </li>
                    <li id="women">
                        <?= $this->Html->link('WOMEN', '/portraits/women'); ?>
                        <ul></ul>
                    </li>
                    <li id="men">
                        <?= $this->Html->link('MEN', '/portraits/men'); ?>
                        <ul></ul>
                    </li>
                    <li id="couples">
                        <?= $this->Html->link('COUPLES', '/portraits/couples'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id="children">
                <?= $this->Html->link('CHILDREN', '/children'); ?>
                <ul id="childrenSubmenu">
                    <li id="spring">
                        <?= $this->Html->link('SPRING SESSIONS', '/children/spring'); ?>
                        <ul></ul>
                    </li>
                    <li id="christmas">
                        <?= $this->Html->link('CHRISTMAS SESSIONS', '/children/christmas'); ?>
                        <ul></ul>
                    </li>

                    <li id="studio">
                        <?= $this->Html->link('AT MY STUDIO', '/children/studio'); ?>
                        <ul></ul>
                    </li>
                    <li id="clients-place">
                        <?= $this->Html->link('AT CLIENTS HOME', '/children/clients-place'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id="weddings">
                <?= $this->Html->link('WEDDINGS', '/weddings'); ?>
            </li>
            <li id = 'maternity'>
                <?= $this->Html->link('MATERNITY', '/maternity'); ?>
            </li>

            <li id ='business'>
                <?= $this->Html->link('BUSINESS', '/business'); ?>
                <ul id="businessSubmenu">
                    <li id ='product-photography'>
                        <?= $this->Html->link('PRODUCT PHOTOGRAPHY', '/business/product-photography'); ?>
                        <ul></ul>
                    </li>
                    <li id="property-photography">
                        <?= $this->Html->link('PROPERTY PHOTOGRAPHY', '/business/property-photography'); ?>
                        <ul></ul>
                    </li>
                    <li id="other-business">
                        <?= $this->Html->link('OTHER', '/business/other-business'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id ='events'>
                <?= $this->Html->link('EVENTS', '/events'); ?>
                <ul id="eventsSubmenu">
                    <li id="public_events">
                        <?= $this->Html->link('PUBLIC EVENTS', '/events/public_events'); ?>
                        <ul></ul>
                    </li>
                    <li id="party">
                        <?= $this->Html->link('PARTY', '/events/party'); ?>
                        <ul></ul>
                    </li>
                    <li id="confirmation">
                        <?= $this->Html->link('CONFIRMATION', '/events/confirmation'); ?>
                        <ul></ul>
                    </li>
                    <li id="christening">
                        <?= $this->Html->link('CHRISTENING', '/events/christening'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id="landscapes">
                <?= $this->Html->link('LANDSCAPES', '/landscapes'); ?>
            </li>
            <li id="contacts">
                <?= $this->Html->link('CONTACTS', '/contacts'); ?>
            </li>
            <li id="projects">
                <?= $this->Html->link('PROJECTS', '/projects'); ?>
            </li>
        </ul>
    </div>
</div>
<div class="main-container">
    <?= $this->fetch('content') ?>
</div>

<div class="footer">
    <div class="copyright">
        All material © copyright by Gergana Kurukyuvlieva
        <H2 style="font-weight: 300" ><span class="menu-line fa fa-camera-retro"></span> <?=("Fotograf i Aalborg")?></H2>
        <p>
            All rights reserved. Site by <?= $this->Html->link('Daniel Penkov', 'http://danielpenkov.eu'); ?>
        </p>
    </div>
</div>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-77130094-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>