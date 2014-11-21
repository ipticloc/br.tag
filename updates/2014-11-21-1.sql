#USE TAG_SGE_PICARREIRA;
ALTER SCHEMA DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_unicode_ci ;
SET foreign_key_checks = 0;
ALTER TABLE AuthAssignment  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE AuthItem  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE AuthItemChild  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE class  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE classroom  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE class_board  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE class_faults  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_aee_activity  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_city  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_complementary_activity_type  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_course_of_higher_education  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_discipline  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_district  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_ies  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_nation  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_native_languages  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_notary_office  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_organ_id_emitter  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_professional_education_course  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_regional_education_organ  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_school_stages  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_stage_vs_modality  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE edcenso_uf  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE instructor_documents_and_address  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE instructor_identification  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE instructor_teaching_data  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE instructor_variable_data  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE school_configuration  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE school_identification  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE school_structure  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE student_documents_and_address  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE student_enrollment  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE student_identification  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE users  convert to character set utf8 collate utf8_unicode_ci;
ALTER TABLE users_school  convert to character set utf8 collate utf8_unicode_ci;
SET foreign_key_checks = 1;

UPDATE classroom
   SET `name` = REPLACE(`name`,'?','º')
	WHERE `name` like '%?%';