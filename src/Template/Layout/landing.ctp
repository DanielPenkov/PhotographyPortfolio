<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Daniel Penkov">
    <meta name="description" content="Aalborg based freelance photographer
            specializing in different kinds of photography - portraits, family, maternity,
            weddings, babies and events. Please take a moment to look through my portfolio and
            decide if we'll be a great fit for each other." />
    <meta name="keywords" content="fotograf, photo, photography, Aalborg, Nørresundby, photographer, Gergana Kurukyuvlieva, Gergana, Fotograf i Aalborg, fotograf, fotografer, børnefotografer, foto, børnebilleder, fotografering børn, portræt, familier, Konfirmationer, CV, foto, bryllup, REPORTAGE ERHVERVSPORTRÆTTER, Fotograf I Nørresundby, portrait,photography, children, event, maternity, wedding, couples, cv, photo, landscape, confirmation, party, photographer, christening"/>
    <title>Gergana - Fotograf i Aalborg</title>
    <meta name="google-site-verification" content="BoAFuGdGetn3FJ0dmwkhDPx6TwOCAGCxOLLM9oAlQz4"/>

    
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'landing.css',
        'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
    ]) ?>

    <?= $this->Html->script([
        'jquery-2.2.2.min.js',
        'uikit.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'
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
    });
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-77130094-1', 'auto');
    ga('send', 'pageview');
</script>
<?= $this->fetch('content') ?>

</body>
</html>