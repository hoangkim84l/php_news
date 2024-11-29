<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('img_link', __('Img link'));
        $grid->column('site_title', __('Site title'));
        $grid->column('site_keys', __('Site keys'));
        $grid->column('site_description', __('Site description'));
        $grid->column('content', __('Content'));
        $grid->column('view', __('View'));
        $grid->column('hide', __('Hide'));
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('img_link', __('Img link'));
        $show->field('site_title', __('Site title'));
        $show->field('site_keys', __('Site keys'));
        $show->field('site_description', __('Site description'));
        $show->field('content', __('Content'));
        $show->field('view', __('View'));
        $show->field('hide', __('Hide'));
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
        $form = new Form(new Post());

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('img_link', __('Img link'));
        $form->textarea('site_title', __('Site title'));
        $form->textarea('site_keys', __('Site keys'));
        $form->textarea('site_description', __('Site description'));
        $form->textarea('content', __('Content'));
        $form->number('view', __('View'));
        $form->switch('hide', __('Hide'));

        return $form;
    }
}
