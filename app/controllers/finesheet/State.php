<?php 

abstract class State {

    public abstract function pay($fineSheet);
    public abstract function expire($fineSheet);
}





