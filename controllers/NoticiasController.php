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
            'query' => Noticias::findBySql("select left(titulo,2) iniciales,titulo from noticias"),
        ]);
        
        // No acepta pagination por el findbysql
        

        return $this->render('index_1', [
                    'dataProvider' => $dataProvider,
             'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['iniciales','titulo'],
        ]);
    }
    //consultas DAO
    public function actionConsulta3() {

        $totalCount = Yii::$app->db
                ->createCommand('SELECT count(*) FROM noticias')
                ->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT titulo from noticias',
            'totalCount' => $totalCount,
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['titulo'],
        ]);
    }
    public function actionConsulta3a(){
        
        //consulta DAO
        $salida = yii::$app->db
                ->createCommand('SELECT titulo FROM noticias');
                
        
        return $this->render('locura',[
            'datos'=>$salida->queryAll()
            
        ]);
    }
    public function actionConsulta3b(){
        
        //consulta DAO
        $numero = yii::$app->db
                ->createCommand('SELECT count(*) FROM noticias')
                ->queryScalar();//se utiliza cuando devuelve un numero o total
        //para realizar la consulta con DAO utilizaremos un sqlDataProvider--
        //con sqlDAtaProvider hay que pasarle el total de registros de nuestra consulta para que optimice las paginacion y demas. No es obligatorio.
        //con DataProvider no es necesario pq ya lo tiene el propio controlador
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT titulo from noticias',
            'totalCount' => $numero,
        ]);
        
        return $this->render('index_1',[
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias',
            'descripcion' =>'SELECT titulo from noticias',
            'columnas'=>['titulo'],
                
            
        ]);
    }
    
      public function actionConsulta4(){
        
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find()
                ->select("titulo,texto")
                //->where("id between 1 and 3"),
                //con array, mejor opcion para abstraerse(que se adapte a cualquier plataforma) ->where("and",[">=","id",1],["<=","id",3]),
                ->where("id>=1 and id<=3"),
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo del titulo y texto de las noticias con id entre 1 y 3 (ActiveRecord)',
            'descripcion' =>'select titulo,texto from noticias where id between 1 and 3',
            'columnas'=>['titulo','texto']
        ]);
      }    
         public function actionConsulta4a(){
        
        //consulta DAO
        $numero = yii::$app->db
                ->createCommand('SELECT count(*) FROM noticias where id between 1 and 3')
                ->queryScalar();
        
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT titulo,texto from noticias where id between 1 and 3',
            'totalCount' => $numero,
        ]);
        
        return $this->render('index_1',[
            'dataProvider' => $dataProvider,
            'titulo'=>'Titulo de las noticias (DAO)',
            'descripcion' =>'SELECT titulo,texto from noticias where id between 1 and 3',
            'columnas'=>['titulo','texto']
                
            
        ]);
        
    }
 
     public function actionConsulta5(){
        
        //consulta DAO
        $numero = yii::$app->db
                ->createCommand('SELECT count(*) FROM noticias')
                ->queryScalar();
       
       $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT CONCAT(LEFT(texto,10),"...") corto,texto FROM noticias',
            'totalCount' => $numero,
        ]);
        
        return $this->render('index_1',[
            'dataProvider' => $dataProvider,
            'titulo'=>'Texto corto y completo de las noticias (DAO)',
            'descripcion' =>'SELECT CONCAT(LEFT(texto,2),"...") corto,texto FROM noticias',
            'columnas'=>['corto','texto'],
        ]);
        
    }
    public function actionConsulta5a(){
        
        $dataProvider = new ActiveDataProvider([
            'query' => Noticias::find()
                ->select(["CONCAT(left(texto,10),'...') corto", 'texto']),
      
                //->where("id between 1 and 3"),
                //con array, mejor opcion para abstraerse(que se adapte a cualquier plataforma) ->where("and",[">=","id",1],["<=","id",3]),
              //  ->where(""),
        ]);

        return $this->render('index_1', [
            'dataProvider' => $dataProvider,
            'titulo'=>'',
            'descripcion' =>'select titulo,texto from noticias where id between 1 and 3',
            'columnas'=>['corto','texto']
        ]);
      }    
    
}
    