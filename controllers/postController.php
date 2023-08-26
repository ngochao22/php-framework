<?php
    class postController extends controller {
     
        public function show() {
            $this->loadModel('post');

            $this->database->getSingle(4);

            $post = [
                'title' => 'Day la tieu de bai viet',
                'content' => 'Day la noi dung bai viet',
            ];

            $this->loadView('postDetail', $post);
        }
    }