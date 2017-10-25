# yii2-multiple-select
Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require muhiddingithub/yii2-multiple-select "dev-master"
```

or add

```
"muhiddingithub/yii2-multiple-select": "dev-master"
```

to the require section of your `composer.json` file.

[Jquery soruce](http://loudev.com/)

Usage
-----


```php 
    echo $form->field($model, 'attribute')->widget(\muhiddin\select\MultiSelect::className(), [
            'data' => $dataList,
            'id' => 'multiple-select',
            'options' => [
                'multiple' => 'multiple',
            ],
            'selectAll' => true,
            'deselectAll'=>true,
        ])
        
       ```
  
