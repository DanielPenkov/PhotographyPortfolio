<?php
use Cake\Routing\Router;
?>

<style>
    .next{
        text-align: center;
        margin-top: 100px;
        margin-bottom: 50px;
        color:white;
    }
    .next a{
        color:white;
    }
    #infscr-loading {
        text-align: center;
    }
    #infscr-loading img {
        text-align: center;
        padding-top: 20px!important;
        padding-bottom: 20px!important;
    }
    .img-responsive {
    }

    #pictures-container{
        margin-top: 100px;
    }
</style>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">GERGANASTORIES</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-picture"></span>' . ' All Pictures',
                        ['controller' => 'ProofGalleryImages', 'action' => 'view', $gallery->id],
                    ['escape' => false]
                    )?>
                </li>
                <li>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-heart"></span>' . ' Selected Pictures',
                        ['controller' => 'ProofGalleryImages', 'action' => 'view', $gallery->id, '?' => ['selected' => 'true']],
                        ['escape' => false]
                    )?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-header">
                    <a style="font-size: 1.5em"> Selected pictures: <span class="label label-warning" id="selected-pictures-counter"><?=$count?></span></a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container clearfix">
    <div class="row text-center" id="loading-page" style="margin-top: 20%;">
        <img src="/img/loading.gif">
    </div>
    <div class="row hidden" id="pictures-container">
    <?php foreach ($pictures as $picture) : ?>
        <div class="picture-item col-lg-4 col-md-6 col-sm-12" style="margin-bottom: 20px;">

            <a href="<?= '/glide' . $picture->url . '?w=600&mark=logo-gerganastories.png&markw=600&marky=50'?>"
               data-lightbox="image-1">
                <img class="img-responsive" src="<?= '/glide' . $picture->url . '?mark=logo-gerganastories.png&markw=500'?>">
            </a>

            <div id="<?=$picture->id?>"
                 class="col-sm-12 btn <?=($picture->approved) ? 'btn-success' : 'btn-default' ?> select-picture"
                 data-selected=  <?=($picture->approved) ? 'true' : 'false' ?>
                 data-id="<?=$picture->id?>">
                <span style="font-size: 1.3em" class="glyphicon glyphicon-heart-empty"></span> Love it</div>
        </div>
    <?php endforeach; ?>
</div>
    <div class="row">
        <?php
        echo $this->Paginator->next();
        ?>
    </div>
</div>
<script>
    $(window).on("load", function() {
       $('#pictures-container').removeClass('hidden');
        $('#loading-page').addClass('hidden');
    });

    $(function(){
        $(document).keydown(function(event){

            if (event.keyCode == 44) {
                alert("The 'print screen' key is pressed");
            }

            if(event.keyCode==123){
                return false;
            }
            else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
                return false;
            }
        });

        $('img').on('dragstart', function(event) { event.preventDefault(); });

        $(document).on("contextmenu",function(e){
            e.preventDefault();
        });


        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel': false
        });

        var $container = $('#pictures-container');

        $('body').on('click', '.select-picture', function () {

            var id = this.getAttribute('data-id');
            var numberOfSelected = Number($('#selected-pictures-counter').html());
            var allowed = '<?= $gallery->number_allowed?>';


                if (this.getAttribute('data-selected') === 'true') {
                    this.setAttribute('data-selected', 'false');
                    $('#' + id).removeClass('btn-success');
                    $('#' + id).addClass('btn-default');
                    updateSelected(id);
                    if (numberOfSelected !== 0) {
                        $('#selected-pictures-counter').html(numberOfSelected - 1);
                    }

                } else {
                    if (numberOfSelected < allowed) {
                        this.setAttribute('data-selected', 'true');
                        $('#' + id).removeClass('btn-default');
                        $('#' + id).addClass('btn-success');
                        $('#selected-pictures-counter').html(numberOfSelected + 1);
                        updateSelected(id);
                    }
                }
        });

        $container.infinitescroll({
                navSelector  : '.next',    // selector for the paged navigation
                nextSelector : '.next a',  // selector for the NEXT link (to page 2)
                itemSelector : '.picture-item',     // selector for all items you'll retrieve
                debug         : false,
                dataType      : 'html',
                loading: {
                    img: '/img/loading.gif',
                    msg: '',
                    msgText: '',
                    finished: undefined,
                    finishedMsg: 'All pictures are loaded!',
                    speed:1000
                }
            }
        );
    });


    function updateSelected (id) {
        $.ajax({
            url : '<?= Router::url(['controller' => 'proofGalleryImages', 'action' => 'select'])?>',
            type: "POST",
            dataType: "json",
            data : {
                id: id
            }
        }).success(function(res) {});
    }

</script>
