<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slider({ indicators:false,transition:2000, interval:3000});
    });
</script>

<div class="proba col-sm-12" style="z-index: 9;position: absolute;top: 20%;">

    <header id="header">
        <h1>Gergana Kurukyuvlieva</h1>
        <nav style="background-color:transparent; box-shadow:none;margin:auto;width:550px">
            <ul>
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
            </ul>
        </nav>
    </header>
    <div class="col-sm-12" id="enter-button">
        <div class="text-center">
<!--            <a id="enter-button-icon" href="#"><span class="label"> </span>-->
<!--            </a>-->

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
           <?= $this->Html->image('front/1/child-1-page-jpg-very-high-304kb.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/3/peizaj-jpg-high-180kb.jpg') ?>
        </li>
        <li>
            <?= $this->Html->image('front/5/portret-1-page-jpg-very-high-420-kb.jpg') ?>
        </li>
    </ul>
</div>
