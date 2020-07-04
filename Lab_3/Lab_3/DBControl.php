<?php
	function getDbConnection(){
		$db = new SQLite3('articles.db');
		if (!$db) {
			http_response_code(500);
			exit('DB connection error');
		}
		return $db;
	}
 
	function initDB(){
		$db = getDbConnection();
		$CreateArticleTableQuery = 'CREATE TABLE IF NOT EXISTS Posts (
									ID INTEGER PRIMARY KEY AUTOINCREMENT,
									ImageName TEXT,
									Title TEXT,
									Content TEXT,
									Created DATE)';
		$result = $db->exec($CreateArticleTableQuery);
		if (!$result) {
			http_response_code(500);
			exit('DB init error');
		}
	}


