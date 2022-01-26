<?php

class Comments
{
    /**
     * Возвращает одну новость по идентицикатору
     */
    public static function getCommentsItemById($id) {
    //        Запрос к БД
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * from comments WHERE id='.$id);
//            $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $CommentsItem = $result->fetch();

            return $CommentsItem;
        }

    }

    /**
     * Возвращает список новостей
     */

    public static function getCommentsList() {

        $db = Db::getConnection();

        $commentsList = array();

        $result = $db->query('SELECT id, name, text '
            . 'FROM comments '
            . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $commentsList[$i]['id'] = $row['id'];
            $commentsList[$i]['name'] = $row['name'];
            $commentsList[$i]['text'] = $row['text'];
            $i++;
        }

        return $commentsList;
    }


    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO comments (user_name, user_phone, user_comment, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }


}
