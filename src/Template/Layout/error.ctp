<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content=" ">
    <meta name="description" content="enter any meta description here" />
    <meta name="keywords" content="enter any meta keyword here" />

    <title>Geri Stories</title>
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
        }
    });
</script>
<div class="header-logo">
    <p class="header-title"> <?=__("GERGANA KURUKYUVLIEVA")?></p>
    <p class="header-text"><span class="menu-line fa fa-camera-retro"></span> <?=("Photographer in Sofia")?></p>
</div>
<div class="menu-container">
    <div class="menu">
        <ul>
            <li id="home">
                <?= $this->Html->link('HOME', ['controller' => 'Home', 'action' => 'index']); ?>
            </li>
            <li id="landscapes">
                <?= $this->Html->link('LANDSCAPES', '/landscapes'); ?>
            </li>
            <li id ='portraits'>
                <?= $this->Html->link('PORTRAITS', '/portraits'); ?>
                <ul>
                    <li>
                        <?= $this->Html->link('CV', '/portraits/cv'); ?>
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
            </li>
            <li id = 'maternity'>
                <?= $this->Html->link('MATERNITY', '/maternity'); ?>
            </li>
            <li id = 'business'>
                <?= $this->Html->link('BUSINESS', '/business'); ?>
            </li>
            <li id = 'projects'>
                <?= $this->Html->link('PROJECTS', '/projects'); ?>
            </li>
            <li id="contacts">
                <?= $this->Html->link('CONTACTS', '/contacts'); ?>
            </li>
            <li class="menu-item-right"><a class="menu-icon" href="https://www.instagram.com/kurukyuvlieva/" target="_blank"><span class="fa fa-instagram"></span></a></li>
            <li class="menu-item-right"><a class="menu-icon" href="https://www.behance.net/gkurukyuvlieva" target="_blank"><span class="fa fa-behance"</span></a></li>
            <li class="menu-item-right"><a class="menu-icon" href="https://www.facebook.com/gergana.stories" target="_blank"><span class="fa fa-facebook"></span></a></li>
        </ul>
    </div>
</div>
 <style type="text/css">
         body {font-size:14px; color:#777777; font-family:arial; text-align:center;}
        h1 {font-size:180px; color:#99A7AF;}
        h2 {color: #DE6C5D; font-family: arial; font-size: 20px; font-weight: bold; letter-spacing: -1px; margin: -3px 0 39px;}
        a:link {color: #34536A;}
        a:visited {color: #34536A;}
        a:active {color: #34536A;}
        a:hover {color: #34536A;}
    </style>

 <div class="col-md-12 text-center">
         <h1 class="text-center">404</h1>
         <h2>Not Found</h2>
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