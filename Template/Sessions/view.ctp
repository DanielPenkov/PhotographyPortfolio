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
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga1.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga2.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga3.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga4.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga5.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga6.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>
                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga7.jpg',[
                        'class' => 'fill'
                    ]) ?>
                </li>

                <li>
                    <?= $this->Html->image('sessions/business_yoga/Business_yoga8.jpg',[
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