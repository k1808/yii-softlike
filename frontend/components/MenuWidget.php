<?php

namespace app\components;


use common\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if($this->ul_class === null){
            $this->ul_class = 'menu-sidebar';
        }
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->menuHtml = '<ul class="' . $this->ul_class . '">';
        $this->menuHtml .= $this->getMenuHtml($this->data);
        $this->menuHtml .= '</ul>';
        return $this->menuHtml;

    }


    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

}