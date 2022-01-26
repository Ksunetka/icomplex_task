<?php
include_once ROOT. '/models/News.php';

Class NewsController
{


    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT . '/views/news/index.php');
        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            require_once(ROOT . '/views/news/view.php');
            return true;

        }
    }

    public function actionSave()
    {
        if (isset($_POST['name']) && isset($_POST['text']) && isset($_POST['news_id'])) {

            $name = $_POST['name'];
            $text = $_POST['text'];
            $news_id = $_POST['news_id'];

            $result = News::saveComments($name, $text, $news_id);

            if ($result=true) {
                require_once(ROOT . '/views/news/thank.php');
                return true;
            }

        }

    }

}






?>