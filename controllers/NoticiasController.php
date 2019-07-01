<?php

namespace app\controllers;

use Yii;
use app\models\Noticias;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;


/**
 * NoticiasController implements the CRUD actions for Noticias model.
 */
class NoticiasController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all Noticias models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    public function actionListado() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find(),
        ]);

        return $this->render('listar', [
                    'data' => $dataProvider,
        ]);
    }
    

    /**
     * Displays a single Noticias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Noticias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Noticias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Noticias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Noticias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Noticias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Noticias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Noticias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionConsulta1() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find()->select("titulo"),
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['titulo'],
        ]);
    }
     public function actionConsulta1a() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find()->select("texto"),
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Texto de las noticias',
            'descripcion' =>'SELECT texto from noticias',
            'columnas'=>['texto'],
        ]);
    }
     public function actionConsulta1b() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find()
                ->select("titulo")
                ->where("id<=2"),
            
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias con id >= 2',
            'descripcion' =>'SELECT titulo from noticias where id <= 2',
            'columnas'=>['titulo'],
        ]);
    }

    public function actionConsulta2() {
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::findBySql("select titulo from noticias"),
        ]);

        return $this->render('index_1', [
                    'dataProvider' => $dataProvider,
             'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['titulo'],
        ]);
    }

    public function actionConsulta3() {

        $totalCount = Yii::$app->db
                ->createCommand('SELECT count(*) FROM noticias')
                ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT titulo from noticias',
            'totalCount' => $totalCount,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['titulo'],
        ]);
    }
}
    