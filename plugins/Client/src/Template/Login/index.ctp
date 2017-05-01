<style>
    html {
        height: 100%;
    }
    body {
        min-height: 100%;
        background-image: url("/img/login-background.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .login-container {
        margin-top: 10%;
        background-color: white;
    }

</style>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 login-container">
        <div class="form-container">
            <?= $this->Form->create(null);?>
            <div class="col-xs-12 text-center">
                <h2 style="font-family: 'Cinzel';color: #B00000;margin-bottom: 50px;">GERGANASTORIES</h2>
                <span style="color:red; font-weight: bolder;">
                    <?= $this->Flash->render() ?>
                </span>
            </div>
            <div class="form-group text-center">
                <?= $this->Form->control('code', [
                    'class' => 'form-control',
                    'placeholder' => 'Enter you code here',
                    'label' => false
                ]);?>
                <br>
                <?= $this->Form->button('<span class="glyphicon glyphicon-log-in"></span>' . ' LOGIN', ['class' => 'btn btn-lg btn-success', 'escape' => false]);?>
            </div>
            <?= $this->Form->end(); ?>
        </div>


    </div>
</div>