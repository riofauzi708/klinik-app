<?php
$this->pageTitle = Yii::app()->name . ' - Home';
?>

<div class="home-container" style="text-align: center; margin-top: 50px;">
    <h1>Welcome to Our Website</h1>
    
    <!-- Adding a banner image -->
    <div style="margin-bottom: 30px;">
    <img src="<?php echo Yii::app()->baseUrl; ?>/css/pelayanan.jpg" alt="Welcome Banner" style="max-width: 40%; height: auto;">

    </div>

    <!-- Main content -->
    <p style="font-size: 18px;">We are delighted to have you here. Please <a href="<?php echo $this->createUrl('site/login'); ?>" style="color: #2a6496; text-decoration: underline;">login</a> to access more features.</p>
    
    <!-- Adding a call-to-action button -->
    <div style="margin-top: 20px;">
        <a href="<?php echo $this->createUrl('site/login'); ?>" class="btn btn-primary" style="padding: 10px 20px; font-size: 16px;">Login Now</a>
    </div>
</div>

<!-- Custom styling for the home page -->
<style>
    .home-container {
        font-family: Arial, sans-serif;
        color: #333;
    }
    .btn-primary {
        background-color: #2a6496;
        border: none;
        color: white;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #204d74;
    }
</style>
