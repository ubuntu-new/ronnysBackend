<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'August backery admin pannel';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>August backery = )</h1>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
               &nbsp;<ul class="nav flex-column">
                    <li class="nav-item">
                        <?= Html::a('About', ['about/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('User', ['user/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Products', ['goods/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Categories', ['categories/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('FAQ', ['faq/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Locations', ['locations/index']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Contact', ['Contact/index']) ?>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
