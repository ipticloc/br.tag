<?php

	/**
	 * This is the model class for table "schedule".
	 *
	 * The followings are the available columns in table 'schedule':
	 * @property integer $id
	 * @property integer $instructor_fk
	 * @property integer $discipline_fk
	 * @property integer $classroom_fk
	 * @property integer $week_day
	 * @property string $initial_hour
	 * @property string $final_hour
	 *
	 * The followings are the available model relations:
	 * @property Classroom $classroomFk
	 * @property EdcensoDiscipline $disciplineFk
	 * @property InstructorIdentification $instructorFk
	 */
	class Schedule extends CActiveRecord {
		/**
		 * @return string the associated database table name
		 */
		public function tableName() {
			return 'schedule';
		}

		/**
		 * @return array validation rules for model attributes.
		 */
		public function rules() {
			// NOTE: you should only define rules for those attributes that
			// will receive user inputs.
			return [
				['discipline_fk, classroom_fk, week_day, initial_hour, final_hour', 'required'],
				['instructor_fk, discipline_fk, classroom_fk, week_day', 'numerical', 'integerOnly' => TRUE],
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				[
					'id, instructor_fk, discipline_fk, classroom_fk, week_day, initial_hour, final_hour', 'safe',
					'on' => 'search'
				],
			];
		}

		/**
		 * @return array relational rules.
		 */
		public function relations() {
			// NOTE: you may need to adjust the relation name and the related
			// class name for the relations automatically generated below.
			return [
				'classroomFk' => [self::BELONGS_TO, 'Classroom', 'classroom_fk'],
				'disciplineFk' => [self::BELONGS_TO, 'EdcensoDiscipline', 'discipline_fk'],
				'instructorFk' => [self::BELONGS_TO, 'InstructorIdentification', 'instructor_fk'],
			];
		}

		/**
		 * @return array customized attribute labels (name=>label)
		 */
		public function attributeLabels() {
			return [
				'id' => 'ID',
				'instructor_fk' => yii::t('timesheetModule.labels','Instructor'),
				'discipline_fk' => yii::t('timesheetModule.labels','Discipline'),
				'classroom_fk' => yii::t('timesheetModule.labels','Classroom'),
				'week_day' => yii::t('timesheetModule.labels','Week Day'),
				'initial_hour' => yii::t('timesheetModule.labels','Initial Hour'),
				'final_hour' => yii::t('timesheetModule.labels','Final Hour'),
			];
		}

		/**
		 * Retrieves a list of models based on the current search/filter conditions.
		 *
		 * Typical usecase:
		 * - Initialize the model fields with values from filter form.
		 * - Execute this method to get CActiveDataProvider instance which will filter
		 * models according to data in model fields.
		 * - Pass data provider to CGridView, CListView or any similar widget.
		 *
		 * @return CActiveDataProvider the data provider that can return the models
		 * based on the search/filter conditions.
		 */
		public function search() {
			// @todo Please modify the following code to remove attributes that should not be searched.

			$criteria = new CDbCriteria;

			$criteria->compare('id', $this->id);
			$criteria->compare('instructor_fk', $this->instructor_fk);
			$criteria->compare('discipline_fk', $this->discipline_fk);
			$criteria->compare('classroom_fk', $this->classroom_fk);
			$criteria->compare('week_day', $this->week_day);
			$criteria->compare('initial_hour', $this->initial_hour, TRUE);
			$criteria->compare('final_hour', $this->final_hour, TRUE);

			return new CActiveDataProvider($this, [
				'criteria' => $criteria,
			]);
		}

		/**
		 * Returns the static model of the specified AR class.
		 * Please note that you should have this exact method in all your CActiveRecord descendants!
		 * @param string $className active record class name.
		 * @return Schedule the static model class
		 */
		public static function model($className = __CLASS__) {
			return parent::model($className);
		}
	}
