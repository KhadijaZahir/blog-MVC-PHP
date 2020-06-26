<?php
class ArticleManager extends Model
{
  //creer la func qui va recuperer tous les articles dans la bdd
public function getArticles(){
  return $this->getAll('articles', 'Article');
}
public function getArticle($id){
  return $this->getOne('articles', 'Article', $id);
}
}


 ?>
