<?php

namespace common\components;

use Yii;
use yii\helpers\Html;

class Formatter extends \yii\i18n\Formatter
{
    /**
     * format value as a link on the view
     *
     * @param $value
     * @param array $route
     * @return string the formatted result
     */
    public function asLinkableId($value, $route = ['view'])
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        if (!isset($route['id'])) {
            $route['id'] = $value;
        }

        return Html::a($value, $route);
    }

}
