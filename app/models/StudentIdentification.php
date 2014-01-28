<?php

/**
 * This is the model class for table "student_identification".
 *
 * The followings are the available columns in table 'student_identification':
 * @property string $register_type
 * @property string $school_inep_id_fk
 * @property string $inep_id
 * @property integer $id
 * @property string $name
 * @property string $nis
 * @property string $birthday
 * @property integer $sex
 * @property integer $color_race
 * @property integer $filiation
 * @property string $mother_name
 * @property string $father_name
 * @property integer $nationality
 * @property integer $edcenso_nation_fk
 * @property integer $edcenso_uf_fk
 * @property integer $edcenso_city_fk
 * @property integer $deficiency
 * @property integer $deficiency_type_blindness
 * @property integer $deficiency_type_low_vision
 * @property integer $deficiency_type_deafness
 * @property integer $deficiency_type_disability_hearing
 * @property integer $deficiency_type_deafblindness
 * @property integer $deficiency_type_phisical_disability
 * @property integer $deficiency_type_intelectual_disability
 * @property integer $deficiency_type_multiple_disabilities
 * @property integer $deficiency_type_autism
 * @property integer $deficiency_type_aspenger_syndrome
 * @property integer $deficiency_type_rett_syndrome
 * @property integer $deficiency_type_childhood_disintegrative_disorder
 * @property integer $deficiency_type_gifted
 * @property integer $resource_aid_lector
 * @property integer $resource_aid_transcription
 * @property integer $resource_interpreter_guide
 * @property integer $resource_interpreter_libras
 * @property integer $resource_lip_reading
 * @property integer $resource_zoomed_test_16
 * @property integer $resource_zoomed_test_20
 * @property integer $resource_zoomed_test_24
 * @property integer $resource_braille_test
 * @property integer $resource_none
 *
 * The followings are the available model relations:
 * @property EdcensoNation $edcensoNationFk
 * @property EdcensoUf $edcensoUfFk
 * @property EdcensoCity $edcensoCityFk
 * @property SchoolIdentification $schoolInepIdFk
 */
