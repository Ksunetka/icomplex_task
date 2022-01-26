<?php
include_once ROOT. '/models/News.php';
include_once ROOT. '/models/Comments.php';


Class CommentsController{


    public function actionIndex(){
        $newsList = array();
        $newsList = Comments::getCommentsList();

        require_once(ROOT . '/views/comments/index.php');
        return true;
    }

    public function actionView($id){
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            require_once(ROOT . '/views/comments/view.php');
            return true;

        }
    }

    public function actionSave(){
        if (isset($_POST['submit'])){
            // Переменные с формы
            $name = $_POST['name'];
            $text = $_POST['text'];

            try {
                // Подключение к базе данных
                $db = Db::getConnection();
                // Собираем данные для запроса
                $data = array( 'name' => $name, 'text' => $text );
                // Подготавливаем SQL-запрос
                $query = $db->prepare("INSERT INTO comments (name, text) values (:name, :text)");
                // Выполняем запрос с данными
                $query->execute($data);
                // Запишим в переменую, что запрос отработал
                $result = true;
            } catch (PDOException $e) {
                // Если есть ошибка соединения или выполнения запроса, выводим её
                print "Ошибка!: " . $e->getMessage() . "<br/>";
            }

            if ($result) {
                echo "Успех. Информация занесена в базу данных";
            }
        }
    }



}


?>