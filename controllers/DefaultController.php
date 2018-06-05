<?php

namespace ubslum\projectbusinessidea\controllers;

use app\modules\user\models\User;
use ubslum\projectbusinessidea\components\MyMailChimp;
use ubslum\projectbusinessidea\models\ChoiceQuestion;
use ubslum\projectbusinessidea\models\ChoiceQuestionAnswer;
use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaChoiceQuestion;
use Yii;
use ubslum\projectbusinessidea\models\ProjectBusinessIdea;
use ubslum\projectbusinessidea\models\ProjectBusinessIdeaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use linslin\yii2\curl;
use yii\httpclient\Client;
use yii\data\ActiveDataProvider;
use kartik\export\ExportMenu;
use yii\db\Query;
use ubslum\projectbusinessidea\components\Common;

/**
 * DefaultController implements the CRUD actions for ProjectBusinessIdea model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

}
