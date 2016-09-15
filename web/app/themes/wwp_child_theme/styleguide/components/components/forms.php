<!--components/components/forms.php-->
<!-- This markup is generated by the FormView class, please do not write by hand -->

<?php
$form = new \WonderWp\Forms\Form();

$group2 = new \WonderWp\Forms\FormGroup('others','Autres Elements');

//Champ texte
$f = new \WonderWp\Forms\Fields\InputField('inputField',null,['label'=>'Champ texte de base']);
$form->addField($f);

//Champ texte requis
$f = new \WonderWp\Forms\Fields\InputField('requiredInputField',null,['label'=>'Champ texte requis'],[ \Respect\Validation\Validator::notEmpty() ]);
$form->addField($f);

//Textarea
$f = new \WonderWp\Forms\Fields\TextAreaField('textareaField',null,['label'=>'TextArea']);
$group2->addField($f);

//Email
$f = new \WonderWp\Forms\Fields\EmailField('emailField',null,['label'=>'Email']);
$form->addField($f);

//Password
$f = new \WonderWp\Forms\Fields\PasswordField('pwdField',null,['label'=>'Password']);
$form->addField($f);

//Numeric
$f = new \WonderWp\Forms\Fields\NumericField('numericField',null,['label'=>'Numérique']);
$form->addField($f);

//Url
$f = new \WonderWp\Forms\Fields\UrlField('urlField',null,['label'=>'Url']);
$form->addField($f);

//Date
$f = new \WonderWp\Forms\Fields\DateField('dateField',null,['label'=>'Date']);
$form->addField($f);

//Media
$f = new \WonderWp\Forms\Fields\MediaField('mediaField',null,['label'=>'Média']);
$group2->addField($f);

//Select
$f = new \WonderWp\Forms\Fields\SelectField('selectField',null,['label'=>'Select']);
$f->setOptions([
	''=>'Choisissez une option',
	'1'=>'Option 1',
	'2'=>'Option 2',
	'3'=>'Option 3'
]);
$group2->addField($f);

//Radios
$f = new \WonderWp\Forms\Fields\RadioField('radioField',2,['label'=>'Radios']);
$opts = array(
	'1'=>'Option 1',
	'2'=>'Option 2',
	'3'=>'Option 3'
);
$f->setOptions($opts)->generateRadios();
$group2->addField($f);

//Checkbox
$f = new \WonderWp\Forms\Fields\CheckBoxField('cbField',null,['label'=>'Checkbox']);
$group2->addField($f);

//Checkboxes
$f = new \WonderWp\Forms\Fields\CheckBoxesField('checkboxesField',3,['label'=>'Checkboxes']);
$opts = array(
	'1'=>'Option 1',
	'2'=>'Option 2',
	'3'=>'Option 3'
);
$f->setOptions($opts)->generateCheckBoxes();
$group2->addField($f);

$form->addGroup($group2);

//Get markup
echo $formView = $form->renderView();
?>

<hr>
<span class="subTitle">Inline form <i class="small">(add ".form-inline" to your form tag)</i></span><br>

<?php
$form2 = new \WonderWp\Forms\Form();

//Email
$f = new \WonderWp\Forms\Fields\EmailField('emailField',null,['label'=>'Email']);
$form2->addField($f);

//Password
$f = new \WonderWp\Forms\Fields\PasswordField('pwdField',null,['label'=>'Password']);
$form2->addField($f);

$opts = array('formStart'=>['class'=>['form-inline']]);
echo $formView2 = $form2->renderView($opts);

?>

<hr>

<span class="subTitle">No label form <i class="small">(add ".no-label" to your form tag)</i></span><br>

<hr>

<span class="subTitle">Restant à générer<br>

<form>

	<div class="form-errors">Main error message</div>

 	<div class="form-group has-error">
 	  <label for="exampleInputText2">Text with error message</label>
 	  <input type="email" class="form-control" id="exampleInputText2" placeholder="Your text here">
		<label class="label-error" for="exampleInputText2">An email is required</label>
 	</div>

</form>