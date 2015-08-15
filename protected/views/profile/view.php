
<?php
/* @var $this ProfileController */
/* @var $model Profile */
?>

<h2>View Profile</h2><br/>


<?php

   echo TbHtml::tabbabletabs(array(
       array('label'=>'Profile', 'active'=>true, 'content'=>$this->renderPartial(
                                        '_view',array('data'=>$model),TRUE)),
       array('label'=>'Work Experience', 'content'=>$this->renderPartial(
                                        '_experience', array('experienceDataProvider'=>$experienceDataProvider),TRUE)),
       array('label'=>'Education', 'content'=>$this->renderPartial(
                                        '_education', array('educationDataProvider'=>$educationDataProvider),TRUE)),
       array('label'=>'Languages', 'content'=>$this->renderPartial(
                                        '_language', array('languageDataProvider'=>$languageDataProvider),TRUE)),
       array('label'=>'skills', 'content'=>$this->renderPartial(
                                        '_skills', array('skillsDataProvider'=>$skillsDataProvider),TRUE)),
       array('label'=>'Achievements', 'content'=>$this->renderPartial(
                                        '_achievements', array('achievementsDataProvider'=>$achievementsDataProvider),TRUE)),
       array('label'=>'Interests', 'content'=>$this->renderPartial(
                                        '_interests', array('interestDataProvider'=>$interestDataProvider),TRUE)),
   ),
        array('placement'=>TbHtml::TABS_PLACEMENT_LEFT));
   ?>
  

