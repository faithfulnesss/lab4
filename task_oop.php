<?php

    class Human {
        public $name;
        public $age;

        function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        function get_name(){
            return $this->name;
        }

        function get_age(){
            return $this->age;
        }

        function do_action() {
            return $this->name." doing some action";
        }

        function __toString() {
            return "Human with name $this->name is $this->age years old";
        }
    
        function __destruct() {
            print "Person class destructor is called\n";
        }
    }


    class Jumper extends Human {
        public $action;

        function __construct($name, $age, $action) {
            $this->name = $name;
            $this->age = $age;
            $this->action = $action;
        }

        function do_action(){
            print parent::do_action()."\n";
            return $this->action;
        }

        function __toString(){
            return "Jumper with name $this->name is $this->age and action is $this->action";
        }

        function __destruct() {
            print "Jumper class destructor is called!\n";
        }
    }

    class Singleton {
        private static $_instance = null;

        private function __construct(){

        }
        
        public function __clone() {

        }

        static public function getInstance() {
            if(is_null(self::$_instance)) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }
    }
    
    $human = new Human("Patrick", 25);
    print $human."\n";
    print $human->get_name()."\n";
    print $human->get_age()."\n";

    $jumper = new Jumper("Jo Mamba", 54, "I can jump very high!");
    print $jumper."\n";
    print $jumper->do_action()."\n";

    $singleton_1 = Singleton::getInstance();
    $singleton_2 = Singleton::getInstance();

    if($singleton_1 == $singleton_2) {
        print "Same instance\n";
    } else {
        print "Different instances\n";
    }

?>