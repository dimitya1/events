<?php

namespace App\Repositories\Comment;

use App\Models\Entities\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentRepository implements CommentInterface
{
    protected $model;

    public function __construct(Comment $item)
    {
        $this->model = $item;
    }

    public function get(int $itemId)
    {
        return $this->model::find($itemId);
    }

    /**
     * @param int $itemId
     * @return mixed
     */
    public function getActiveByEventId(int $itemId)
    {
        return $this->model::where('is_active', 1)->whereHas('events', function($q) use ($itemId) {
            $q->where('event_id', '=', $itemId);
        })->orderBy('created_at', 'DESC')->get();
    }

    public function saveItem(array $itemData)
    {
        return $this->model->create($itemData);
    }

    /**
     * Edit item
     *
     * @param Comment $item
     * @param array $itemData
     * @return bool
     */
    public function editItem(Comment $item, array $itemData)
    {
        return $item->update($itemData);
    }

    /**
     * @param Comment $item
     * @return bool|null
     * @throws \Exception
     */
    public function deleteItem(Comment $item)
    {
        $item->events()->detach();
        return $item->delete();
    }

    /**
     * Get all active items
     *
     * @return mixed
     */
    public function getActiveItemsLatestFirst() {
        return $this->model
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC')
            ->get()
        ;
    }

    /**
     * Change the active status
     *
     * @param Comment $item
     * @return bool
     */
    public function updateActiveStatus(Comment $item)
    {
        return $item->update(['is_active' => !$item->is_active]);
    }
}
