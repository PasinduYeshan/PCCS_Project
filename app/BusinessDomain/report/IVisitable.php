<?php
interface IVisitable{
    public function accept(IVisitor $visitor);

}