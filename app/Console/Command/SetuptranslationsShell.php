<?php 

class SetuptranslationsShell extends AppShell {

    public function main() {
        $selection = $this->in('Start to create translated entries?', array('y', 'n', 'q'), 'y');
        if (strtolower($selection) === 'y') {
            $this->out('Creating entries in i18n table...');
            $this->_execute();
        }
    }

    function _execute() {
        $this->_regenerateI18n('FactoryBuilding', array('name'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('name'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('note'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('note'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('highway'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('highway'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('sewer'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('sewer'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('waterworks'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('waterworks'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('reservoir'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('reservoir'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('electricity'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('electricity'), 'jpn');
        $this->_regenerateI18n('FactoryBuilding', array('security'), 'eng');
        $this->_regenerateI18n('FactoryBuilding', array('security'), 'jpn');
        $this->_regenerateI18n('FactoryProperty', array('note'), 'eng');
        $this->_regenerateI18n('FactoryProperty', array('note'), 'jpn');
    }

    /**
     * See http://stackoverflow.com/q/2024407/22470
     * 
     */
    function _regenerateI18n($Model, $fields = array(), $targetLocale) {

        $this->out('Create entries for "'.$Model.'":');

        if (!isset($this->$Model)) {
            $this->{$Model} = ClassRegistry::init($Model);
        }

        $this->{$Model}->Behaviors->disable('Translate'); 
        $out = $this->{$Model}->find('all', array(
                                                    'recursive' => -1, 
                                                    'order'     => $this->{$Model}->primaryKey, 
                                                    'fields'    => array_merge(array($this->{$Model}->primaryKey), $fields))
                                                    );

        $this->I18nModel = ClassRegistry::init('I18nModel');

        $t = 0;
        foreach ($out as $v) {

            foreach ($fields as $field) {
                $data = array(
                    'locale'        => $targetLocale,
                    'model'         => $this->{$Model}->name,
                    'foreign_key'   => $v[$Model][$this->{$Model}->primaryKey],
                    'field'         => $field,
                    'content'       => $v[$Model][$field],
                );


                $check_data = $data;
                unset($check_data['content']);
                if (!$this->I18nModel->find('first', array('conditions' => $check_data))) {
                    if ($this->I18nModel->create($data) AND $this->I18nModel->save($data)) {
                        echo '.';
                        $t++;
                    }
                }
            }
        }
        $this->out($t." entries written");
    }
}