<?php
namespace core\model;
/**
* Description of entity role
* @author Parsimony
* @top 43px
* @left 1144px
*/
class role extends \entity {

    protected $id_role;

    protected $name;

    protected $state;



public function __construct(\field_ident $id_role,\field_string $name,\field_state $state) {
        $this->id_role = $id_role;
        $this->name = $name;
        $this->state = $state;

}
// DON'T TOUCH THE CODE ABOVE ##########################################################

}
?>