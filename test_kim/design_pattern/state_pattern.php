<?php
// make unit inserface
interface Unit{
    public function attack();
    public function move();
}

// make blind status class
class Blind implements Unit{
    public function attack(){
        echo "you can attack \n";
        return true;
    }

    public function move(){
        echo "your vision is just 1 \n";
        return true;
    }
}

// make lockdown status class
class LockDown implements Unit{
    public function attack(){
        echo "you can not attack \n";
        return true;
    }

    public function move(){
        echo "you can not move \n";
        return true;
    }
}

// make unit siegetank
class SiegeTank implements Unit{
    private $_unit = NULL;

    // make attacked 
    public function attacked( $status ){
        switch( $status ){
            case 'blind':
                $this->_unit = new Blind;
                break;
            case 'lockdown':
                $this->_unit = new LockDown;
                break;
            default:

                break;
        }
    }
    
    // siegetank attack
    public function attack(){
        if( $this->_unit != NULL ){
            $this->_unit->attack();
        }else{
            echo "normal attack \n";
        }
        return true;
    }

    // siegetank move
    public function move(){
        if( $this->_unit != NULL ){
            $this->_unit->move();
        }else{
            echo "normal moving \n";
        }
        return true;
    }
}

// test
$tank = new SiegeTank();
$tank->attack();
$tank->move();
$tank->attacked('blind' );
$tank->attack();
$tank->move();
$tank->attacked('lockdown');
$tank->attack();
$tank->move();
