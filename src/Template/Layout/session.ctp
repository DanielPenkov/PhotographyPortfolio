<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Penkov">
    <meta name="description" content="Aalborg based photographer
            specializing in different kinds of photography - portraits, family, maternity,
            weddings, babies and events." />
    <meta name="keywords" content="fotograf,photo, photography, Aalborg, Nørresundby, photographer, Gergana Kurukyuvlieva, Gergana, Fotograf i Aalborg, fotograf, fotografer, børnefotografer, foto, børnebilleder, fotografering børn, portræt, familier, Konfirmationer, CV, foto, bryllup, REPORTAGE ERHVERVSPORTRÆTTER, Fotograf I Nørresundby, portrait,photography, children, event, maternity, wedding, couples, cv, photo, landscape, confirmation, party, photographer, christening"/>
    <title>Gergana - Fotograf i Aalborg</title>
    <link rel="canonical" href="http://gerganastories.com/<?= $this->request->url . '/'?>">

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'horizontal.css',
        'menu.css',
        'ionicons.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
    ]) ?>

    <?= $this->Html->script([
        'jquery-2.2.2.min.js',
        'sly.js',
        'menu.js',
        'plugin.js',
        'horizontal.js'
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
        } else if (name.indexOf('children') > -1) {
            $('#children').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('maternity') > -1) {
            $('#maternity').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('business') > -1) {
            $('#business').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('projects') > -1) {
            $('#projects').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('contacts') > -1) {
            $('#contacts').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('events') > -1) {
            $('#events').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('weddings') > -1) {
            $('#weddings').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
        } else if (name.indexOf('dogs') > -1) {
            $('#dogs').css({ "background-color": '#f0f0f0', "text-decoration": "underline"});
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
                <ul>
                    <li>
                        <?= $this->Html->link('CV - LinkedIn', '/portraits/cv-linkedin'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('WOMEN', '/portraits/women'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('MEN', '/portraits/men'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('COUPLES', '/portraits/couples'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id="children">
                <?= $this->Html->link('CHILDREN', '/children'); ?>
                <ul>
                    <li>
                        <?= $this->Html->link('SPRING SESSIONS', '/spring'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('CHRISTMAS SESSIONS', '/christmas'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('AT MY STUDIO', '/children/studio'); ?>
                        <ul></ul>
                    </li>
                    <li>
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
            <li id = 'business'>
                <?= $this->Html->link('BUSINESS', '/business'); ?>

                <ul >
                    <li>
                        <?= $this->Html->link('PRODUCT PHOTOGRAPHY', '/business/product-photography'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('PROPERTY PHOTOGRAPHY', '/business/property-photography'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('OTHER', '/business/other-business'); ?>
                        <ul></ul>
                    </li>
                </ul>
            </li>
            <li id ='events'>
                <?= $this->Html->link('EVENTS', '/events'); ?>
                <ul>
                    <li>
                        <?= $this->Html->link('PUBLIC EVENTS', '/events/public_events'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('PARTY', '/events/party'); ?>
                        <ul></ul>
                    </li>
                    <li>
                        <?= $this->Html->link('CONFIRMATION', '/events/confirmation'); ?>
                        <ul></ul>
                    </li>
                    <li>
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
            <li id="dogs">
                <?= $this->Html->link('DOGS', '/dogs'); ?>
            </li>
        </ul>
    </div>
</div>

<?= $this->fetch('content') ?>

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