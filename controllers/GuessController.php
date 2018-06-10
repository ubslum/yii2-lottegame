<?php

namespace ubslum\lottegame\controllers;

use Yii;
use ubslum\lottegame\models\GameGuess;
use ubslum\lottegame\models\GameGuessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GuessController implements the CRUD actions for GameGuess model.
 */
class GuessController extends Controller
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

    /**
     * Lists all GameGuess models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "minimum-layout";
        $searchModel = new GameGuessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new GameGuess();

        if(isset($_POST['GameGuess'])){
            $request = Yii::$app->request;
            $model->load(Yii::$app->request->post());
            $model->setIndentityDateCreatedText($model->identity_date_created);
            $model->answer_one = implode(', ', $request->post('aone'));
            $model->answer_two = $request->post('atwo');
            if ($model->save()) {
                //email
                Yii::$app->mail->compose('announce-email-guess', ['game' => $model])
                    ->setFrom([Yii::$app->getModule('core')->emailConfig['mailFrom'] => "LOTTE MART"])
                    ->setTo($model->email)
                    ->setSubject('Thông báo dự đoán trúng thưởng - LOTTE MART')
                    ->send();
                return $this->redirect(['success', 'id' => $model->id]);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
//            'items' => $items,
//            'form' => $form
        ]);
    }

    /**
     * Lists all GameGuess models.
     * @return mixed
     */
    public function actionAdmin()
    {
        $this->layout = "minimum-layout";
        $searchModel = new GameGuessSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GameGuess model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GameGuess model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        return;
        $model = new GameGuess();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GameGuess model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        return;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GameGuess model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GameGuess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GameGuess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GameGuess::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSuccess(){
        $this->layout = "minimum-layout";
        return $this->render('success', [
        ]);
    }
}
