<?php
namespace muhiddin\select;

use yii\bootstrap\InputWidget;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\web\View;
use muhiddin\select\MultiSelectAsset;

class MultiSelect extends InputWidget
{
    public $data;
    public $id = 'multi-select';
    public $pluginOptions = '';
    public $selectAll = false;
    public $deselectAll = false;

    public function run()
    {
        if (!isset($this->options['css'])) {
            $this->options['id'] = $this->id;
        }
        if ($this->selectAll)
            echo Html::a(\Yii::t('backend', 'select all'), '#', ['id' => $this->id . '-select-all']);

        if ($this->deselectAll)
            echo Html::a(\Yii::t('backend', 'deselect all'), '#', ['id' => $this->id . '-deselect-all']);

        MultiSelectAsset::register($this->getView());
        if (isset($this->model)) {
            $this->pluginOptions[] = $this->model->{$this->attribute};
            echo Html::activeDropDownList($this->model, $this->attribute, $this->data, $this->options);
            echo Html::error($this->model, $this->attribute);
        } else {
            $this->pluginOptions[] = $this->value;
            echo Html::dropDownList($this->name, $this->value, $this->data, $this->options);
        }

        $this->registerJsScript();
    }

    public function registerJsScript()
    {
        $this->pluginOptions[] = 'array';
        $pluginOptions = Json::encode($this->pluginOptions);
        $addJsScript = "";
        if ($this->selectAll)
            $addJsScript .= "
            $('#" . $this->id . "-select-all').click(function(){
                $('#" . $this->id . "').multiSelect('select_all');
                return false;
            });";
        if ($this->deselectAll)
            $addJsScript .= "
            $('#" . $this->id . "-deselect-all').click(function(){
                $('#" . $this->id . "').multiSelect('deselect_all');
                return false;
            });";

        \Yii::$app->view->registerJs("
           $('#" . $this->id . "').multiSelect({$pluginOptions});   
        " . $addJsScript, View::POS_END);
    }
}