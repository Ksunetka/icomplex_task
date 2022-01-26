<?php

class News
{
    /**
     * Возвращает одну новость по идентицикатору
     */
    public static function getNewsItemById($id) {
    //        Запрос к БД
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    /**
     * Возвращает список новостей
     */

    public static function getNewsList() {

        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id, title, date, short_content, content, author_name '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $i++;
        }

        return $newsList;
    }

    public static function saveComments($name, $text, $news_id)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO comments (name, text, news_id) VALUES (:name, :text, :news_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);


        return $result->execute();
    }



}
