<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('/index','Admin\IndexController@Index');

/**
 * 登录
 */
Route::get('/login', 'admin\admin@login');
Route::any('/login_denglu', 'admin\admin@login_denglu');

//退出
Route::get('/quit', 'admin\admin@quit');
/**
 * 操作
 */




Route::group(['middleware' => ['Login']], function () {
    //登录中间件
    Route::get('/loy', 'admin\admin@loy');
    Route::get('admin', 'Admin\admin@admin');

    Route::any('/index','Admin\IndexController@Index');

    Route::group(['middleware' => ['Quanxian']], function () {
        //权限操作
        Route::get('admin_insert', 'admin\admin@admin_insert');
        Route::post('admin_submit', 'admin\admin@admin_submit');
        Route::get('admin_set/{admin_id}', 'admin\admin@admin_set');
        Route::post('admin_role_insert', 'admin\admin@admin_role_insert');
        Route::get('admin_delete/{admin_id}', 'admin\admin@admin_delete');

        Route::get('role_delete/{role_id}', 'admin\admin@role_delete');

        Route::get('role_select', 'admin\admin@role_select');
        Route::get('right', 'admin\admin@right');
        Route::get('admin_update', 'admin\admin@admin_update');
        Route::post('admin_update_add', 'admin\admin@admin_update_add');
    });

    Route::get('right', 'admin\admin@right');
    Route::get('admin_update', 'admin\admin@admin_update');
    Route::post('admin_update_add', 'admin\admin@admin_update_add');
    /**
     *角色添加
     */
    Route::get('role', 'admin\admin@role');
    Route::post('role_insert', 'admin\admin@role_insert');

    //用户管理
    //用户添加
    Route::any('/userAdd', 'User\UserController@userAdd');
    Route::any('/userAddo', 'User\UserController@userAddo');


    //用户详情添加
    Route::any('/userCreate', 'User\UserController@userCreate');
    Route::any('/userSave', 'User\UserController@userSave');


    //用户列表
    Route::any('/userList', 'User\UserController@userList');
    //用户详情页
    Route::any('/userIndex', 'User\UserController@userIndex');

    //讲师操作
    //讲师添加
    Route::any('lectAdd','Lect\LectController@lectAdd');
    Route::any('lectAdddo','Lect\LectController@lectAdddo');
    //讲师列表
    Route::any('lectList','Lect\LectController@lectList');
    //讲师修改
    Route::any('lectUpd/{id}',"Lect\LectController@lectUpd");
    Route::any('lectUpddo',"Lect\LectController@lectUpddo");
    //讲师删除
    Route::any('lectDel/{id}',"Lect\LectController@lectDel");

    Route::post('role_right', 'admin\admin@role_right');

    //收藏操作
    Route::any('collectList','Collect\collectController@collectList');//收藏列表

    //收藏夹
    Route::any('/favoriteList','Favorite\FavoriteController@favoriteList');//收藏夹展示

    //支付方式操作
    //支付方式添加
    Route::any('payAdd','Pay\payController@payAdd');
    Route::any('payAdddo','Pay\payController@payAdddo');
    //支付方式列表
    Route::any('payList','Pay\payController@payList');
    //支付方式修改
    Route::any('payUpd/{id}','Pay\payController@payUpd');
    Route::any('payUpddo','Pay\payController@payUpddo');
    //支付方式删除
    Route::any('payDel/{id}','Pay\payController@payDel');

    //课程
    Route::any('/classAdd','Kecheng\ClassController@classAdd');//添加课程页面
    Route::any('/classAdddo','Kecheng\ClassController@classAdddo');//课程添加
    Route::any('/classList','Kecheng\ClassController@classList');//课程添加
    Route::any('/classDel','Kecheng\ClassController@classDel');//课程删除
    Route::any('/classUpd','Kecheng\ClassController@classUpd');//课程修改
    Route::any('/classUpddo','Kecheng\ClassController@classUpddo');//课程修改
    Route::any('/class_comment','Kecheng\ClassController@class_comment');//课程评论
    Route::any('/class_catelog','Kecheng\ClassController@class_catelog');//课程章节
    Route::any('/class_job','Kecheng\ClassController@class_job');//课程作业


    //评论
    Route::any('/commentList','Comment\CommentController@commentList');//评论展示
    Route::any('/commentDel','Comment\CommentController@commentDel');//评论删除

    //课程分类
    Route::any('/categoryAdd', 'category\CategoryController@categoryAdd');
    Route::any('/categoryAdddo', 'category\CategoryController@categoryAdddo');
    Route::any('/categoryList', 'category\CategoryController@categoryList');
    Route::any('/categoryDel', 'category\CategoryController@categoryDel');
    Route::any('/categoryUpd', 'category\CategoryController@categoryUpd');
    Route::any('/categoryUpddo', 'category\CategoryController@categoryUpddo');

    //课程章节
    Route::any('/cataAdd', 'Catalog\CatalogController@cataAdd');
    Route::any('/cataAdddo', 'Catalog\CatalogController@cataAdddo');
    Route::any('/audio', 'Catalog\CatalogController@audio');
    Route::any('/cataList', 'Catalog\CatalogController@cataList');
    Route::any('/cataDel', 'Catalog\CatalogController@cataDel');
    Route::any('/cataUpd', 'Catalog\CatalogController@cataUpd');
    Route::any('/cataUpddo', 'Catalog\CatalogController@cataUpddo');

    //作业管理
    Route::any('/jobAdd', 'Job\JobController@jobAdd');
    Route::any('/jobAdddo', 'Job\JobController@jobAdddo');
    Route::any('/jobList', 'Job\JobController@jobList');
    Route::any('/jobDel', 'Job\JobController@jobDel');
    Route::any('/jobchange', 'Job\JobController@jobchange');
    Route::any('/jobUpd', 'Job\JobController@jobUpd');
    Route::any('/jobUpddo', 'Job\JobController@jobUpddo');

    //笔记模块
    Route::any('/noteList', 'Note\NoteController@noteList');
    Route::any('/noteDel', 'Note\NoteController@noteDel');
    Route::any('/noteUpd', 'Note\NoteController@noteUpd');
    Route::any('/noteUpddo', 'Note\NoteController@noteUpddo');

    //问答模块
    Route::any('/ques_list', 'questions\QuestionsController@ques_list');
    Route::any('/ques_del', 'questions\QuestionsController@ques_del');
    Route::any('/ques_auth', 'questions\QuestionsController@ques_auth');
    Route::any('/authDo', 'questions\QuestionsController@authDo');
    Route::any('/ques_desc', 'questions\QuestionsController@ques_desc');
    Route::any('/ques_desclist', 'questions\QuestionsController@ques_desclist');
    Route::any('/ques_Dodesc', 'questions\QuestionsController@ques_Dodesc');
    Route::any('/ques_update', 'questions\QuestionsController@ques_update');
    Route::any('/ques_edit', 'questions\QuestionsController@ques_edit');

    Route::any('/response_update', 'questions\QuestionsController@response_update');
    Route::any('/response_edit', 'questions\QuestionsController@response_edit');
    Route::any('/response_del', 'questions\QuestionsController@response_del');

//咨询模块
    Route::any('/information_list', 'information\InformationController@information_list');
    Route::any('/information_add', 'information\InformationController@information_add');
    Route::any('/information_Doadd', 'information\InformationController@information_Doadd');
    Route::any('/information_update', 'information\InformationController@information_update');
    Route::any('/information_edit', 'information\InformationController@information_edit');
    Route::any('/information_del', 'information\InformationController@information_del');

    //题库
    Route::any('/bank_add','Bank\BankController@bank_add');//题库添加页面
    Route::any('/bank_add_do','Bank\BankController@bank_add_do');//题库添加
    Route::any('/bank_list','Bank\BankController@bank_list');//题库展示
    Route::any('/bank_del','Bank\BankController@bank_del');//题库删除
    Route::any('/bank_update','Bank\BankController@bank_update');//题库修改页面
    Route::any('/bank_update_do','Bank\BankController@bank_update_do');//题库修改页面

    //订单模块
    Route::any('/order_list', 'order\OrderController@order_list');

    //轮播图
    //轮播图展示
    Route::get('/slideshow', 'Slie\SlieController@slideshow');
    //轮播图添加
    Route::get('/slideshow_tianjia', 'Slie\SlieController@slideshow_tianjia');
    Route::post('/slideshow_insert', 'Slie\SlieController@slideshow_insert');
    //轮播图权重修改
    Route::get('/slide_weight/{slide_id}', 'Slie\SlieController@slide_weight');
    Route::post('/slide_update', 'Slie\SlieController@slide_update');

    //导航栏
    Route::any('/nav_add','Navigation\NavController@nav_add');//导航栏添加页面
    Route::any('/nav_add_do','Navigation\NavController@nav_add_do');//导航栏添加
    Route::any('/nav_list','Navigation\NavController@Nav_List');//导航栏展示
    Route::any('/nav_del','Navigation\NavController@Nav_Del');//导航栏删除
    Route::any('/nav_update','Navigation\NavController@Nav_Update');//导航栏删除
    Route::any('/nav_update_do','Navigation\NavController@Nav_Update_Do');//导航栏修改
});


