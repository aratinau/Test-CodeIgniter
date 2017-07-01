
<div class="jumbotron">
    <?php echo validation_errors(); ?>
    <?php
    echo form_open('/', array('class' => 'form-horizontal')); ?>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="<?php if (isset($user_update)) { echo $user_update['name']; } ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">Prénom</label>
        <div class="col-sm-10">
            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Prénom" value="<?php if (isset($user_update)) { echo $user_update['firstname']; } ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php if (isset($user_update)) { echo $user_update['email']; } ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php if(isset($user_update)) { ?>
                <input type="hidden" name="id" value="<?php echo $user_update['id']; ?>">
                <button type="submit" class="btn btn-primary">Modifier ce profil</button>
            <?php } else { ?>
                <button type="submit" class="btn btn-default">Créer son profil</button>
            <?php } ?>
        </div>
    </div>
</form>
</div>