class StudentIdentification extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return StudentIdentification the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'student_identification';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('school_inep_id_fk, name, birthday, sex, color_race, filiation, nationality, edcenso_nation_fk, deficiency', 'required'),
            array('sex, color_race, filiation, nationality, edcenso_nation_fk, edcenso_uf_fk, edcenso_city_fk, deficiency, deficiency_type_blindness, deficiency_type_low_vision, deficiency_type_deafness, deficiency_type_disability_hearing, deficiency_type_deafblindness, deficiency_type_phisical_disability, deficiency_type_intelectual_disability, deficiency_type_multiple_disabilities, deficiency_type_autism, deficiency_type_aspenger_syndrome, deficiency_type_rett_syndrome, deficiency_type_childhood_disintegrative_disorder, deficiency_type_gifted, resource_aid_lector, resource_aid_transcription, resource_interpreter_guide, resource_interpreter_libras, resource_lip_reading, resource_zoomed_test_16, resource_zoomed_test_20, resource_zoomed_test_24, resource_braille_test, resource_none', 'numerical', 'integerOnly' => true),
            array('register_type', 'length', 'max' => 2),
            array('school_inep_id_fk', 'length', 'max' => 8),
            array('inep_id', 'length', 'max' => 12),
            array('name, mother_name, father_name', 'length', 'max' => 100),
            array('nis', 'length', 'max' => 11),
            array('birthday', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('register_type, school_inep_id_fk, inep_id, id, name, nis, birthday, sex, color_race, filiation, mother_name, father_name, nationality, edcenso_nation_fk, edcenso_uf_fk, edcenso_city_fk, deficiency, deficiency_type_blindness, deficiency_type_low_vision, deficiency_type_deafness, deficiency_type_disability_hearing, deficiency_type_deafblindness, deficiency_type_phisical_disability, deficiency_type_intelectual_disability, deficiency_type_multiple_disabilities, deficiency_type_autism, deficiency_type_aspenger_syndrome, deficiency_type_rett_syndrome, deficiency_type_childhood_disintegrative_disorder, deficiency_type_gifted, resource_aid_lector, resource_aid_transcription, resource_interpreter_guide, resource_interpreter_libras, resource_lip_reading, resource_zoomed_test_16, resource_zoomed_test_20, resource_zoomed_test_24, resource_braille_test, resource_none', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'edcensoNationFk' => array(self::BELONGS_TO, 'EdcensoNation', 'edcenso_nation_fk'),
            'edcensoUfFk' => array(self::BELONGS_TO, 'EdcensoUf', 'edcenso_uf_fk'),
            'edcensoCityFk' => array(self::BELONGS_TO, 'EdcensoCity', 'edcenso_city_fk'),
            'schoolInepIdFk' => array(self::BELONGS_TO, 'SchoolIdentification', 'school_inep_id_fk'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'register_type' => Yii::t('default', 'Register Type'),
            'school_inep_id_fk' => Yii::t('default', 'School Inep Id Fk'),
            'inep_id' => Yii::t('default', 'Inep'),
            'id' => Yii::t('default', 'ID'),
            'name' => Yii::t('default', 'Name'),
            'nis' => Yii::t('default', 'Nis'),
            'birthday' => Yii::t('default', 'Birthday'),
            'sex' => Yii::t('default', 'Sex'),
            'color_race' => Yii::t('default', 'Color Race'),
            'filiation' => Yii::t('default', 'Filiation'),
            'mother_name' => Yii::t('default', 'Mother Name'),
            'father_name' => Yii::t('default', 'Father Name'),
            'nationality' => Yii::t('default', 'Nationality'),
            'edcenso_nation_fk' => Yii::t('default', 'Edcenso Nation Fk'),
            'edcenso_uf_fk' => Yii::t('default', 'Edcenso Uf Fk'),
            'edcenso_city_fk' => Yii::t('default', 'Edcenso City Fk'),
            'deficiency' => Yii::t('default', 'Deficiency'),
            'deficiency_type_blindness' => Yii::t('default', 'Deficiency Type Blindness'),
            'deficiency_type_low_vision' => Yii::t('default', 'Deficiency Type Low Vision'),
            'deficiency_type_deafness' => Yii::t('default', 'Deficiency Type Deafness'),
            'deficiency_type_disability_hearing' => Yii::t('default', 'Deficiency Type Disability Hearing'),
            'deficiency_type_deafblindness' => Yii::t('default', 'Deficiency Type Deafblindness'),
            'deficiency_type_phisical_disability' => Yii::t('default', 'Deficiency Type Phisical Disability'),
            'deficiency_type_intelectual_disability' => Yii::t('default', 'Deficiency Type Intelectual Disability'),
            'deficiency_type_multiple_disabilities' => Yii::t('default', 'Deficiency Type Multiple Disabilities'),
            'deficiency_type_autism' => Yii::t('default', 'Deficiency Type Autism'),
            'deficiency_type_aspenger_syndrome' => Yii::t('default', 'Deficiency Type Aspenger Syndrome'),
            'deficiency_type_rett_syndrome' => Yii::t('default', 'Deficiency Type Rett Syndrome'),
            'deficiency_type_childhood_disintegrative_disorder' => Yii::t('default', 'Deficiency Type Childhood Disintegrative Disorder'),
            'deficiency_type_gifted' => Yii::t('default', 'Deficiency Type Gifted'),
            'resource_aid_lector' => Yii::t('default', 'Resource Aid Lector'),
            'resource_aid_transcription' => Yii::t('default', 'Resource Aid Transcription'),
            'resource_interpreter_guide' => Yii::t('default', 'Resource Interpreter Guide'),
            'resource_interpreter_libras' => Yii::t('default', 'Resource Interpreter Libras'),
            'resource_lip_reading' => Yii::t('default', 'Resource Lip Reading'),
            'resource_zoomed_test_16' => Yii::t('default', 'Resource Zoomed Test 16'),
            'resource_zoomed_test_20' => Yii::t('default', 'Resource Zoomed Test 20'),
            'resource_zoomed_test_24' => Yii::t('default', 'Resource Zoomed Test 24'),
            'resource_braille_test' => Yii::t('default', 'Resource Braille Test'),
            'resource_none' => Yii::t('default', 'Resource None'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('register_type', $this->register_type, true);        
        $school = Yii::app()->user->school;
        $criteria->compare('school_inep_id_fk', $school);
        $criteria->compare('inep_id', $this->inep_id, true);
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
//        $criteria->compare('nis', $this->nis, true);
//        $criteria->compare('birthday', $this->birthday, true);
//        $criteria->compare('sex', $this->sex);
//        $criteria->compare('color_race', $this->color_race);
//        $criteria->compare('filiation', $this->filiation);
//        $criteria->compare('mother_name', $this->mother_name, true);
//        $criteria->compare('father_name', $this->father_name, true);
//        $criteria->compare('nationality', $this->nationality);
//        $criteria->compare('edcenso_nation_fk', $this->edcenso_nation_fk);
//        $criteria->compare('edcenso_uf_fk', $this->edcenso_uf_fk);
//        $criteria->compare('edcenso_city_fk', $this->edcenso_city_fk);
//        $criteria->compare('deficiency', $this->deficiency);
//        $criteria->compare('deficiency_type_blindness', $this->deficiency_type_blindness);
//        $criteria->compare('deficiency_type_low_vision', $this->deficiency_type_low_vision);
//        $criteria->compare('deficiency_type_deafness', $this->deficiency_type_deafness);
//        $criteria->compare('deficiency_type_disability_hearing', $this->deficiency_type_disability_hearing);
//        $criteria->compare('deficiency_type_deafblindness', $this->deficiency_type_deafblindness);
//        $criteria->compare('deficiency_type_phisical_disability', $this->deficiency_type_phisical_disability);
//        $criteria->compare('deficiency_type_intelectual_disability', $this->deficiency_type_intelectual_disability);
//        $criteria->compare('deficiency_type_multiple_disabilities', $this->deficiency_type_multiple_disabilities);
//        $criteria->compare('deficiency_type_autism', $this->deficiency_type_autism);
//        $criteria->compare('deficiency_type_aspenger_syndrome', $this->deficiency_type_aspenger_syndrome);
//        $criteria->compare('deficiency_type_rett_syndrome', $this->deficiency_type_rett_syndrome);
//        $criteria->compare('deficiency_type_childhood_disintegrative_disorder', $this->deficiency_type_childhood_disintegrative_disorder);
//        $criteria->compare('deficiency_type_gifted', $this->deficiency_type_gifted);
//        $criteria->compare('resource_aid_lector', $this->resource_aid_lector);
//        $criteria->compare('resource_aid_transcription', $this->resource_aid_transcription);
//        $criteria->compare('resource_interpreter_guide', $this->resource_interpreter_guide);
//        $criteria->compare('resource_interpreter_libras', $this->resource_interpreter_libras);
//        $criteria->compare('resource_lip_reading', $this->resource_lip_reading);
//        $criteria->compare('resource_zoomed_test_16', $this->resource_zoomed_test_16);
//        $criteria->compare('resource_zoomed_test_20', $this->resource_zoomed_test_20);
//        $criteria->compare('resource_zoomed_test_24', $this->resource_zoomed_test_24);
        $criteria->compare('resource_braille_test', $this->resource_braille_test);
        $criteria->compare('resource_none', $this->resource_none);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => array(
                            'name' => CSort::SORT_ASC
                        ),
                    ),
                    'pagination' => array(
                        'pageSize' => 12,
                    ),
                ));
    }

}