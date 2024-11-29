<?php

namespace App\Admin\Controllers;

use App\Models\CoreConfig;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoreConfigController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CoreConfig';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CoreConfig());

        $grid->column('id', __('Id'));
        $grid->column('site_name', __('Site name'));
        $grid->column('site_url', __('Site url'));
        $grid->column('site_key', __('Site key'));
        $grid->column('site_title', __('Site title'));
        $grid->column('site_description', __('Site description'));
        $grid->column('config', __('Config'));
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
        $show = new Show(CoreConfig::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('site_name', __('Site name'));
        $show->field('site_url', __('Site url'));
        $show->field('site_key', __('Site key'));
        $show->field('site_title', __('Site title'));
        $show->field('site_description', __('Site description'));
        $show->field('config', __('Config'));
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
        $form = new Form(new CoreConfig());

        $form->textarea('site_name', __('Site name'));
        $form->textarea('site_url', __('Site url'));
        $form->textarea('site_key', __('Site key'));
        $form->textarea('site_title', __('Site title'));
        $form->textarea('site_description', __('Site description'));
        $form->textarea('config', __('Config'));

        return $form;
    }
}
