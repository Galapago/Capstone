<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$question1=New App\Question();
    	$question1->form_id='1';
    	$question1->question='Referring physician';
        $question1->section='personal';
    	$question1->quantifiable='0';
    	$question1->input_type='textarea';
    	$question1->save();

    	$question2=New App\Question();
    	$question2->form_id='1';
    	$question2->question='Phone Number';
        $question2->section='personal';
    	$question2->quantifiable='0';
    	$question2->input_type='textarea';
    	$question2->save();

    	$question3=New App\Question();
    	$question3->form_id='1';
    	$question3->question='Primary care physician';
        $question3->section='personal';
    	$question3->quantifiable='0';
    	$question3->input_type='textarea';
    	$question3->save();


    	$question4=New App\Question();
    	$question4->form_id='1';
    	$question4->question='Phone Number';
        $question4->section='personal';
    	$question4->quantifiable='0';
    	$question4->input_type='textarea';
    	$question4->save();

		$question5=New App\Question();
    	$question5->form_id='1';
    	$question5->question='Other physicians involved in your care';
        $question5->section='personal';
    	$question5->quantifiable='0';
    	$question5->input_type='textarea';
    	$question5->save();

    	$question6=New App\Question();
    	$question6->form_id='1';
    	$question6->question='Pharmacy name';
        $question6->section='personal';
    	$question6->quantifiable='0';
    	$question6->input_type='textarea';
    	$question6->save();

    	$question7=New App\Question();
    	$question7->form_id='1';
    	$question7->question='Phone number';
        $question7->section='personal';
    	$question7->quantifiable='0';
    	$question7->input_type='textarea';
    	$question7->save();

    	$question8=New App\Question();
    	$question8->form_id='1';
    	$question8->question='Medical history (check all that apply)';
        $question8->section='history';
    	$question8->quantifiable='0';
    	$question8->input_type='checkbox';
    	$question8->save();

    	$question9=New App\Question();
    	$question9->question='Family history (check all that apply)';
        $question9->section='history';
    	$question9->form_id='1';
    	$question9->quantifiable='0';
    	$question9->input_type='checkbox';
    	$question9->save();

    	$question10=New App\Question();
    	$question10->form_id='1';
    	$question10->question='Allergies';
        $question10->section='history';
    	$question10->quantifiable='0';
    	$question10->input_type='textarea';
    	$question10->save();

    	//Review of Symptoms
    	$question11=New App\Question();
    	$question11->form_id='1';
    	$question11->question='Respiratory';
        $question11->section='review_of_symptoms';
    	$question11->quantifiable='0';
    	$question11->input_type='checkbox';
    	$question11->save();


    	$question12=New App\Question();
    	$question12->form_id='1';
    	$question12->question='Endocrine';
        $question12->section='review_of_symptoms';
    	$question12->quantifiable='0';
    	$question12->input_type='checkbox';
    	$question12->save();


    	$question14=New App\Question();
    	$question14->form_id='1';
    	$question14->question='Gastroenterology';
        $question14->section='review_of_symptoms';
    	$question14->quantifiable='0';
    	$question14->input_type='checkbox';
    	$question14->save();


    	$question15=New App\Question();
    	$question15->form_id='1';
    	$question15->question='Urology';
        $question15->section='review_of_symptoms';
    	$question15->quantifiable='0';
    	$question15->input_type='checkbox';
    	$question15->save();


    	$question16=New App\Question();
    	$question16->form_id='1';
    	$question16->question='Dermatology';
        $question16->section='review_of_symptoms';
    	$question16->quantifiable='0';
    	$question16->input_type='checkbox';
    	$question16->save();


    	$question17=New App\Question();
    	$question17->form_id='1';
    	$question17->question='Cardiology';
        $question17->section='review_of_symptoms';
    	$question17->quantifiable='0';
    	$question17->input_type='checkbox';
    	$question17->save();


    	$question18=New App\Question();
    	$question18->form_id='1';
    	$question18->question='Female reproductive';
        $question18->section='review_of_symptoms';
    	$question18->quantifiable='0';
    	$question18->input_type='checkbox';
    	$question18->save();

    	$question19=New App\Question();
    	$question19->form_id='1';
    	$question19->question='Male reproductive';
        $question19->section='review_of_symptoms';
    	$question19->quantifiable='0';
    	$question19->input_type='checkbox';
    	$question19->save();

    	$question20=New App\Question();
    	$question20->form_id='1';
    	$question20->question='Hematology';
        $question20->section='review_of_symptoms';
    	$question20->quantifiable='0';
    	$question20->input_type='checkbox';
    	$question20->save();

    	$question21=New App\Question();
    	$question21->form_id='1';
    	$question21->question='Psychology';
        $question21->section='review_of_symptoms';
    	$question21->quantifiable='0';
    	$question21->input_type='checkbox';
    	$question21->save();

    	$question22=New App\Question();
    	$question22->form_id='1';
    	$question22->question='General';
        $question22->section='review_of_symptoms';
    	$question22->quantifiable='0';
    	$question22->input_type='checkbox';
    	$question22->save();

    	$question23=New App\Question();
    	$question23->form_id='1';
    	$question23->question='Opthalmology';
        $question23->section='review_of_symptoms';
    	$question23->quantifiable='0';
    	$question23->input_type='checkbox';
    	$question23->save();

    	$question24=New App\Question();
    	$question24->form_id='1';
    	$question24->question='Neurology';
        $question24->section='review_of_symptoms';
    	$question24->quantifiable='0';
    	$question24->input_type='checkbox';
    	$question24->save();

    	$question25=New App\Question();
    	$question25->form_id='1';
    	$question25->question='Musculoskeletal';
        $question25->section='review_of_symptoms';
    	$question25->quantifiable='0';
    	$question25->input_type='checkbox';
    	$question25->save();
    	//Habits
    	$question26=New App\Question();
    	$question26->form_id='1';
    	$question26->question='Do you smoke?';
        $question26->section='history';
    	$question26->quantifiable='0';
    	$question26->input_type='radio';
    	$question26->save();

    	$question27=New App\Question();
    	$question27->form_id='1';
    	$question27->question='How many packs daily?';
        $question27->section='history';
    	$question27->quantifiable='0';
    	$question27->input_type='radio';
    	$question27->save();

    	$question28=New App\Question();
    	$question28->form_id='1';
    	$question28->question='How long?';
        $question28->section='history';
    	$question28->quantifiable='0';
    	$question28->input_type='radio';
    	$question28->save();

    	$question29=New App\Question();
    	$question29->form_id='1';
    	$question29->question='Interested in stopping?';
        $question29->section='history';
    	$question29->quantifiable='0';
    	$question29->input_type='radio';
    	$question29->save();

    	$question30=New App\Question();
    	$question30->form_id='1';
    	$question30->question='How long did you smoke?';
        $question30->section='history';
    	$question30->quantifiable='0';
    	$question30->input_type='radio';
    	$question30->save();

    	$question31=New App\Question();
    	$question31->form_id='1';
    	$question31->question='Do you drink coffee?';
        $question31->section='history';
    	$question31->quantifiable='0';
    	$question31->input_type='radio';
    	$question31->save();

    	$question32=New App\Question();
    	$question32->form_id='1';
    	$question32->question='How many cups of coffee do you drink a day?';
        $question32->section='history';
    	$question32->quantifiable='0';
    	$question32->input_type='radio';
    	$question32->save();

    	$question33=New App\Question();
    	$question33->form_id='1';
    	$question33->question='Do you drink alcohol?';
        $question33->section='history';
    	$question33->quantifiable='0';
    	$question33->input_type='radio';
    	$question33->save();

    	$question34=New App\Question();
    	$question34->form_id='1';
    	$question34->question='How frequently?';
        $question34->section='history';
    	$question34->quantifiable='4';
    	$question34->input_type='radio';
    	$question34->save();

    	$question35=New App\Question();
    	$question35->form_id='1';
    	$question35=New App\Question();
    	$question35->form_id='1';
    	$question35->question='Do you routinely snore?';
        $question35->section='history';
    	$question35->quantifiable='0';
    	$question35->input_type='radio';
    	$question35->save();

    	$question36=New App\Question();
    	$question36->form_id='1';
    	$question36->question='Are you often drowsy during the daitime?';
        $question36->section='history';
    	$question36->quantifiable='0';
    	$question36->input_type='radio';
    	$question36->save();

    	$question37=New App\Question();
    	$question37->form_id='1';
    	$question37->question='Do you routinely have difficulty sleeping?';
        $question37->section='history';
    	$question37->quantifiable='0';
    	$question37->input_type='radio';
    	$question37->save();

    	$question38=New App\Question();
    	$question38->form_id='1';
    	$question38->question='Wake up much earlier than expected?';
        $question38->section='history';
    	$question38->quantifiable='0';
    	$question38->input_type='radio';
    	$question38->save();

    	$question39=New App\Question();
    	$question39->form_id='1';
    	$question39->question='Do you routinely exercise?';
        $question39->section='history';
    	$question39->quantifiable='0';
    	$question39->input_type='checkbox';
    	$question39->save();

    	$question40=New App\Question();
    	$question40->form_id='1';
    	$question40->question='Have you ever used illegal drugs?';
        $question40->section='history';
    	$question40->quantifiable='0';
    	$question40->input_type='checkbox';
    	$question40->save();

        $question41=New APp\Question();
        $question41->form_id='1';
        $question41->question='Chest Pain?';
        $question41->section='doctor_specific';
        $question41->quantifiable='1';
        $question41->input_type='checkbox';
        $question41->save();


        //factory(App\Question::class, 30)->create();
    }
}
