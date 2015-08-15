<?php

class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
    private $_oldattributes=array();
    
    public function afterSave($event)
    {
        if(!$this->Owner->isNewRecord)
        {
            //new Attributes
            $newattributes=$this->Owner->getAttributes();
            $oldattributes=$this->getOldAttributes();
            
            //compare old and new
            foreach($newattributes as $name=>$value)
            {                
                if(!empty($oldattributes))
                {
                    $old=$oldattributes[$name];
                }
                else
                {
                    $old='';                
                }

                if($value!=$old)
                {
                    //$changes=$name.'('.$old.')=>('.$value.'),';

                    $log=new ActiveRecordLog;
                    $log->log_description = 'User ('.Yii::app()->user->id.') edited '.$name.' for '.get_class($this->Owner).' ['.$this->Owner->getPrimaryKey().'].';
                    $log->log_action      = 'EDITED';
                    $log->log_model       = get_class($this->Owner);
                    $log->log_idModel     = $this->Owner->getPrimaryKey();
                    $log->log_field       = $name;
                    $log->log_creationdate= new CDbExpression('NOW()');
                    $log->log_userid      = Yii::app()->user->id;
                    $log->save();
                }                
            }
        }
        else
        {
            $log=new ActiveRecordLog;
            $log->log_description = 'User ('.Yii::app()->user->id.') created '.get_class($this->Owner).' ['.$this->Owner->getPrimaryKey().'].';
            $log->log_action      = 'CREATED';
            $log->log_model       = get_class($this->Owner);
            $log->log_idModel     = $this->Owner->getPrimaryKey();
            $log->log_field       = '';
            $log->log_creationdate= new CDbExpression('NOW()');
            $log->log_userid      = Yii::app()->user->id;
            $log->save();
        }
    }
    
    public function afterDelete($event)
    {
        $log=new ActiveRecordLog;
        $log->log_description = 'User ('.Yii::app()->user->id.') deleted '.get_class($this->Owner).' ['.$this->Owner->getPrimaryKey().'].';
        $log->log_action      = 'DELETED';
        $log->log_model       = get_class($this->Owner);
        $log->log_idModel     = $this->Owner->getPrimaryKey();
        $log->log_field       = '';
        $log->log_creationdate= new CDbExpression('NOW()');
        $log->log_userid      = Yii::app()->user->id;
        $log->save();
    }
    
    public function afterFind($event)
    {
        // Save old values
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
    
    
    
    
    
}
?>