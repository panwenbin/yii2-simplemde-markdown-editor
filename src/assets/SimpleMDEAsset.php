<?php
/**
 * @author: Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\simplemde\assets;


use yii\web\AssetBundle;

class SimpleMDEAsset extends AssetBundle
{
    public $sourcePath = '@bower/simplemde/dist';
    public $js = [
        'simplemde.min.js'
    ];
    public $css = [
        'simplemde.min.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}