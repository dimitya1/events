<?php

namespace App\Repositories\Comment;

use App\Models\Entities\Comment;

interface CommentInterface
{
    public function get(int $itemId);

    public function getActiveByEventId(int $itemId);

    public function saveItem(array $itemData);

    public function editItem(Comment $comment, array $itemData);

    public function deleteItem(Comment $comment);

    public function getActiveItemsLatestFirst();

    public function updateActiveStatus(Comment $comment);
}
