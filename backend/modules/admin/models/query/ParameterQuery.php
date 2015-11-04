<?php

namespace backend\modules\admin\models\query;

/**
 * This is the ActiveQuery class for [[\backend\models\Parameter]].
 *
 * @see \backend\models\Parameter
 */
class ParameterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\Parameter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\Parameter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}