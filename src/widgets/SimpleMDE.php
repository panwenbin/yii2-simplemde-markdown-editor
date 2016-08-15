<?php
/**
 * @author: Pan Wenbin <panwenbin@gmail.com>
 */

namespace panwenbin\yii2\simplemde\widgets;


use panwenbin\yii2\simplemde\assets\SimpleMDEAsset;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class SimpleMDE extends InputWidget
{
    public $mdeOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        SimpleMDEAsset::register($this->getView());
        $this->registerClientScript();
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
    }

    /**
     * Registers the needed JavaScript.
     */
    public function registerClientScript()
    {
        $this->options['element'] = new JsExpression("jQuery('#{$this->options['id']}')[0]");
        $mdeOptions = Json::encode($this->mdeOptions);
        $mdeName = Inflector::classify('editor' . $this->options['id']);
        $js = "var {$mdeName} = new SimpleMDE({$mdeOptions});";
        $this->getView()->registerJs($js);
    }
}