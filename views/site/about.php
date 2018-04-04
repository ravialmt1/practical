<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Feedback</legend>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios1">Punctual to classes</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios1-0">
      <input type="radio" name="radios1" id="radios1-0" value="1" checked="checked">
      1
    </label> 
    <label class="radio-inline" for="radios1-1">
      <input type="radio" name="radios1" id="radios1-1" value="2">
      2
    </label> 
    <label class="radio-inline" for="radios1-2">
      <input type="radio" name="radios1" id="radios1-2" value="3">
      3
    </label> 
    <label class="radio-inline" for="radios1-3">
      <input type="radio" name="radios1" id="radios1-3" value="4">
      4
    </label>
  </div>
</div>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>