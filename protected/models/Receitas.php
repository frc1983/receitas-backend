<?php

/**
 * This is the model class for table "receitas".
 *
 * The followings are the available columns in table 'receitas':
 * @property integer $id
 * @property integer $id_categoria
 * @property string $nome
 * @property string $rendimento
 * @property string $calorias
 * @property string $tempo_preparo
 * @property string $modo_preparo
 * @property string $image_url
 *
 * The followings are the available model relations:
 * @property Ingredientes[] $ingredientes
 * @property Categorias $idCategoria
 */
class Receitas extends CActiveRecord
{
	public $image_url;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Receitas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receitas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_categoria, nome, rendimento, calorias, tempo_preparo, modo_preparo', 'required'),
			array('id_categoria', 'numerical', 'integerOnly'=>true),
			array('image_url', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true,'on'=>'update'),
			array('nome, rendimento, calorias, tempo_preparo', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_categoria, nome, rendimento, calorias, tempo_preparo, modo_preparo, image_url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ingredientes' => array(self::HAS_MANY, 'Ingredientes', 'id_receita'),
			'idCategoria' => array(self::BELONGS_TO, 'Categorias', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_categoria' => 'Id Categoria',
			'nome' => 'Nome',
			'rendimento' => 'Rendimento',
			'calorias' => 'Calorias',
			'tempo_preparo' => 'Tempo Preparo',
			'modo_preparo' => 'Modo Preparo',
			'image_url' => 'Image Url',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('rendimento',$this->rendimento,true);
		$criteria->compare('calorias',$this->calorias,true);
		$criteria->compare('tempo_preparo',$this->tempo_preparo,true);
		$criteria->compare('modo_preparo',$this->modo_preparo,true);
		$criteria->compare('image_url',$this->image_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}