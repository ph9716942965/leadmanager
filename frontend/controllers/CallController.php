<?php

namespace frontend\controllers;

use Yii;
use backend\models\Call;
use frontend\models\CallSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CallController implements the CRUD actions for Call model.
 */
class CallController extends Controller
{
    /**
     * {@inheritdoc}
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

    private function GetCallingId(){
        $id=\backend\models\Call::find()->select('id')
        ->where('status >0')
        ->OrderBy('last_call')
        ->addOrderBy('update_at ASC')
        ->addOrderBy('create_at ASC')
        ->addOrderBy('status ASC')
        //->createCommand()->sql;
        ->asArray()->one()['id'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand('UPDATE `db` SET `last_call`=CURRENT_TIMESTAMP where id='.$id);
        $res=$command->execute();
        //$res=$command->queryAll();
        return $id;
    }

    public function actionCalling_old($id=null)
{
    if($id==null){
        $id=$this->GetCallingId();
        return $this->redirect('index.php?r=call/calling&id='.$id);
    }

    $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Call Completed'.$model->phone);
            //return $this->redirect('index.php?r=call/calling');
           
            unset($id);
            $id=$this->GetCallingId();
            unset($model);
            $model = $this->findModel($id);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
   // $model = new \backend\models\Call(['scenario' => 'calling']);

    // if ($model->load(Yii::$app->request->post())) {
    //     if ($model->validate()) {
    //         // form inputs are valid, do something here
    //         return;
    //     }
    // }

    return $this->render('update', [
        'model' => $model,
    ]);
}



public function actionCalling($id=null)
{
    if($id==null){
        $id=$this->GetCallingId();
        return $this->redirect('index.php?r=call/calling&id='.$id);
    }
    $request = Yii::$app->request;
    $model = $this->findModel($id);       

    if($request->isAjax){
        /*
        *   Process for ajax request
        */
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($request->isGet){
            return [
                'title'=> "Update Db #".$id,
                'content'=>$this->renderAjax('update', [
                    'model' => $model,
                ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
            ];         
        }else if($model->load($request->post()) && $model->save()){
            $id=$this->GetCallingId();
            $model = $this->findModel($id);

            return [
                'forceReload'=>'#crud-datatable-pjax',
                'title'=> "Db #".$id,
                'content'=>$this->renderAjax('update', [
                    'model' => $model,
                ]),
                // 'content'=>$this->renderAjax('view', [
                //     'model' => $model,
                // ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];    
        }else{
             return [
                'title'=> "Update Db #".$id,
                'content'=>$this->renderAjax('update', [
                    'model' => $model,
                ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
            ];        
        }
    }else{
        /*
        *   Process for non-ajax request
        */
        if ($model->load($request->post()) && $model->save()) {
            $id=$this->GetCallingId();
            return $this->redirect('index.php?r=call/calling&id='.$id);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
}
    /**
     * Lists all Call models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Call model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Call model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Call();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Call model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Call model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Call model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Call the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Call::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
