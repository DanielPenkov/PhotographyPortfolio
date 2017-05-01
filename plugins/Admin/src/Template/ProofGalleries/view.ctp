<?php
/**
  * @var \App\View\AppView $this
  */
use Cake\Routing\Router;

?>

<style>
    .bar {
        height: 18px;
        background: green;
    }

    .delete {
        background-color: #942a25!important;
        width: 100%;
        height: 20px;
        padding: 1rem 1.5rem 1.5rem 1.5rem;
        border-color:  #942a25!important; ;
    }

    .delete:hover{
        background-color: #942a25;
    }

    .delete:active{
        background-color: #942a25;
    }

</style>

<script type="text/javascript">
    var numberOfFiles = 0;
    var uploadedFiles = 0;
    $(function () {
        $('.delete').on('click', function () {
            $.ajax({
                url : '<?= Router::url(['controller' => 'proofGalleries', 'action' => 'deleteImage'])?>',
                type: "POST",
                dataType: "json",
                data : {
                    id: this.getAttribute('data-id')
                }
            }).success(function(res) {
                window.location.reload(false);
            });

        });

        $('#fileupload').on('change', function () {
            numberOfFiles =  this.files.length;
            $('#files-info').html(this.files.length);
        });

        // Initialize the jQuery File Upload widget:
        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: '/admin/proof_galleries/upload/' + '<?= $proofGallery->id?>',
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            },
            replaceFileInput:true,
            add: function (e, data) {
                $("#uploadBtn").on('click',function () {
                    data.submit();
                });
            },
            done: function () {
                uploadedFiles++;
                if (uploadedFiles === numberOfFiles) {
                    uploadedFiles = 0;
                    numberOfFiles = 0;
                    window.location.reload(false);
                }

            }
        });

    });
</script>

<div class="proofGalleries view large-9 medium-8 columns content" style="margin-left: auto; margin-right: auto;float: none;">
    <div>
        <h2><?= h($proofGallery->name) ?></h2>
        <table class="vertical-table">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($proofGallery->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Access Code') ?></th>
                <td><?= h($proofGallery->access_code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Number of allowed pictures') ?></th>
                <td><?= h($proofGallery->number_allowed) ?></td>
            </tr>
            <tr>
                <th scope="row">Link </th>

                <?php $url = Router::url(['plugin' => 'client', 'controller' => 'proof_gallery_images', 'action' => 'view', $proofGallery->id], true)?>

                <td><?= $this->Html->link($url, ['plugin' => 'client', 'controller' => 'proof_gallery_images', 'action' => 'view', $proofGallery->id]) ?></td>
            </tr>
        </table>
    </div>
    <div>
        <?= $this->JqueryFileUpload->loadCss(); ?>
        <?= $this->JqueryFileUpload->loadScripts(); ?>

        <table>
            <tr>
                <td>
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <button id="select-files">Select files...</button>
                    <input id="fileupload" type="file" name="files[]" multiple>
                </span>
                </td>

                <td style="font-size: 20px;color: darkgray; font-weight: bold;">
                    <span id="files-info">0</span>  <span style="">files selected</span>
                </td>

                <td style="text-align: right">
                    <button style="background-color:#116d76" id="uploadBtn" class="btn btn-success pull-right">Upload</button>
                </td>

            </tr>
        </table>

        <br><br><br>

        <div id="progress">
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>

    <div>
        <div>
            <h4 style="color: black"> <?= $this->request->query('selected') === 'true' ? __('Selected:') : 'Total' ?> <?=count($proofGallery->proof_gallery_images) ?>
                <small style="float:right; font-size: 1.0em; font-weight: bolder"> <?=$this->Html->link('All', [$proofGallery->id, '?' => ['selected' => 'false']])?></small>
                <small style="float:right; margin-right: 50px;font-size: 1.0em; font-weight: bolder"> <?=$this->Html->link('Selected', [$proofGallery->id, '?' => ['selected' => 'true']])?></small>
            </h4>
        </div>
        <?php if (!empty($proofGallery->proof_gallery_images)) :?>
            <?php foreach ($proofGallery->proof_gallery_images as $proof_gallery_image) : ?>
                <div style="width: 18%; display: inline-block; margin-bottom: 10px;">
                    <span style="font-size: 0.7em;"> <?=$proof_gallery_image->name ?> </span>
                    <img width="100%" src="<?= $proof_gallery_image->url?>">
                    <button data-id="<?= $proof_gallery_image->id?>" class="delete"> Delete</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>
