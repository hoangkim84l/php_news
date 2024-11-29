<?php

namespace App\Admin\Controllers;

use App\Models\PostComment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostCommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PostComment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PostComment());

        $grid->column('id', __('Id'));
        $grid->column('post_id', __('Post id'));
        $grid->column('user_id', __('User id'));
        $grid->column('comment', __('Comment'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PostComment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('post_id', __('Post id'));
        $show->field('user_id', __('User id'));
        $show->field('comment', __('Comment'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PostComment());

        $form->number('post_id', __('Post id'));
        $form->number('user_id', __('User id'));
        $form->textarea('comment', __('Comment'));

        return $form;
    }
}
