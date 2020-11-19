<?php

namespace App\Services\Comment;

use App\Models\Entities\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Comment\CommentInterface;

class CommentService
{
    protected $commentRepo;

    public function __construct(CommentInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function get($itemId)
    {
        return $this->commentRepo->get($itemId);
    }

    /**
     * @param $itemId
     * @return mixed
     */
    public function getActiveByEventId($itemId)
    {
        return $this->commentRepo->getActiveByEventId($itemId);
    }

    /**
     * creates a item with the given data
     *
     * @param array $data
     * @return Model
     */
    public function save(array $data)
    {
        return $this->commentRepo->saveItem($data);
    }

    /**
     * @param Comment $item
     * @param array $data
     * @return mixed
     */
    public function edit(Comment $item, array $data)
    {
        return $this->commentRepo->editItem($item, $data);
    }

    /**
     * @param Comment $item
     * @return mixed
     */
    public function delete(Comment $item)
    {
        return $this->commentRepo->deleteItem($item);
    }

    /**
     * @return mixed
     */
    public function getActiveItemsLatestFirst() {
        return $this->commentRepo->getActiveItemsLatestFirst();
    }

    /**
     * Change the active status
     *
     * @param Comment $item
     * @return bool
     */
    public function updateActiveStatus(Comment $item)
    {
        return $this->commentRepo->updateActiveStatus($item);
    }
}
