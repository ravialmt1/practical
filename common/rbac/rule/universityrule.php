<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Checks if user group matches
 */
class universityrule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
			$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$university_id = $university_id['user_university'];
            $group = Yii::$app->user->identity->group;
            if ($item->name === 'corporate') {
                return $group == 1;
            } elseif ($item->name === 'author') {
                return $group == 1 || $group == 2;
            }
        }
        return false;
    }
}
?>