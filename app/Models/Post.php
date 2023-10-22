<?php

namespace App\Models;

use App\Models\Model;
use DateTime;

class Post extends Model{

    protected $table = 'posts';

    public function getCreatedAt(): string
    {
        return $date= (new DateTime($this->created_at))->format('D d/m/Y à H:i');
        
    }

    public function getExcerpt():string
    {
        return substr($this->content, 0, 250). '...';
    }

    public function getButtom(): string
    {
       return<<< HTML
    <a href="/post/$this->id" class="btn-btn-primary">Lire plus</a>
HTML;
    }

    public function getTags()
    {
        
     return $this->query("
        SELECT t.* FROM tags t
        INNER JOIN post_tag pt ON pt.tag_id = t.id
        WHERE pt.post_id = ?
    ", [$this->id]);
 
    }

    public function update(int $id, array $data, ?array $relations = null )
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $tagId) {
           $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (?, ?)");
           $stmt->execute([$id, $tagId]);
        }
        
        if ($result) {
            return true;
        }

    }
} 