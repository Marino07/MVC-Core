<?php
/** @var $model \app\models\User */
?>
<h1>Login</h1>
<?php $form =  \app\core\form\Form::begin('',"post"); ?>
<?php echo $form->field($model,'email') ?>
<?php echo $form->field($model,'password')->passwordField()?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php echo \app\core\form\Form::end() ?>
<!--<form action="" method="post">
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" >
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" >
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" >
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" >
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> <!-->