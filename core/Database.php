<?php
    abstract class Database {
        abstract public function create();

        abstract public function update();

        abstract public function delete();

        abstract public function get();
        
        abstract public function getSingle();
    }