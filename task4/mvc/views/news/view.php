<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Effloresce  by FCT</title>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
            <div id="logo">
                <h1>Mini MVC</h1>
                <p>Test</p>
            </div>
        </div>
    </div>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href='/news/<?php echo $newsItem['id'] ;?>'><?php echo $newsItem['title'];?></a></h2>
						<p class="meta">Автор: <a href="#"><?php echo $newsItem['author_name'];?></a>, дата публикации: <?php echo $newsItem['date'];?></p>
						<div class="entry">
							<p><img src="/template/images/pic01.jpg" width="800" height="300" alt="" /></p>
							<p><?php echo $newsItem['content'];?></p>
						</div>
					</div>

                    <form method="POST" action="/save">
                        <input name="name" type="text" placeholder="Имя"/>
                        <input name="text" type="text" placeholder="Текст"/>
                        <input name="news_id" value="<?php echo $newsItem['id'];?>" type="hidden"/>
                        <input type="submit" value="Отправить">
                    </form>

					<p><a href='/news/' class="permalink">Вернуться на Главную страницу</a></p>
					<div style="clear: both;">&nbsp;</div>
				</div>


				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
</div>

<div id="footer">
    <p>My test mini MVC (c) 2022</p>
</div>

</body>
</html>
