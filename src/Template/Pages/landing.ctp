<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slider({ indicators:false,transition:2000, interval:3000});
    });
</script>

<div class="front-icons col-sm-12">
    <header id="header">
        <h1>GERGANA STORIES</h1>
        <nav>
            <ul>
                <li><a href="https://www.facebook.com/gergana.stories" class="icon fa-facebook" target="_blank"><span class="label"></span></a></li>
                <li><a href="https://www.behance.net/gkurukyuvlieva" class="icon fa-behance" target="_blank"><span class="label"></span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label"></span></a></li>

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
<!--        <li>-->
<!--           --><?//= $this->Html->image('front/1/child-1-page-jpg-very-high-304kb.jpg') ?>
<!--        </li>-->
<!--        <li>-->
<!--            --><?//= $this->Html->image('front/3/peizaj-jpg-high-180kb.jpg') ?>
<!--        </li>-->
        <li>
            <?= $this->Html->image('front/5/portret-1-page-jpg-very-high-420-kb.jpg') ?>
        </li>
    </ul>
</div>
