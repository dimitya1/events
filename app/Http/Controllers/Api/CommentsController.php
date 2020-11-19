<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Entities\Comment;
use App\Services\Comment\CommentFacade;
use Illuminate\Support\Facades\Validator;

class CommentsController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll() {
        $items = CommentFacade::getActiveItemsLatestFirst();
        if($items->count())
            return $this->success($items);

        return $this->error('COMMENT_ERRORS', 'NO_COMMENTS');
    }

    public function getActiveByEventId($eventId) {
        $comments = CommentFacade::getActiveByEventId($eventId);

        return $this->success($comments);
    }

    public function delete($commentId) {
        if ($comment = CommentFacade::get($commentId)) {
            $result = CommentFacade::delete($comment);

            return $this->success($result);
        }
        return $this->error('COMMENT_ERRORS', 'COMMENT_NOT_FOUND');
    }

    public function updateActiveStatus($commentId) {
        if ($comment = CommentFacade::get($commentId)) {
            $updatedComment = CommentFacade::updateActiveStatus($comment);

            return $this->success($updatedComment);
        }
        return $this->error('COMMENT_ERRORS', 'COMMENT_NOT_FOUND');
    }

    public function saveItem(Request $request) {
        $validator = Validator::make(
            request()->all(),
            [
                'title' => 'required|min:3|max:80',
                'content' => 'required|min:10|max:10000'
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $data = array();
        $data['title'] = $request->get('title');
        $data['content'] = $request->get('content');
        $newComment = CommentFacade::save($data);

        return $this->success($newComment);
    }
}
