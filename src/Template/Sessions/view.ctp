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


<div class="overlay">
    <div class="icon">
        <center>
            <i> <?= $this->Html->image('loading.gif') ?></i>
        </center>
    </div>
</div>

<div class="pagespan container">

    <div class="wrap">
        <div class="frame crazy" id="crazy">
            <ul class="slidee">
                <?php foreach ($pictures as $picture) { ?>
                    <li>
                        <?= $this->Html->image($picture->url,['class' => 'fill']) ?>
                    </li>
                <?php } ?>
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