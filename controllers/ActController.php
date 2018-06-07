<?php

namespace ubslum\lottegame\controllers;

use Yii;
use ubslum\lottegame\models\GameScratchCard;
use ubslum\lottegame\models\GameScratchCardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActController implements the CRUD actions for GameScratchCard model.
 */
class ActController extends Controller
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

    public function init()
    {
        parent::init();
        #add your logic: read the cookie and then set the language
        \Yii::$app->language = 'vi';
    }

    /**
     * Lists all GameScratchCard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "minimum-layout";
        $searchModel = new GameScratchCardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new GameScratchCard();

        $items = [];
        $items[] = ['label' => 'form' , 'content' => $this->renderPartial('_scratch', array('searchModel' => $searchModel, 'dataProvider' => $dataProvider,'model' => $model,)),];
        $items[] = ['label' => 'form' , 'content' => $this->renderPartial('_form', array('searchModel' => $searchModel, 'dataProvider' => $dataProvider,'model' => $model,)),];


        if(isset($_POST['id_model'])){
            $request = Yii::$app->request;
            $id = $request->post('id_model');
            $model = $this->findModel($id);
            $model->load(Yii::$app->request->post());
            $model->setIndentityDateCreatedText($model->identity_date_created);
            if ($model->save()) {
                return $this->redirect(['success', 'id' => $model->id]);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'items' => $items
        ]);
    }

    /**
     * Save ajax id & pos.
     * @return mixed
     */
    public function actionAjaxRegBegin(){
        $rs = [];
        $request = Yii::$app->request;
        $id = $request->get('id');
        $pos = $request->get('pos');
//        $model = GameScratchCard::findAll('id_member = :id AND pos_number = :pos AND date_created = :time', array(
//            ':id' => $id,
//            ':pos' => $pos,
//            ':time' => date('Y-m-d')
//        ));
        if(!GameScratchCard::find()
            ->where( [ 'id_member' => $id, 'pos_number' => $pos, 'date_created' => date('Y-m-d') ] )
            ->exists()){
            $model = new GameScratchCard();
            $model->id_member = $id;
            $model->pos_number = $pos;
            if($model->save()){
                $rs['rs'] = 'OK';
                $rs['msg'] = 'Lưu thành công.';
                $rs['id'] = $model->id;
            }else{
                $rs['rs'] = 'FAIL';
                $rs['msg'] = 'Lưu thất bại.';
            }
        }else{
            $rs['rs'] = 'FAIL';
            $rs['msg'] = 'Đã tồn tại.';
        }
        echo json_encode($rs);
    }

    /**
     * Displays a single GameScratchCard model.
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
     * Creates a new GameScratchCard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GameScratchCard();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GameScratchCard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing GameScratchCard model.
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
     * Finds the GameScratchCard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GameScratchCard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GameScratchCard::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
