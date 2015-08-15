
<html>            
    <head>       
    </head>
<body>
    <div>
        <div align="right" style="font-size:32px;"><?php echo $this->_user->user_first_name; ?> <?php echo $this->_user->user_secondary_name; ?></div>        
        <div align="right" style="font-size:17px">Curriculum Vitae</div>
    </div>
    <br/>
    <br/>
    
    <div id="Personal-Details">
        <div style="font-size:30px;border:none;">Personal Details</div>
        <hr style="height:6px;border:none;color:#333;background-color:#333;" />
        <ul style="list-style-type:none">
            <li>Address: <?php echo "&nbsp;&nbsp;"
                    . "".$this->_user->profile->profile_address_1.", "
                    . "".$this->_user->profile->profile_address_2.", "
                    . "".$this->_user->profile->profile_address_3.", "
                    . "".$this->_user->profile->profile_address_4; ?></li>
            <li>Phone: <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$this->_user->profile->profile_mobile_number; ?></li>
            <li>Email:<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$this->_user->user_email; ?></li>
        </ul>         
    </div><br/>
    
    <div id="Summary">        
        <?php if($this->_cv->cv_description != Null){?>
        <div style="font-size:30px;border:none;">Summary</div>
        <hr style="height:6px;border:none;color:#333;background-color:#333;" />
        <p>
            <?php echo $this->_cv->cv_description; ?>
        </p> 
    </div><br/>
        <?php } ?>
    
    <div id="Education">         
        <div style="font-size:30px;border:none;">Education</div>        
        <hr style="height:6px;border:none;color:#333;background-color:#333;" />
        <?php foreach($this->_user->education as $education){?>
            <div>
                <b><?php if($education->education_type==1){ echo $education->education_course;}else if($education->education_type==0){ echo 'Leaving Cert'; };?></b>
                <br/>
                <i><?php echo $education->education_name; if($education->education_type==1){ echo '  ( '.CHtml::encode(Yii::app()->dateFormatter->format("yyyy ", $education->education_date_attended)).' - '.CHtml::encode(Yii::app()->dateFormatter->format("yyyy ", $education->education_date_finished)).' )';}; ?></i>
                <br/>
                <div style="margin-left: 40px;">
                    <i><?php echo $education->education_description; ?></i>
                </div>
            </div><br/>
        <?php } ?>
    </div><br/>
    
    <div id="Work-Experience">        
        <div style="font-size:30px;border:none;">Work Experience</div> 
        <hr style="height:6px;border:none;color:#333;background-color:#333;" />
        <?php foreach($this->_cv->workExperience as $experience){ ?>
        <div>
            <b><?php echo $experience->work_status; ?></b>
            <br/>
            <i><?php echo $experience->work_name.' ( '.CHtml::encode(Yii::app()->dateFormatter->format("MMM-yyyy ", $experience->work_date_started)).' - '.CHtml::encode(Yii::app()->dateFormatter->format("MMM-yyyy ", $experience->work_date_finished)).')'; ?></i>
            <?php foreach($experience->workTasks as $task){ ?>
                <div style="margin-left: 40px;">
                    <i><?php echo strip_tags($task->task_description); ?></i>
                </div> 
                <br/><br/>
            <?php } ?>
        </div>
        <br/>
        <?php } ?>
    </div>
        
    <div id="Languages">
        <?php if(empty($this->_cv->languages)==false){ ?>
            <div style="font-size:30px;border:none;">Languages</div> 
            <hr style="height:6px;border:none;color:#333;background-color:#333;" />
            <?php foreach($this->_cv->languages as $language){ ?>
                <div style="margin-left: 40px;">
                    <i><?php echo $language->language_name; ?></i><br/>
                </div> <br/>
            <?php } ?> 
        <?php } ?>
    </div>
    
    <div id="Awards_Achievements">
        <?php if(empty($this->_cv->achievements)==false){ ?>
            <div style="font-size:30px;border:none;">Awards & Achievements</div> 
            <hr style="height:6px;border:none;color:#333;background-color:#333;" />
            <?php foreach($this->_cv->achievements as $achievement){ ?>
                <div style="margin-left: 40px;float:left;">
                    <i><?php echo $achievement->achievement_name.': '; ?></i><br/>
                </div>
                <div style="margin-left:10px;float:right;">
                    <?php echo $acievement->achievement_description;?>
                </div>
            <?php } ?>
            <br/>
        <?php } ?>
    </div>
    
    <div id="Interests">
        <?php if(empty($this->_cv->interests)==false){ ?>
            <div style="font-size:30px;border:none;">Interests</div> 
            <hr style="height:6px;border:none;color:#333;background-color:#333;" />
            <?php foreach($this->_cv->interests as $interest){ ?>
                <div style="margin-left: 40px;float:left;">
                    <i><?php echo $interest->interest_description; ?></i><br/>
                </div>
            <?php } ?> 
            <br/>
        <?php } ?>
    </div>  
    
    <div id="Skill">
        <?php if(empty($this->_cv->skills)==false){ ?>
            <div style="font-size:30px;border:none;">Other</div> 
            <hr style="height:6px;border:none;color:#333;background-color:#333;" />
            <?php foreach($this->_cv->skills as $skill){ ?>
                <div style="margin-left: 40px;">
                    <i><?php echo $skill->skill_name; ?></i><br/>
                </div> <br/>
            <?php } ?> 
        <?php } ?>
    </div>
    
    <div id="References">
        <div style="font-size:30px;border:none;">References</div> 
        <hr style="height:6px;border:none;color:#333;background-color:#333;" /> 
            <div style="margin-left: 40px;">
                <i>Available Upon Request</i>
            </div>
    </div>
    </body>
</html>
