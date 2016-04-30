<!DOCTYPE html>
<html lang="en">
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
        'demo.css',
        'style_common.css',
        'style1.css',
        'menu.css',
        'ionicons.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'

    ]) ?>
<!--'https://fonts.googleapis.com/css?family=Abel'-->
    <?= $this->Html->script([
        'jquery-2.2.2.min.js',
        'menu.js'
    ]) ?>

</head>
<body>

<div class="header-logo">
    <p style="font-size:30px;">      GERGANA KURUKYUVLIEVA</p>





    <p style="opacity: 0.5; color: black;font-size: 20px;font-family: 'Quintessential', cursive;"><span class="menu-line fa fa-camera-retro"></span> Photographer in Aalborg and Norresunby  </p>
    </div>
<div class="alternative-icons">

    <a href="#"> <span class="fa fa-facebook"> </span></a>
    <a href="#"> <span class="fa fa-facebook"> </span></a>
    <a href="#"> <span class="fa fa-facebook"> </span></a>
    <a href="#"> <span class="fa fa-facebook"> </span></a>

</div>
<div class="menu-container">

    <div class="menu">
        <ul>
            <li><a href="#"> HOME</a></li>
            <li><a href="#">LANDSCAPES</a>
                <ul>
                    <li><a href="#">Today</a></li>
                    <li><a href="#">Calendar</a></li>
                    <li><a href="#">Sport</a></li>
                </ul>
            </li>
            <li><a href="#">PORTRAITS</a></li>
            <li><a href="#">CHILDREN</a></li>
            <li><a href="#">MATERNITY</a></li>
            <li><a href="#">BUSINESS</a>
                <ul>
                    <li><a href="#">School</a>
                        <ul>
                        </ul>
                    </li>
                    <li><a href="#">Study</a>
                        <ul>

                        </ul>
                    </li>
                    <li><a href="#">Research</a>
                        <ul>

                        </ul>
                    </li>
                    <li><a href="#">Something</a>
                        <ul>

                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">PROJECTS</a></li>
            <li><a href="#">CONTACT</a></li>


            <li class="menu-item-right"><a class="menu-icon" href="http://marioloncarek.com"><span class="fa fa-facebook"></span> </a>
            </li>
            <li class="menu-item-right"><a class="menu-icon" href="http://marioloncarek.com"><span class="fa fa-twitter"></span> </a>
            </li>
            <li class="menu-item-right"><a class="menu-icon" href="http://marioloncarek.com"><span class="fa fa-envelope-o"></span> </a>
            </li>
        </ul>
    </div>

</div>

<?= $this->fetch('content') ?>

</body>
</html>