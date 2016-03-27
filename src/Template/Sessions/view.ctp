<script type="text/javascript">

    $(document).ready(function() {
        $('.controls').hide();

        $(".wrap").hover(function(){
            $('.controls').show();
        });

        $(".wrap").mouseleave(function(){
            $('.controls').hide();
        });

    });

</script>


<div class="pagespan container">

    <div class="wrap">
        <div class="frame crazy" id="crazy">
            <ul class="slidee">
                <li>
                    <?= $this->Html->image('sessions/test/peizaj-1-168-kb-jph-high.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/portret-4-130kb-jpg-maximum.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/peizaj-2-107kb-jpg-very-high.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/peizaj-3-127kb-jpg-very-high.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/portret-3-171kb-jpg-maximum.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/peizaj-4-192kb-jpg-high.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/test/portret-2-171-kb-jpg-maximum.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
            </ul>
        </div>
        <div class="controls center">
            <button class="btn prevPage"><span class="fa fa-chevron-left"></span> </button>
            <button class="btn nextPage"><span class="fa fa-chevron-right"></span></button>
        </div>

        <div class="scrollbar">
            <div class="handle">
                <div class="mousearea">
                </div>
            </div>
        </div>

    </div>
</div>