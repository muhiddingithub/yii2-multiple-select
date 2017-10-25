<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace muhiddin\select;

use yii\web\AssetBundle;

/**
 * @author Muhiddin Jumaniyazov <hellomyhp@gmail.com>
 * @since 1.0
 */
class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@muhiddin/select/assets';

    public $css = [
        'css/multi-select.css',
    ];
    public $js = [
        'js/jquery.multi-select.js',
    ];

    public function init()
    {
        parent::init();
        $this->jsOptions['position'] = \yii\web\View::POS_END;
    }

}
