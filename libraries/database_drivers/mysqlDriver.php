<?php
    class mysqlDriver extends database {
        public function get($table, $where, $limit, $offset) {

        };

        public function getSingle($id) {
            return $id;
        };

        public function create($table, $data) {

        };

        public function update($table, $where, $data) {

        };

        public function delete($table, $where) {
            
        };
    }