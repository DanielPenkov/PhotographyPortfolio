<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slider({ indicators:false,transition:2000, interval:2000});
    });
</script>

<div class="front-icons col-sm-12">
    <header id="header">
        <h1>GERGANA STORIES</h1>
        <nav>
            <ul>
                <li><a href="https://www.facebook.com/gergana.stories" class="icon fa-facebook" target="_blank"><span class="label"></span></a></li>
                <li><a href="https://www.behance.net/gkurukyuvlieva" class="icon fa-behance" target="_blank"><span class="label"></span></a></li>
                <li><a href="https://www.instagram.com/kurukyuvlieva/" class="icon fa-instagram" target="_blank"><span class="label"></span></a></li>

        </nav>
    </header>
    <div class="col-sm-12" id="enter-button">
        <div class="text-center">
            <?= $this->Html->link(
                '<span class="fa fa-3x fa-sign-in"></span>',
                ['controller' => 'Home', 'action' => 'index'],
                ['id' => 'enter-button-icon', 'class' => 'label', 'escape' => false]
            ); ?>
        </div>
    </div>
</div>
<div class="slider fullscreen">
    <ul class="slides">
        <li>
            <?= $this->Html->image('front/aalborg_fotograf.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/aalborg_portræt_fotograf.jpg') ?>
        </li>

        <li>
            <?= $this->Html->image('front/børn_fotograf.jpg') ?>
        </li>

        <li>
            <?= $this->Html->image('front/børns_fotograf.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/børns_fotograf_aalborg.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/bryllup_aalborg.jpg') ?>
        </li>

        <li>
            <?= $this->Html->image('front/portræt_fotograf.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/solnedgang_aalborg.jpg') ?>
        </li>
    </ul>
</div>
